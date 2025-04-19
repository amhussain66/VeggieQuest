<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessages;
use App\Mail\PasswordResetMail;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\ContactMessage;
use App\Models\Products;
use App\Models\QuizAnswers;
use App\Models\QuizQuestions;
use App\Models\Setting;
use App\Models\User;
use App\Models\VeggiOfMonth;
use App\Models\WebsiteSetting;
use App\Models\wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{

    public function home()
    {
        $vog = VeggiOfMonth::first();
        $products = Products::inRandomOrder()->limit(4)->get();
        $blogs = Blogs::inRandomOrder()->limit(4)->get();
        $categories = Categories::orderby('id', 'desc')->get();
    
        // Get current week number
        $currentWeek = now()->weekOfYear;
    
        // Get veggie fact for current week
        $fact = \DB::table('veggie_facts')->where('week_number', $currentWeek)->first();
    
        return view('website.index', compact('vog', 'products', 'categories', 'blogs', 'fact'));
    }

    public function recipes(Request $request)
    {
        $query = Products::query();
        if (isset($request->category) && !empty($request->category)) {
            $query->where('categoryid', $request->category);
        }
        if (isset($request->heading) && !empty($request->heading)) {
            $query->where('heading', 'like', '%' . $request->heading . '%');
        }
        $products = $query->orderBy('id', 'desc')->paginate(12);
        $categories = Categories::orderby('id', 'desc')->get();
        return view('website.recipes', compact('products', 'categories', 'request'));
    }

    public function recipe_detail($slug)
    {
        $product = Products::where('slug', $slug)->first();
        return view('website.recipe_detail', compact('product'));
    }

    public function activities()
    {
        return view('website.activities');
    }

    public function resources()
    {
        return view('website.resources');
    }

    public function blogs()
    {
        $blogs = Blogs::orderBy('id', 'desc')->paginate(6);
        return view('website.blogs', compact('blogs'));
    }

    public function blog_detail($slug)
    {
        $blog = Blogs::where('slug', $slug)->first();
        $blogs = Blogs::inRandomOrder()->limit(4)->get();
        return view('website.blog_detail', compact('blog', 'blogs'));
    }

    public function quiz(Request $request)
    {
        $userId = Auth::guard('websiteuser')->user()->id;
        $today = now()->toDateString();
    
        // Check if a quiz has already been started today
        $todayAttempts = QuizAnswers::where('userid', $userId)
            ->whereDate('created_at', $today)
            ->pluck('quizid');
    
        if ($todayAttempts->isNotEmpty()) {
            $quizid = $todayAttempts->first(); // Assume one quiz per day
        } else {
            $quizid = rand(100000, 999999);
        }
    
        // Get answered questions for this quiz
        $answered = QuizAnswers::where('userid', $userId)
            ->where('quizid', $quizid)
            ->get();
    
        // Get questions that were correctly answered
        $answeredCorrectly = [];
        foreach ($answered as $a) {
            $question = QuizQuestions::with('correctanswer')->find($a->questionid);
            if ($question && $question->correctanswer && $question->correctanswer->option === $a->answer) {
                $answeredCorrectly[] = $a->questionid;
            }
        }
    
        // Only get questions NOT answered correctly
        $query = QuizQuestions::whereNotIn('id', $answeredCorrectly);
    
        // Count how many answered
        $totalAnswers = $answered->count();
    
        // 🟢 New: Flag to track if quiz is finished
        $quizCompleted = false;
    
        if ($totalAnswers >= 10) {
            $quizCompleted = true;
            $correctCount = count($answeredCorrectly);
            $totalQuestion = 10; // 👈 Add this line
        
            return view('website.quiz', compact(
                'quizCompleted', 'correctCount', 'totalAnswers', 'totalQuestion', 'quizid'
            ));
        }
    
        // Else, show next question
        $question = $query->inRandomOrder()->first();
        $totalQuestion = 10;
    
        return view('website.quiz', compact('request', 'question', 'quizid', 'totalQuestion', 'totalAnswers', 'quizCompleted'));
    }
    

    public function savequiz(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'questionid' => 'required',
            'quizid' => 'required',
            'userid' => 'required',
            'answer' => 'required'
        ]);
    
        if ($validator->fails()) {
            return back()->withInput()->with('error', 'All fields required !');
        }
    
        $question = QuizQuestions::findOrFail($request->questionid);
        $correctAnswer = $question->correctanswer->option ?? null;
    
        $data['questionid'] = $request->questionid;
        $data['quizid'] = $request->quizid;
        $data['userid'] = $request->userid;
        $data['answer'] = $request->answer;
        QuizAnswers::create($data);
    
        // Flash result for feedback
        $result = ($request->answer == $correctAnswer) ? 'correct' : 'incorrect';
        session()->flash('quiz_result', $result);
    
        $totalAnswers = QuizAnswers::where('userid', Auth::guard('websiteuser')->user()->id)
            ->where('quizid', $request->quizid)
            ->pluck('questionid')
            ->count();
    
        $totalQuestion = $request->totalQuestion;
    
        // ✅ When quiz is complete, evaluate result
        if ($totalAnswers == $totalQuestion) {
            $allAnswers = QuizAnswers::where('userid', Auth::guard('websiteuser')->user()->id)
                ->where('quizid', $request->quizid)
                ->get();
    
            $correctCount = 0;
            foreach ($allAnswers as $answer) {
                $question = QuizQuestions::with('correctanswer')->find($answer->questionid);
                if ($question && $question->correctanswer && $question->correctanswer->option === $answer->answer) {
                    $correctCount++;
                }
            }
    
            return redirect()->route('user.quiz.results', [
                'correct' => $correctCount,
                'total' => $totalQuestion
            ]);
        } else {
            return redirect()->route('user.quiz', ['quizid' => $request->quizid]);
        }
    }
    
    public function quizResults(Request $request)
{
    $correct = $request->correct;
    $total = $request->total;

    return view('website.quiz_results', compact('correct', 'total'));
}


    public function contactus()
    {
        $system = Setting::first();
        return view('website.contactus', compact('system'));
    }

    public function save_contact_message(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('error', 'All fields required !');
        }
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $contactdetail = ContactMessage::create($data);
        $maildata = ContactMessage::findOrFail($contactdetail->id);
//        return view('website.contactmessages', compact('maildata'));
//        $check = Mail::to("chkhateeb96@gmail.com")->send(new ContactMessages($maildata));
        $check = Mail::to("Veggie-quest@outlook.com")->send(new ContactMessages($maildata));
        if ($check) {
            return back()->with('success', 'Message Sent Successfully.');
        } else {
            return back()->with('error', 'Message Not Sent.');
        }
//        return back()->with('success', 'Message Sent Successfully.');
    }

    public function login()
    {
        if (Auth::guard('websiteuser')->check()) {
            return redirect()->route('/');

        } else {
            return view("website.login");
        }
    }

    public function customerlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        if ($request->type == "user") {
            if (Auth::guard('websiteuser')->attempt(['email' => $request->email, 'password' => $request->password, 'type' => $request->type])) {
                if (Auth::guard('websiteuser')->user()->status == "inactive") {
                    Auth::guard('websiteuser')->logout();
                    return redirect()->back()->with('error', 'Account Inactive / Blocked ! Please Contact with Customer support.')->withErrors("Account Inactive / Blocked ! Please Contact with Customer support.");
                } else {
                    if (Auth::guard('websiteuser')->check()) {
                        return redirect()->route('/');
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Invalid Email or Password !')->withInput()->withErrors("Invalid Email or Password !");
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Email or Password !')->withInput()->withErrors("Invalid Email or Password !");
        }
    }

    public function register()
    {
        if (Auth::guard('websiteuser')->check()) {
            return redirect()->route('/');

        } else {
            return view('website.register');
        }
    }

    public function save_register_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
//            'address' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed', // Ensures password_confirmation matches
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/'
            ],
            'password_confirmation' => 'min:8'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)->with('error', 'Registration Failed.');
        }
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
//        $data['address'] = $request->address;
        $data['password'] = Hash::make($request->password);
        $data['status'] = "active";
        $data['type'] = 'user';
        $userdata = User::create($data);
        return redirect()->route('login')->with('success', 'Successfully Registered.');
    }

    public function forgotpassword()
    {
        return view('website.forgotpassword');
    }

    public function resetpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)->with('error', 'Email Required.')->with('error', 'Email required.');
        }

        $check = User::where('email', $request->email)->where('type', '!=', 'admin')->first();
        $setting = Setting::first();
        if ($check) {
            if ($check->status == "active") {

                $pass = Rand(1000000,100000000);
                $data = User::where('email', $request->email)->where('type', '!=', 'admin')->first();
                $data->password = Hash::make($pass);
                $data->update();
                $data['pass'] = $pass;
                $maildata = $data;
                Mail::to($request->email)->send(new PasswordResetMail($maildata));

                return redirect()->route('login')->with('success', 'Password Sent ! Please Check your email.')->with('success', 'Password Sent ! Please Check your email.');
            } else {
                return back()
                    ->withInput()
                    ->withErrors('Your account is not active please contact with customer support.')->with('error', 'Your account is not active please contact with customer support.');
            }
        } else {
            return back()
                ->withInput()
                ->withErrors('Invalid email !Please enter valid email ')->with('error', 'Invalid Email.');
        }

    }

    public function veggie_facts_benefits()
    {
        return view('website.veggie_facts_benefits');
    }

    public function userlogout(Request $request)
    {
        Auth::guard('websiteuser')->logout();
        return redirect()->route("login")->with('success', 'Successfully Logout.');
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::guard('websiteuser')->user()->id);
        return view("website.profile", compact('user'));
    }

    public function updateuserprofile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
//            'address' => 'required',
            'phone' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

//        update user
        $getData = user::findOrFail(Auth::guard('websiteuser')->user()->id);
        $getData->name = $request->name;
        $getData->phone = $request->phone;
//        $getData->address = $request->address;
        if (isset($request->password)) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Minimum 8 Characters Required for password.');
            }
            $getData->password = Hash::make($request->password);
        }
        $getData->save();
        return redirect()->back()->with('success', 'Data Successfully Updated !');
    }

    public function add_to_wislist($id)
    {
        $product = Products::findOrFail($id);
        $check = wishlist::where('userid', Auth::guard('websiteuser')->user()->id)->where('productid', $id)->count();
        if ($check == 0) {
            $data['userid'] = Auth::guard('websiteuser')->user()->id;
            $data['productid'] = $id;
            wishlist::create($data);
            return redirect()->back()->with('success', 'Successfully Added.');
        } else {
            wishlist::where('userid', Auth::guard('websiteuser')->user()->id)->where('productid', $id)->delete();
            return redirect()->back()->with('success', 'Successfully Removed.');
        }
    }

    public function wishlist()
    {
        $products = wishlist::where('userid', Auth::guard('websiteuser')->user()->id)->get();
        return view("website.wishlist", compact('products'));
    }

    public function quizhistory()
    {
        $quizes = QuizAnswers::where('userid',Auth::guard('websiteuser')->user()->id)->get();
        return view("website.quizhistory", compact('quizes'));
    }

    public function userdashboard()
    {
        $quizes = QuizAnswers::where('userid',Auth::guard('websiteuser')->user()->id)->get();
        $products = wishlist::where('userid', Auth::guard('websiteuser')->user()->id)->get();


        $attemptsPerDay = QuizAnswers::selectRaw('DATE(created_at) as label, COUNT(id) as y')
            ->groupBy('label')
            ->orderBy('label')
            ->get();

        $chartDataJson = $attemptsPerDay->toJson();
        return view("website.userdashboard", compact('quizes','products','chartDataJson'));
    }


public function weeklyVeggieFact()
{
    $weekNumber = now()->weekOfYear;

    $fact = DB::table('veggie_facts')
        ->where('week_number', $weekNumber)
        ->first();

    return view('website.weekly_fact', compact('fact'));
}

}

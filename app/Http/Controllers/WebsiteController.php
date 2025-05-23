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
use App\Models\DailyPuzzle;
use App\Models\UserPuzzleAnswer;
use App\Models\UserTip; 



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
    
        // Get badges for logged-in user
        $user = Auth::guard('websiteuser')->user();
        $badges = [];
    
        if ($user) {
            $badges = \DB::table('user_badges')
                ->where('user_id', $user->id)
                ->pluck('badge_name')
                ->toArray();
        }
            // Fetch featured recipes from Products model
            $featuredRecipes = Products::inRandomOrder()->take(5)->get();


            return view('website.index', compact('vog', 'products', 'categories', 'blogs', 'featuredRecipes','fact', 'badges'));

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

    public function activitiesPage()
    {
        $printables = [
            [
                'title' => 'Broccoli Coloring Sheet',
                'file' => 'Broccoli-Coloring-Page-For-Preschoolers.pdf',
                'icon' => 'colouring-icon1.png',
            ],
            [
                'title' => 'Carrots Coloring Sheet',
                'file' => 'Carrots-Coloring-Page-For-Kids.pdf',
                'icon' => 'colouring-icon2.png',
            ],
            [
                'title' => 'Mushroom Coloring Sheet',
                'file' => 'Mushrooms-Coloring-Sheet.pdf',
                'icon' => 'colouring-icon3.png',
            ],
            [
                'title' => 'Tomatoes Coloring Sheet',
                'file' => 'Vine-Tomatoes-Coloring-Page.pdf',
                'icon' => 'colouring-icon4.png',
            ],
            [
                'title' => 'Onion Coloring Sheet',
                'file' => 'Brown-Onions-Coloring-Page.pdf',
                'icon' => 'colouring-icon5.png',
            ],
            [
                'title' => 'Corn Coloring Sheet',
                'file' => 'Coloring-Page-Of-Corn-On-The-Cob.pdf',
                'icon' => 'colouring-icon6.png',
            ],
            [
                'title' => 'Veg Coloring Sheet',
                'file' => 'Vegetables-Coloring-Pages.pdf',
                'icon' => 'colouring-icon7.png',
            ],
            [
                'title' => 'Mix Veg Coloring Sheets',
                'file' => 'Simple-Outline-Of-Common-Vegetables-For-Preschoolers.pdf',
                'icon' => 'colouring-icon8.png',
            ],
        ];
        $wordSearches = [
            ['file' => 'ADA_BTSWordsearch.pdf', 'title' => 'Food Word Search', 'icon' => 'ws-icon1.png'],
            ['file' => 'healthy_eating_word_search.pdf', 'title' => 'Healthy Eating Word Search', 'icon' => 'ws-icon2.png'],
            ['file' => 'superfoods-word-search.pdf', 'title' => 'Super Foods Word Search', 'icon' => 'ws-icon3.png'],
            // ... add more
        ];
        
        return view('website.activities', compact('printables', 'wordSearches'));
    }

    public function resourcesPage()
    {
        $printables = [
            [
                'title' => 'Broccoli Coloring Sheet',
                'file' => 'Broccoli-Coloring-Page-For-Preschoolers.pdf',
                'icon' => 'colouring-icon1.png',
            ],
            [
                'title' => 'Carrots Coloring Sheet',
                'file' => 'Carrots-Coloring-Page-For-Kids.pdf',
                'icon' => 'colouring-icon2.png',
            ],
            [
                'title' => 'Mushroom Coloring Sheet',
                'file' => 'Mushrooms-Coloring-Sheet.pdf',
                'icon' => 'colouring-icon3.png',
            ],
            [
                'title' => 'Tomatoes Coloring Sheet',
                'file' => 'Vine-Tomatoes-Coloring-Page.pdf',
                'icon' => 'colouring-icon4.png',
            ],
            [
                'title' => 'Onion Coloring Sheet',
                'file' => 'Brown-Onions-Coloring-Page.pdf',
                'icon' => 'colouring-icon5.png',
            ],
            [
                'title' => 'Corn Coloring Sheet',
                'file' => 'Coloring-Page-Of-Corn-On-The-Cob.pdf',
                'icon' => 'colouring-icon6.png',
            ],
            [
                'title' => 'Veg Coloring Sheet',
                'file' => 'Vegetables-Coloring-Pages.pdf',
                'icon' => 'colouring-icon7.png',
            ],
            [
                'title' => 'Mix Veg Coloring Sheets',
                'file' => 'Simple-Outline-Of-Common-Vegetables-For-Preschoolers.pdf',
                'icon' => 'colouring-icon8.png',
            ],
        ];
        $wordSearches = [
            ['file' => 'ADA_BTSWordsearch.pdf', 'title' => 'Food Word Search', 'icon' => 'ws-icon1.png'],
            ['file' => 'healthy_eating_word_search.pdf', 'title' => 'Healthy Eating Word Search', 'icon' => 'ws-icon2.png'],
            ['file' => 'superfoods-word-search.pdf', 'title' => 'Super Foods Word Search', 'icon' => 'ws-icon3.png'],
            // ... add more
        ];

            // Fetch tips from DB
        $tips = UserTip::orderBy('created_at', 'desc')->get();
        // fetch 4 latest blogs 
        $blogs = Blogs::orderBy('id', 'desc')->take(4)->get(); 

        // Pass tips along with other variables
        return view('website.resources', compact('printables', 'wordSearches', 'tips', 'blogs'));

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
    
        // Get correctly answered questions
        $answeredCorrectly = [];
        foreach ($answered as $a) {
            $question = QuizQuestions::with('correctanswer')->find($a->questionid);
            if ($question && $question->correctanswer && $question->correctanswer->option === $a->answer) {
                $answeredCorrectly[] = $a->questionid;
            }
        }
    
        // Quiz logic
        $totalAnswers = $answered->count();
        $totalQuestion = 10;
        $quizCompleted = $totalAnswers >= $totalQuestion;
    
        // Always load puzzles, regardless of quiz completion
        $answeredPuzzleIds = UserPuzzleAnswer::where('userid', $userId)
            ->whereDate('created_at', $today)
            ->pluck('puzzleid')
            ->toArray();
    
        $puzzles = DailyPuzzle::whereNotIn('id', $answeredPuzzleIds)
            ->inRandomOrder()
            ->take(5)
            ->get();
        
        // If the quiz is completed, calculate the number of correct answers and return the quiz view with results.  
        if ($quizCompleted) {
            $correctCount = count($answeredCorrectly);
            return view('website.quiz', compact(
                'quizCompleted', 'correctCount', 'totalAnswers', 'totalQuestion', 'quizid', 'puzzles', 'answeredPuzzleIds'
            ));
        }
        // Select a random unanswered quiz question from the database.
        $question = QuizQuestions::whereNotIn('id', $answeredCorrectly)->inRandomOrder()->first();
    
        return view('website.quiz', compact(
            'request', 'question', 'quizid', 'totalQuestion', 'totalAnswers', 'quizCompleted', 'puzzles', 'answeredPuzzleIds'
        ));
    }

    
    
    
    public function submitPuzzle(Request $request) // Function to handle puzzle answer submission
    {
        // Validate incoming request data: puzzleid must exist, user_answer must be a string
        $request->validate([
            'puzzleid' => 'required|exists:daily_puzzles,id',
            'user_answer' => 'required|string'
        ]);
    
        // Get the logged-in user's ID
        $userId = Auth::guard('websiteuser')->id();
    
        // Get the puzzle ID from the submitted form
        $puzzleId = $request->puzzleid;
    
        // Check if this user has already answered this puzzle before
        $alreadyAnswered = UserPuzzleAnswer::where('userid', $userId)
            ->where('puzzleid', $puzzleId)
            ->exists();
    
        // If they have, show an error and stop them from answering again
        if ($alreadyAnswered) {
            return back()->with('error', 'You already answered this puzzle!');
        }
    
        // Retrieve the puzzle from the database using the puzzle ID
        $puzzle = DailyPuzzle::findOrFail($puzzleId);
    
        // Get the correct answer from the puzzle and clean it (lowercase, no spaces)
        $correctAnswer = strtolower(trim($puzzle->answer));
    
        // Get the user's answer and clean it the same way
        $userAnswer = strtolower(trim($request->user_answer));
    
        // Check if the user's answer is correct (1 for correct, 0 for incorrect)
        $isCorrect = $correctAnswer === $userAnswer ? 1 : 0;
    
        // Save the user's answer into the database, including if it was correct or not
        UserPuzzleAnswer::create([
            'userid' => $userId,
            'puzzleid' => $puzzleId,
            'answer' => $userAnswer,
            'correct' => $isCorrect,
            'created_at' => now()
        ]);
    
        // Create a message based on whether they were correct or not
        $message = $isCorrect ? '🎉 Correct! Well done!' : '❌ Oops! The correct answer was: ' . ucfirst($correctAnswer);
    
        // Redirect back to the previous page with a success message
        return back()->with('success', $message);
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
        return back()->withInput()->with('error', 'All fields required!');
    }

    $question = QuizQuestions::findOrFail($request->questionid);
    $correctAnswer = $question->correctanswer->option ?? null;

    $data['questionid'] = $request->questionid;
    $data['quizid'] = $request->quizid;
    $data['userid'] = $request->userid;
    $data['answer'] = $request->answer;
    QuizAnswers::create($data);

    $result = ($request->answer == $correctAnswer) ? 'correct' : 'incorrect';
    session()->flash('quiz_result', $result);

    $user = Auth::guard('websiteuser')->user();

    $totalAnswers = QuizAnswers::where('userid', $user->id)
        ->where('quizid', $request->quizid)
        ->count();

    $totalQuestion = $request->totalQuestion;

    // Quiz Completed Logic
    if ($totalAnswers == $totalQuestion) {
        // Award first quiz badge if not already awarded
        $badgeName = 'first-quiz-badge';
        $alreadyHasBadge = DB::table('user_badges')
            ->where('user_id', $user->id)
            ->where('badge_name', $badgeName)
            ->exists();

        if (!$alreadyHasBadge) {
            DB::table('user_badges')->insert([
                'user_id' => $user->id,
                'badge_name' => $badgeName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Increment Veggie Power Progress by 20%
        $user->points = min(100, $user->points + 20);
        $user->save();

        // Evaluate correct answers
        $allAnswers = QuizAnswers::where('userid', $user->id)
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
        $featuredRecipes = Products::latest()->take(6)->get(); // or filter by 'featured' column if needed
        return view('website.veggie_facts_benefits', compact('featuredRecipes'));

    }

    public function veggieFacts()
    {
        $featuredRecipes = Product::latest()->take(6)->get(); // pick 6 recent or featured recipes
        return view('your.blade.name', compact('featuredRecipes'));
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
        // Get the currently authenticated user from the 'websiteuser' guard
        $user = Auth::guard('websiteuser')->user();
    
        // Fetch all quiz answers submitted by the user
        $quizes = QuizAnswers::where('userid', $user->id)->get();
    
        // Fetch all wishlist items saved by the user
        $products = wishlist::where('userid', $user->id)->get();
    
        // Aggregate quiz attempts per day: count how many quizzes the user attempted on each day
        $attemptsPerDay = QuizAnswers::selectRaw('DATE(created_at) as label, COUNT(id) as y')
            ->where('userid', $user->id)
            ->groupBy('label')  // Group the attempts by date
            ->orderBy('label')  // Order by date
            ->get();
    
        // Convert the aggregated data into JSON format for use in a chart (e.g., chart.js)
        $chartDataJson = $attemptsPerDay->toJson();
    
        // Fetch the names of all badges earned by the user as an array
        $badges = DB::table('user_badges')
            ->where('user_id', $user->id)
            ->pluck('badge_name')  // Only get the badge names
            ->toArray();  // Convert to a plain array
    
        // Return the user dashboard view with all the data: quizzes, wishlist, chart data, badges, and user info
        return view("website.userdashboard", compact('quizes', 'products', 'chartDataJson', 'badges', 'user'));
    }



public function weeklyVeggieFact()
{
    $weekNumber = now()->weekOfYear;

    $fact = DB::table('veggie_facts')
        ->where('week_number', $weekNumber)
        ->first();

    return view('website.weekly_fact', compact('fact'));
}

public function submitTip(Request $request)
{
    $request->validate([
        'tip' => 'required|string|max:1000',
    ]);

    UserTip::create([
        'name' => $request->name,
        'tip' => $request->tip,
    ]);

    return back()->with('success', 'Thank you for your tip!');
}

public function updateProgress(Request $request)
{
    $user = Auth::guard('websiteuser')->user();

    if ($user) {
        $user->points = min(100, intval($request->points));
        $user->save();
        return response()->json(['success' => true, 'points' => $user->points]);
    }

    return response()->json(['success' => false], 401);
}

public function checkUser()
{
    $user = Auth::guard('websiteuser')->user();
    return $user ? "Logged in as user ID: " . $user->id : "Not logged in";
}

public function awardBadge(Request $request)
{
    $user = Auth::guard('websiteuser')->user();
    $badgeName = $request->badge_name;

    if (!$user || !$badgeName) {
        return response()->json(['success' => false, 'message' => 'Invalid request.'], 400);
    }

    $alreadyHasBadge = DB::table('user_badges')
        ->where('user_id', $user->id)
        ->where('badge_name', $badgeName)
        ->exists();

    if (!$alreadyHasBadge) {
        DB::table('user_badges')->insert([
            'user_id' => $user->id,
            'badge_name' => $badgeName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['success' => true, 'badge' => $badgeName]);
    }

    return response()->json(['success' => false, 'message' => 'Badge already exists']);
}



}

<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\QuizOptions;
use App\Models\QuizQuestions;
use App\Models\Setting;
use App\Models\PlatformFee;
use Illuminate\Http\Request;
use Validator;
use Hash;

class QuizController extends Controller
{
    public function managequiz()
    {
        $questions = QuizQuestions::orderby('id', 'desc')->get();
        return view('admin.managequiz', compact('questions'));
    }

    public function savequizquestionoptions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $data['question'] = $request->question;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_new = rand(1000, 1000000) . "-" . time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $data['image'] = $image_new;
        }
        $question = QuizQuestions::create($data);

        foreach ($request->option as $o=>$op)
        {
            $Optiondata['questionid'] = $question->id;
            $Optiondata['option'] = $op;
            $Optiondata['correct'] = $request->answer[$o];
            QuizOptions::create($Optiondata);
        }
//        $row_no = $request->correct;
//        $rec = QuizOptions::where('questionid',$question->id)->get();
//        $rec[$row_no]->update(['correct' => '1']);
        return redirect()->back()->with('success', 'Data Successfully Added !');
    }

    public function updatequizquestionoption(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $getData = QuizQuestions::findOrFail($request->id);
        $getData->question = $request->question;
        if ($request->hasFile('image')) {

            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid Image');
            }

            if (\File::exists(public_path('admin/assets/uploads/' . $getData->image))) {

                \File::delete(public_path('admin/assets/uploads/' . $getData->image));
            }

            $image = $request->file('image');
            $image_new = rand(1000, 1000000) . "-" . time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $getData->image = $image_new;
        }
        $getData->update();
        QuizOptions::where('questionid',$request->id)->delete();
        foreach ($request->option as $o=>$op)
        {
            $Optiondata['questionid'] = $request->id;
            $Optiondata['option'] = $op;
            $Optiondata['correct'] = $request->answer[$o];
            QuizOptions::create($Optiondata);
        }
        return redirect()->back()->with('success', 'Data Successfully Updated !');
    }

    public function deletequestion($id)
    {
        $getData = QuizQuestions::findOrFail(decrypt($id));
        if (\File::exists(public_path('admin/assets/uploads/' . $getData->image))) {

            \File::delete(public_path('admin/assets/uploads/' . $getData->image));
        }
        $getData->delete();
        QuizOptions::where('questionid',decrypt($id))->delete();
        return redirect()->back()->with('success', 'Data Successfully Deleted !');
    }

}

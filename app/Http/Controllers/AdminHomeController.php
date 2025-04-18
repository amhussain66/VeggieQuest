<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Categories;
use App\Models\ContactMessage;
use App\Models\Contactus;
use App\Models\OrderUserDetail;
use App\Models\Products;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Shops;
use App\Models\Sliders;
use App\Models\SubCategories;
use App\Models\User;
use App\Models\WebsiteSetting;
use App\Models\Sale;
use App\Models\Expense;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use Carbon\Carbon;

class AdminHomeController extends Controller
{
    public function Dashboard()
    {
        $website = Setting::first();
        $categories = Categories::count();
        return view('admin.index',compact('website'));
    }

    public function AdminProfile()
    {
        $admin = User::findOrFail(Auth::user()->id);
        return view("admin.profile", compact("admin"));
    }

    public function updateprofile(Request $request)
    {
        $GetData = User::findOrFail(Auth::user()->id);
        if (isset($request->name)) {
            $GetData->name = $request->name;
        }

        if (isset($request->phone)) {
            $GetData->phone = $request->phone;
        }

        if (isset($request->address)) {
            $GetData->address = $request->address;
        }

        if (isset($request->email)) {
            $GetData->email = $request->email;
        }
        if (isset($request->password)) {

            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:8'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Please Enter Valid Password !');
            }
            $GetData->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile')) {
            $validator = Validator::make($request->all(), [
                'profile' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid Profile Picture');
            }

            if (\File::exists(public_path('admin/assets/uploads/' . $GetData->image))) {

                \File::delete(public_path('admin/assets/uploads/' . $GetData->image));
            }

            $image = $request->file('profile');
            $image_new = time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $GetData->image = $image_new;
        }

        $GetData->save();
        return back()->with('success', 'Profile Updated Successfully !');
    }

    public function contact_messages()
    {
        $contact_messages = ContactMessage::all();
        return view("admin.contact_messages", compact('contact_messages'));
    }

    public function delete_contact_message($id)
    {
        $getData = ContactMessage::findOrFail(decrypt($id));
        $getData->delete();
        return back()->with('success', __('language.successfully_deleted'));
    }

}

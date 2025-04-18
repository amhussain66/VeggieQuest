<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use App\Models\UsersLoginHistory;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Hash;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Clipboard;
use Intervention\Image\ImageManagerStatic as Image;
use App\Mail\PasswordResetMail;
use App\Mail\AccountConfirmation;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function UsersList()
    {
        $users = User::where('id','>',1)->get();
        return view("admin.users.userslist", compact('users'));
    }

    public function AddUsers()
    {
        return view("admin.users.addusers");
    }

    public function saveuserrecord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required',
//            'address' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['phone'] = $request->phone;
        $data['status'] = $request->status;
//        $data['address'] = $request->address;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_new = time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $data['image'] = $image_new;
        }
        user::create($data);
        return redirect()->route('admin.UsersList')->with('success', 'Data Successfully Added !');
    }

    public function deleteuser($id)
    {
        $getData = user::findOrFail(decrypt($id));
        if (\File::exists(public_path('admin/assets/uploads/' . $getData->image))) {

            \File::delete(public_path('admin/assets/uploads/' . $getData->image));
        }
        $getData->delete();
        return back()->with('success', 'Data Deleted Successfully !');
    }

    public function edituser($id)
    {
        $user = user::findOrFail(decrypt($id));
        return view('admin.users.edituser', compact('user'));
    }

    public function updateuserrecord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
//            'address' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $getData = user::findOrFail(decrypt($request->id));

        $EmailCheck = user::where('email', $request->email)->where('id', '!=', $getData->id)->count();
        if ($EmailCheck > 0) {
            return back()->with('error', 'This email is already taken.');
            dd("stop");
        }

        if (isset($request->name)) {
            $getData->name = $request->name;
        }
        if (isset($request->email)) {
            $getData->email = $request->email;
        }
        if (isset($request->password)) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8'
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $getData->password = Hash::make($request->password);
        }
        if (isset($request->phone)) {
            $getData->phone = $request->phone;
        }
        if (isset($request->status)) {
            $getData->status = $request->status;
        }
//        if (isset($request->address)) {
//            $getData->address = $request->address;
//        }

        if ($request->hasFile('image')) {

            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid Image');
            }

            if (\File::exists(public_path('admin/assets/uploads/' . $getData->image))) {

                \File::delete(public_path('admin/assets/uploads/' . $getData->image));
            }


            $image = $request->file('image');
            $image_new = time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $getData->image = $image_new;
        }
        $getData->save();
        return redirect()->route('admin.UsersList')->with('success', 'Data Successfully Added !');
    }

}

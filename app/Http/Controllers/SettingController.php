<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Setting;
use App\Models\PlatformFee;
use Illuminate\Http\Request;
use Validator;
use Hash;

class SettingController extends Controller
{
    public function setting()
    {
        $system = Setting::findOrFail(1);
        return view('admin.setting', compact('system'));
    }

    public function updatesetting(Request $request)
    {
        $getData = Setting::first();
        if (isset($request->name)) {
            $getData->name = $request->name;
        }
        if (isset($request->phone)) {
            $getData->phone = $request->phone;
        }
        if (isset($request->email)) {
            $getData->email = $request->email;
        }
        if (isset($request->location)) {
            $getData->location = $request->location;
        }

        if (isset($request->footer_description)) {
            $getData->footer_description = $request->footer_description;
        }
        if (isset($request->tinymce_api_key)) {
            $getData->tiny_api_key = $request->tinymce_api_key;
        }
        if ($request->hasFile('logo')) {
            $validator = Validator::make($request->all(), [
                'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid Logo');
            }

            if (\File::exists(public_path('admin/assets/uploads/' . $getData->logo))) {

                \File::delete(public_path('admin/assets/uploads/' . $getData->logo));
            }

            $image = $request->file('logo');
            $image_new = time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $getData->logo = $image_new;
        }
        if ($request->hasFile('favicon')) {
            $validator = Validator::make($request->all(), [
                'favicon' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid favicon');
            }

            if (\File::exists(public_path('admin/assets/uploads/' . $getData->favicon))) {

                \File::delete(public_path('admin/assets/uploads/' . $getData->favicon));
            }

            $image = $request->file('favicon');
            $image_new = time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $getData->favicon = $image_new;
        }
        if ($request->hasFile('adminlogo')) {
            $validator = Validator::make($request->all(), [
                'adminlogo' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid favicon');
            }

            if (\File::exists(public_path('admin/assets/uploads/' . $getData->adminlogo))) {

                \File::delete(public_path('admin/assets/uploads/' . $getData->adminlogo));
            }

            $image = $request->file('adminlogo');
            $image_new = time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $getData->adminlogo = $image_new;
        }
        $getData->save();
        return back()->with('success', 'Successfully Updated !');
    }

    public function privacybanner()
    {
        $banner = Banners::where('id', 5)->first();
        return view("admin.privacybanner", compact('banner'));
    }

    public function updateprivacybanner(Request $request)
    {
        $getData = Banners::where('id', 5)->first();
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid Banner');
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
        return back()->with('success', 'Successfully Updated !');
    }

    public function privacycontent()
    {
        $privacy = Setting::first();
        $setting = Setting::first();
        return view("admin.privacy", compact('privacy', 'setting'));
    }

    public function updateprivacycontent(Request $request)
    {
        $getData = Setting::first();
        if (isset($request->privacy)) {
            $getData->privacy = $request->privacy;
        }
        if (isset($request->terms_condition)) {
            $getData->terms_condition = $request->terms_condition;
        }
        $getData->save();
        return back()->with('success', 'Successfully Updated !');
    }

    public function platformfee(Request $request)
    {
        $platformfees = PlatformFee::all();
        return view("admin.platformfee", compact('platformfees'));
    }

    public function saveplatformfee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'percentage' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Heading & Percentage required');
        }
        $data['name'] = $request->name;
        $data['percentage'] = $request->percentage;
        $check = PlatformFee::create($data);
        if ($check) {
            return back()->with('success', 'Data Successfully Added !');
        } else {
            return back()->with('error', 'Error occur !');
        }
    }

    public function updatplatformfee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'percentage' => 'required|numeric',
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Heading & Percentage required');
        }
        $platformfees = PlatformFee::findOrFail(decrypt($request->id));
        $platformfees->name = $request->name;
        $platformfees->percentage = $request->percentage;
        $platformfees->save();
        return back()->with('success', 'Data Successfully Updated !');
    }

    public function deleteplatformfee($id)
    {
        $getData = PlatformFee::findOrFail(decrypt($id));
        $getData->delete();
        return back()->with('success', 'Data Deleted Successfully !');
    }


}

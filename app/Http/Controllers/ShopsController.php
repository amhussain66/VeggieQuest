<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Banners;
use App\Models\Blogs;
use App\Models\Blogscategories;
use App\Models\CompanyBenefits;
use App\Models\home_experience;
use App\Models\Newsletter;
use App\Models\OrderProductsDetail;
use App\Models\Ourintroduction;
use App\Models\Ourpartners;
use App\Models\Ourteam;
use App\Models\ProductCategories;
use App\Models\Products;
use App\Models\Seminars;
use App\Models\Services;
use App\Models\Shops;
use App\Models\Sliders;
use App\Models\Whatwedo;
use App\Models\Workprocess;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopsController extends Controller
{
    public function ManageShops()
    {
        $shops = Shops::orderBy('id','desc')->get();
        return view("admin.shops", compact('shops'));
    }

    public function saveshop(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        if (isset($request->email) && !empty($request->email)) {
            $data['email'] = $request->email;
        }
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid Image');
            }

            $image = $request->file('image');
            $image_new = time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $data['image'] = $image_new;
        }
        Shops::create($data);
        return redirect()->back()->with('success', 'Data Successfully Added !');
    }

    public function deleteshop($id)
    {
        Shops::findOrFail(decrypt($id))->delete();
        return redirect()->back()->with('success', 'Data Successfully Deleted !');
    }

    public function updateshop(Request $request)
    {
        $GetData = Shops::findOrFail($request->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
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
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Invalid image');
            }

            if (\File::exists(public_path('admin/assets/uploads/' . $GetData->image))) {

                \File::delete(public_path('admin/assets/uploads/' . $GetData->image));
            }

            $image = $request->file('image');
            $image_new = time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $GetData->image = $image_new;
        }
        $GetData->save();
        return redirect()->back()->with('success', 'Data Successfully Added !');
    }


}

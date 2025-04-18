<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Setting;
use App\Models\VeggiOfMonth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
{

    public function addproducts()
    {
        $setting = Setting::first();
        $categories = Categories::all();
        return view("admin.addproducts", compact('setting','categories'));
    }

    public function saveproducts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|string|max:255',
            'categoryid' => 'required',
            'ingredients' => 'required',
            'prepration_time' => 'required',
            'serve' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'All fields Required .');
        }
        $validator1 = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp'
        ]);

        if ($validator1->fails()) {
            return back()->with('error', 'Image Must be in jpg,png,jpeg,gif,svg.');
        }

        $data['heading'] = $request->heading;
        $data['categoryid'] = $request->categoryid;
        $data['ingredients'] = $request->ingredients;
        $data['prepration_time'] = $request->prepration_time;
        $data['serve'] = $request->serve;
        $data['description'] = $request->description;
        $data['slug'] = Str::slug($request->heading);

//        check slug already exist
        $CheckSlug = Products::where('slug', Str::slug($request->heading))->count();
        if ($CheckSlug > 0) {
            return back()->with('error', 'This heading is already exist .');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_new = rand(1000, 1000000) . "-" . time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $data['image'] = $image_new;
        }
        $bloddetail = Products::create($data);
        return redirect()->route('admin.productslist')->with('success', 'Successfully Added.');
    }

    public function productslist()
    {
        $products = Products::orderBy('id', 'desc')->get();
        return view('admin.productslist', compact('products'));
    }

    public function deleteproduct($id)
    {
        $getData = Products::findOrFail($id);
        if (\File::exists(public_path('admin/assets/uploads/' . $getData->image))) {

            \File::delete(public_path('admin/assets/uploads/' . $getData->image));
        }

        $getData->delete();
        return back()->with('success', 'Successfully Deleted');
    }

    public function editproduct($id)
    {
        $product = Products::findOrFail(decrypt($id));
        $setting = Setting::first();
        $categories = Categories::all();
        return view('admin.editproduct', compact('product', 'setting','categories'));
    }

    public function updateproducts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|string|max:255',
            'categoryid' => 'required',
            'ingredients' => 'required',
            'prepration_time' => 'required',
            'serve' => 'required',
            'id' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'All fields Required .');
        }

        $getData = Products::findOrFail(decrypt($request->id));
        $getData->heading = $request->heading;
        $getData->categoryid = $request->categoryid;
        $getData->ingredients = $request->ingredients;
        $getData->prepration_time = $request->prepration_time;
        $getData->serve = $request->serve;
        $getData->description = $request->description;
        $CheckSlug = Products::where('slug', Str::slug($request->heading))->where('id', '!=', decrypt($request->id))->count();
        if ($CheckSlug > 0) {
            return back()->with('error', 'This heading is already exist .');
        } else {
            $getData->slug = Str::slug($request->heading);
        }

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


        $getData->save();

        return redirect()->route('admin.productslist')->with('success', 'Successfully Updated');
    }

    public function veggiofmonth()
    {
        $vog = VeggiOfMonth::first();
        return view("admin.veggiofmonth", compact('vog'));
    }

    public function updatevog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'All fields Required .');
        }

        $getData = VeggiOfMonth::first();
        $getData->description = $request->description;
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


        $getData->save();

        return redirect()->back()->with('success', 'Successfully Updated');
    }

}

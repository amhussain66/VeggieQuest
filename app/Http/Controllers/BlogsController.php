<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BlogsController extends Controller
{

    public function addblogs()
    {
        $setting = Setting::first();
        return view("admin.addblogs", compact('setting'));
    }

    public function saveblogs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|string|max:255',
            'image' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Heading , Category & Description Required .');
        }
        $validator1 = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp'
        ]);

        if ($validator1->fails()) {
            return back()->with('error', 'Image Must be in jpg,png,jpeg,gif,svg.');
        }

        $data['heading'] = $request->heading;
        $data['description'] = $request->description;
        $data['slug'] = Str::slug($request->heading);

//        check slug already exist
        $CheckSlug = Blogs::where('slug', Str::slug($request->heading))->count();
        if ($CheckSlug > 0) {
            return back()->with('error', 'This heading is already exist .');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_new = rand(1000, 1000000) . "-" . time() . $image->getClientOriginalName();
            $image->move('admin/assets/uploads/', $image_new);
            $data['image'] = $image_new;
        }
        $bloddetail = Blogs::create($data);
        return redirect()->route('admin.blogslist')->with('success', 'Successfully Added.');
    }

    public function blogslist()
    {
        $blogs = Blogs::orderBy('id', 'desc')->get();
        return view('admin.blogs', compact('blogs'));
    }

    public function deleteblog($id)
    {
        $getData = Blogs::findOrFail($id);
        if (\File::exists(public_path('admin/assets/uploads/' . $getData->image))) {

            \File::delete(public_path('admin/assets/uploads/' . $getData->image));
        }

        $getData->delete();
        return back()->with('success', 'Successfully Deleted');
    }

    public function editblog($id)
    {
        $blog = Blogs::findOrFail(decrypt($id));
        $setting = Setting::first();
        return view('admin.editblogs', compact('blog', 'setting'));
    }

    public function updateblogs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|string|max:255',
            'description' => 'required',
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Heading , Category and Description Required .');
        }

        $getData = Blogs::findOrFail(decrypt($request->id));
        $getData->heading = $request->heading;
        $getData->description = $request->description;
        $CheckSlug = Blogs::where('slug', Str::slug($request->heading))->where('id', '!=', decrypt($request->id))->count();
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

        return redirect()->route('admin.blogslist')->with('success', 'Successfully Updated');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Inventory;
use App\Models\Stock;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Lookups extends Controller
{
    public function Categories()
    {
        $categories = Categories::orderby('id', 'desc')->get();
        return view('admin.lookups.categories', compact('categories'));
    }

    public function savecategories(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('categories', 'name')->whereNull('deleted_at'),
            ]
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $data['name'] = $request->name;
        if (isset($request->detail) && !empty($request->detail)) {
            $data['detail'] = $request->detail;
        }
        Categories::create($data);
        return redirect()->back()->with('success', 'Data Successfully Added !');
    }

    public function updatecategories(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $data = Categories::findOrFail($request->id);
        $data->name = $request->name;
        $data->detail = $request->detail;
        $data->update();
        return redirect()->back()->with('success', 'Data Successfully Updated !');
    }

    public function deletecategory($id)
    {
        Categories::findOrFail(decrypt($id))->delete();
        return redirect()->back()->with('success', 'Data Successfully Deleted !');
    }


}

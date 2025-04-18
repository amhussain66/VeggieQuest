<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Inventory;
use App\Models\Setting;
use App\Models\SubCategories;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{

    public function ManageInvenntory()
    {
        $inventories = \App\Models\Inventory::with(['category_data','subcategory_data','subcategory_data.inventory_data','subcategory_data.sale_data'])->orderBy('id', 'desc')->get();
        return view('admin.inventory.manageinvenntory', compact('inventories'));
    }

    public function AddInventory()
    {
        $categories = Categories::orderBy('id', 'desc')->get();
        return view("admin.inventory.addinventory", compact('categories'));
    }

    public function GetSubCategories(Request $request)
    {
        $subcategories = SubCategories::where('categoryid', $request->categoryid)->get();
        $options = "";
        if (sizeof($subcategories) > 0) {
            foreach ($subcategories as $subcategoriess) {
                $options .= '<option value="' . $subcategoriess->id . '">' . $subcategoriess->name . '</option>';
            }
        } else {
            $options .= '<option value="">No Record Found</option>';
        }
        return $options;
    }

    public function saveinventory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryid' => 'required',
            'subcategoryid' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total_price' => 'required',
            'sale_price' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data['categoryid'] = $request->categoryid;
        $data['subcategoryid'] = $request->subcategoryid;
        $data['quantity'] = $request->quantity;
        $data['price'] = $request->price;
        $data['total_price'] = $request->total_price;
        $data['sale_price'] = $request->sale_price;
        if (isset($request->description) && !empty($request->description)) {
            $data['description'] = $request->description;
        }


        $check = Inventory::create($data);
        if ($check) {
            return back()->with('success', 'Successfully Added !');
        } else {
            return back()->with('error', 'Erorr Occur!');
        }
    }


}

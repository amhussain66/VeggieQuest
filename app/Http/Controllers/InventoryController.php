<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Inventory;
use App\Models\Shops;
use App\Models\SubCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class InventoryController extends Controller
{

    public function ManageInvenntory()
    {
        $inventories = Inventory::orderBy('id', 'desc')->get();
        return view('admin.inventory.manageinvenntory', compact('inventories'));
    }

    public function editinventory($id)
    {
        $categories = Categories::orderBy('id', 'desc')->get();
        $shops = Shops::all();
        $inventorydata = Inventory::findOrFail(decrypt($id));
        $products = SubCategories::where('categoryid', $inventorydata->categoryid)->get();
        return view('admin.inventory.editinvenntory', compact('inventorydata', 'categories', 'shops', 'products'));
    }

    public function AddInventory()
    {
        $categories = Categories::orderBy('id', 'desc')->get();
        $shops = Shops::all();
        return view("admin.inventory.addinventory", compact('categories', 'shops'));
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
            'date' => 'required',
            'sale_price' => 'required'
//            'shopid' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $ts = sizeof($request->categoryid);
        $inventoryid = rand(1000, 1000000);
        for ($i = 0; $i < $ts; $i++) {
            $data['inventoryid'] = $inventoryid;
            $data['categoryid'] = $request->categoryid[$i];
            $data['subcategoryid'] = $request->subcategoryid[$i];
            $data['quantity'] = $request->quantity[$i];
            $data['price'] = $request->price[$i];
            $data['total_price'] = $request->total_price[$i];
            $data['sale_price'] = $request->sale_price[$i];
            $data['date'] = $request->date[$i];
            if (isset($request->shopid[$i]) && !empty($request->shopid[$i])) {
                $data['shopid'] = $request->shopid[$i];
            }
//            $data['shopid'] = ($request->shopid[$i]) ? $request->shopid[$i] : null;
            if (isset($request->description) && !empty($request->description)) {
                $data['description'] = $request->description;
            }
            $data['imei1'] = NULL;
            $data['imei2'] = NULL;
            if (isset($request->imei1[$i]) && !empty($request->imei1[$i])) {
                $data['imei1'] = $request->imei1[$i];
            }
            if (isset($request->imei2[$i]) && !empty($request->imei2[$i])) {
                $data['imei2'] = $request->imei2[$i];
            }
            $check = Inventory::create($data);
//            if ($check) {
//                $stock = Stock::where('categoryid', $request->categoryid[$i])->where('subcategoryid', $request->subcategoryid[$i])->first();
//                $stock->quantity = ($stock->quantity + $request->quantity[$i]);
//                $stock->remaining = ($stock->remaining + $request->quantity[$i]);
//                $stock->update();
//            }
        }
        return redirect()->route('admin.ManageInvenntory')->with('success', 'Data Successfully Added !');

    }

    public function updateinventory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'categoryid' => 'required',
            'subcategoryid' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total_price' => 'required',
//            'shopid' => 'required',
            'date' => 'required',
            'sale_price' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $GetData = Inventory::findOrFail(decrypt($request->id));
        $GetData->categoryid = $request->categoryid;
        $GetData->subcategoryid = $request->subcategoryid;
        $GetData->price = $request->price;
        $GetData->quantity = $request->quantity;
        $GetData->total_price = $request->total_price;
        if (isset($request->shopid) && !empty($request->shopid)) {
            $GetData->shopid = $request->shopid;
        }
        $GetData->sale_price = $request->sale_price;
        $GetData->date = $request->date;
        $GetData->imei1 = $request->imei1;
        $GetData->imei2 = $request->imei2;
        $GetData->updated_by = Auth::user()->id;
        $GetData->update();
        return redirect()->route('admin.ManageInvenntory')->with('success', 'Successfully Updated !');

    }

    public function deleteinventory($id)
    {
        Inventory::findOrFail(decrypt($id))->delete();
        return back()->with('success', 'Successfully Deleted !');
//        $inventory = Inventory::findOrFail(decrypt($id));
//        $stockcheck = Stock::where('categoryid',$inventory->categoryid)->where('subcategoryid',$inventory->subcategoryid)->first();
//
//        if((intval($stockcheck->quantity)>=intval($inventory->quantity)) && intval($stockcheck->remaining)>=intval($inventory->quantity) )
//        {
//            $stockcheck->quantity = ($stockcheck->quantity-$inventory->quantity);
//            $stockcheck->remaining = ($stockcheck->remaining-$inventory->quantity);
//            $stockcheck->update();
//            Inventory::findOrFail(decrypt($id))->delete();
//            return back()->with('success', 'Successfully Deleted !');
//        }
//        else
//        {
//            return back()->with('error', 'Stock Low of this product !');
//        }
    }


    public function ManageMobileStock()
    {
        $stocks = SubCategories::where('categoryid',30)->orderBy('id', 'desc')->get();
        return view('admin.inventory.managestock', compact('stocks'));
    }

    public function ManagePanelStock()
    {
        $stocks = SubCategories::where('categoryid',29)->orderBy('id', 'desc')->get();
        return view('admin.inventory.managepanelstock', compact('stocks'));
    }


}

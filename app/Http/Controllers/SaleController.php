<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Categories;
use App\Models\Contactus;
use App\Models\Expense;
use App\Models\Inventory;
use App\Models\OrderUserDetail;
use App\Models\Products;
use App\Models\Sale;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Sliders;
use App\Models\Stock;
use App\Models\SubCategories;
use App\Models\User;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;

class SaleController extends Controller
{
    public function ManageSale(Request $request)
    {
        $query1 = Sale::query();
        $query2 = Expense::query();
        if(isset($request->date) && !empty($request->date))
        {
            $query1->whereDate('date',Carbon::parse($request->date));
            $query2->whereDate('date',Carbon::parse($request->date));
        }
        else
        {
            $query1->whereDate('date', Carbon::now());
            $query2->whereDate('date', Carbon::now());
        }
        $sales = $query1->orderBy('id', 'desc')->get();
        $expense = $query2->orderBy('id', 'desc')->get();
        $pending_sales = Sale::where('payment_status','0')->get();
        return view('admin.inventory.managesale', compact('sales','expense','request','pending_sales'));
    }

    public function ManageDailySale()
    {
        $subcategories = SubCategories::orderBy('id', 'desc')->get();
        return view("admin.inventory.adddailysale", compact('subcategories'));
    }

    public function get_latest_price($id)
    {
        $price = Inventory::where('subcategoryid', $id)->orderBy('created_at', 'desc')->first();
        $total_quantity = Inventory::where('subcategoryid', $id)->whereNull('deleted_by')->sum('quantity');
        $sold_quantity = Sale::where('subcategoryid', $id)->whereNull('deleted_by')->sum('quantity');
        $remaining_quantity = $total_quantity - $sold_quantity;
        $response['price'] = $price->sale_price;
        $response['remaining'] = $remaining_quantity;
        return $response;
    }

    public function save_sale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subcategoryid' => 'required',
            'price' => 'required',
            'date' => 'required',
            'quantity' => 'required',
            'payment_status' => 'required',
            'total_price' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $ts = sizeof($request->subcategoryid);
        $saleid = rand(1000, 1000000);
        for ($i = 0; $i < $ts; $i++) {

            $category_data = SubCategories::findOrFail($request->subcategoryid[$i]);

            $data['saleid'] = $saleid;
            $data['categoryid'] = $category_data->categoryid;
            $data['subcategoryid'] = $request->subcategoryid[$i];
            $data['quantity'] = $request->quantity[$i];
            $data['price'] = $request->price[$i];
            $data['total_price'] = $request->total_price[$i];
            $data['sale_detail'] = ($request->sale_detail[$i]) ? $request->sale_detail[$i] : '';
            $data['payment_status'] = $request->payment_status[$i];
            $data['date'] = $request->date;
            $check = Sale::create($data);
        }
        return redirect()->route('admin.ManageSale')->with('success', 'Data Successfully Added !');

    }

    public function update_daily_sale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'price' => 'required',
            'date' => 'required',
            'quantity' => ['required', 'numeric', 'min:1'],
            'payment_status' => 'required',
            'total_price' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $GetData = Sale::findOrFail(decrypt($request->id));
        $total_quantity = Inventory::where('subcategoryid', $GetData->subcategoryid)->whereNull('deleted_by')->sum('quantity');
        $sold_quantity = Sale::where('subcategoryid', $GetData->subcategoryid)->whereNull('deleted_by')->sum('quantity');
        $remaining_quantity = $total_quantity - $sold_quantity;
        if ($request->quantity > $remaining_quantity) {
            return redirect()->back()->with('error', 'Stock Low.');
        } else {
            $GetData->price = $request->price;
            $GetData->quantity = $request->quantity;
            $GetData->date = Carbon::parse($request->date);
            $GetData->total_price = ($request->price * $request->quantity);
            $GetData->sale_detail = $request->sale_detail;
            $GetData->payment_status = $request->payment_status;
            $GetData->updated_by = Auth::user()->id;
            $GetData->update();
            return redirect()->route('admin.ManageSale')->with('success', 'Data Successfully Updates !');
        }

    }

    public function updatedailyexpense(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'date' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $GetData = Expense::findOrFail($request->id);
        $GetData->name = $request->name;
        $GetData->price = $request->price;
        $GetData->date = Carbon::parse($request->date);
        $GetData->detail = $request->detail;
        $GetData->updated_by = Auth::user()->id;
        $GetData->update();
        return redirect()->route('admin.ManageSale')->with('success', 'Data Successfully Updates !');

    }

    public function deletesale($id)
    {
        Sale::findOrFail(decrypt($id))->delete();
        return back()->with('success', 'Successfully Deleted !');
    }

    public function deleteexpense($id)
    {
        Expense::findOrFail(decrypt($id))->delete();
        return back()->with('success', 'Successfully Deleted !');
    }

    public function editsale($id)
    {
        $sale = Sale::findOrFail(decrypt($id));
        return view('admin.inventory.editdailysale', compact('sale'));
    }

    public function savedailyexpense(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'date' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['date'] = $request->date;
        if (isset($request->detail) && !empty($request->detail)) {
            $data['detail'] = $request->detail;
        }
        $check = Expense::create($data);
        if ($check) {
            return redirect()->route('admin.ManageSale')->with('success', 'Data Successfully Added !');
        } else {
            return redirect()->back()->with('error', 'Error !');
        }

    }
}

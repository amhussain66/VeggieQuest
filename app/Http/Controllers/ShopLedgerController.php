<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Banners;
use App\Models\Blogs;
use App\Models\Blogscategories;
use App\Models\CompanyBenefits;
use App\Models\home_experience;
use App\Models\LedgerSale;
use App\Models\LedgerSalePrices;
use App\Models\Newsletter;
use App\Models\OrderProductsDetail;
use App\Models\Ourintroduction;
use App\Models\Ourpartners;
use App\Models\Ourteam;
use App\Models\ProductCategories;
use App\Models\Products;
use App\Models\Sale;
use App\Models\Seminars;
use App\Models\Services;
use App\Models\Shops;
use App\Models\Sliders;
use App\Models\SubCategories;
use App\Models\Whatwedo;
use App\Models\Workprocess;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class ShopLedgerController extends Controller
{
    public function manage_shop_ledger()
    {
        $shops = Shops::orderBy('id', 'desc')->get();
        return view("admin.manage_shop_ledger", compact('shops'));
    }

    public function shop_ledger($id)
    {
        $shop = Shops::findOrFail(decrypt($id));
        $subcategories = SubCategories::orderBy('id', 'desc')->get();
        return view("admin.shop_ledger", compact('shop','subcategories'));
    }

    public function save_shop_ledger_sale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shopid' => 'required',
            'date' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
//        dd($request->all());
        $ts = sizeof($request->subcategoryid);
        $saleid = rand(1000, 1000000);
        for ($i = 0; $i < $ts; $i++) {
            $category_data = SubCategories::findOrFail($request->subcategoryid[$i]);
            $data['saleid'] = $saleid;
            $data['userid'] = Auth::user()->id;
            $data['shopid'] = $request->shopid;
            $data['categoryid'] = $category_data->categoryid;
            $data['name'] = $category_data->name;
            $data['subcategoryid'] = $request->subcategoryid[$i];
            $data['quantity'] = $request->quantity[$i];
            $data['price'] = $request->price[$i];
            $data['total_price'] = $request->total_price[$i];
            $data['type'] = "system";
            $data['date'] = $request->date;
            $check = LedgerSale::create($data);
        }
        $cs = sizeof($request->custom_product_name);
        for ($ii = 0; $ii < $cs; $ii++) {

            $customdata['saleid'] = $saleid;
            $customdata['userid'] = Auth::user()->id;
            $customdata['shopid'] = $request->shopid;
            $customdata['name'] = $request->custom_product_name[$ii];
            $customdata['price'] = $request->Customprice[$ii];
            $customdata['quantity'] = $request->Customquantity[$ii];
            $customdata['total_price'] = floatval($request->Customtotal_price[$ii]);
            $customdata['type'] = "custom";
            $customdata['date'] = $request->date;
            LedgerSale::create($customdata);
        }
        if(isset($request->final_total_price_recieve) && !empty($request->final_total_price_recieve))
        {
            $recievepricedata['ledger_sale_id'] = $saleid;
            $recievepricedata['shopid'] = $request->shopid;
            $recievepricedata['price'] = $request->final_total_price_recieve;
            LedgerSalePrices::create($recievepricedata);
        }
        return redirect()->route('admin.manage_shop_ledger') ->with('success', 'Data Successfully Added !');

    }

}

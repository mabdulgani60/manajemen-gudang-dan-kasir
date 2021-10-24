<?php

namespace App\Http\Controllers\backend;

use App\Models\Money;
use App\Models\Product;
use App\Models\Sale;
use App\Models\History;
use App\Models\Salescart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Exports\SaleExport;
use App\Exports\ProductPrint;
use DateTime;
use Illuminate\Support\Facades\DB;
use Excel;
use PDF;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function create()
    {
        $this->checkpermission('sales-create');
        $salescart = Salescart::all();
        return view('backend.sales.create', compact('sales', 'salescart'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'price' => 'required',
            'sales_quantity' => 'required',
        ]);
        $time = date('ymdGi');
        $index = Sale::whereDate('created_at',Carbon::today())->count();
        if($index == 0){
            $uniqueID = $time."001";
        }else{
            $index = Sale::latest()->first();

            $number = intval(substr($index->history_id,-3));
            if ($number < 10){
                $uniqueID = $time."00".strval($number+1);
            }elseif($number < 100){
                $uniqueID = $time."0".strval($number+1);
            }else{
                $uniqueID = $time.strval($number+1);
            }
        }
        if ($request->ajax()) {
            $sales = new Salescart();
            $sales->history_id = $uniqueID;
            $sales->product_id = $request->product_id;
            $sales->quantity = $request->sales_quantity;
            $sales->price = $request->price * $request->sales_quantity;
            $sales->sales_status = $request->sales_status;
            $sales->saller_name = Auth::user()->username;
            $sales->sales_date = date('Y-m-d');
            if ($sales->save()) {
                $product = Product::find($request->product_id);
                $product->stock = $product->stock - $request->sales_quantity;
                if ($product->update()) {
                    return response(['success_message' => 'SuccessFully Make sales']);
                }
            }
        } else {
            return response(['error_message' => 'Filed To Make sales']);
        }
    }

    public function index()
    {
        $this->checkpermission('sales-list');
        $sales = Sale::join('products', 'products.id', '=', 'sales.product_id')
            ->select('sales.*', 'products.name')
            ->orderBy('sales.created_at', 'DEC')
            ->get();
        
        return view('backend.sales.list', compact('sales'));
    }

    public function ajaxlist()
    {
        $sales = Salescart::join('products', 'products.id', '=', 'salescarts.product_id')
            ->select('salescarts.*', 'products.name')
            ->orderBy('salescarts.created_at', 'DEC')
            ->get();
        $getmoney = Money::all()->count();
            if($getmoney == 0){
                $money = 0;
            }else{
                $getmoney = Money::latest()->first();
                $money = $getmoney->money;
            }
        return view('backend.sales.ajaxlist', compact('sales','money'));
    }

    public function ajaxform()
    {
        $salescart = Salescart::all();
        return view('backend.sales.ajaxform', compact('salescart'));
    }

    public function refreshproduct()
    {
        $product = Product::where('stock', '>=', 1)->get();
        return view('backend.sales.refreshproduct', compact('product'));
    }

    public function getquantity(Request $request)
    {
        $product = Product::where('id', $request->product_id)->get();
        echo $product[0]->stock;
    }

    public function getprice(Request $request)
    {
        $product = Product::where('id', $request->product_id)->get();
        echo $product[0]->price;
    }

    public function getproductname(Request $request)
    {
        $product = Product::where('id', $request->product_id)->get();
        echo $product[0]->name;
    }

    public function getallpdf()
    {
        $report = Salescart::join('products', 'products.id', '=', 'salescarts.product_id')
            ->select('salescarts.*', 'products.name')
            ->get();
        $historyID = Salescart::first();
        $getmoney = Money::all()->count();
            if($getmoney == 0){
                $money = 0;
            }else{
                $getmoney = Money::latest()->first();
                $money = $getmoney->money;
            }
        return view('backend.pdfbill.salesbill', compact('report','historyID','money'));
    }

    public function getcustomreport(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $report = Sale::join('products', 'products.id', 'sales.product_id')
            ->select('sales.*', 'products.name')
            ->whereBetween('sales.sales_date', [$start, $end])
            ->get();
        $pdf = PDF::loadview('backend.pdfbill.allreport', compact('report', 'start', 'end'));
        return $pdf->download('salesreport.pdf');
    }

    public function savetosales(Request $request)
    {

        $uniqueID = Salescart::first();
        
        for ($i = 0; $i < $request->input('total_product'); $i++) {
            $od = [
                'history_id' => $uniqueID->history_id,
                'product_id' => $request['product_id'][$i],
                'quantity' => $request['quantity'][$i],
                'price' => $request['price'][$i],
                'sales_status' => 0,
                'saller_name' => Auth::user()->username,
                'sales_date' => date('Y-m-d'),
            ];
            Sale::create($od);
        }
        DB::table('salescarts')->delete();
        return redirect()->back()->with('success_message', 'Successfuly Clear Your Bucket and Sales Item store in Sales Record');
    }

    public function deletecart($id, $pid)
    {
        $product = Product::find($pid);
        $salescart = Salescart::find($id);
        $product->stock = $product->stock + $salescart->quantity;
        if ($product->update()) {
            $salescart->delete();
            return redirect()->back()->with('success_message', 'Seccessfully deleted Item');
        } else {
            return redirect()->back()->with('error_messsage', 'Failed To Delete Item');
        }
    }

    public function updateSalesChart(Request $request, $id)
    {
        $uid = time();
        for ($i = 0; $i < $request->input('total_product'); $i++) {
            $salescart = Salescart::find($id);
            $salescart->salescart_id = $uid;
            $salescart->save();
        }
    }

    public function showListSales()
    {

        $t = date("HidmY");
        
        $sales = Sale::join('products', 'sales.product_id', '=', 'products.id')
            ->where('sales_status', 1)
            ->select('sales.*', 'products.name as n')
            ->orderBy('id', 'ASC')
            ->get();


        // $rangeStart = request()->query('from_date');
        // $rangeEnd = request()->query('to_date');

        // $btnSubmit = request()->query('btnSubmit');

        // if ($rangeStart && $rangeEnd) {
        //     $sales = Sale::join('products', 'sales.product_id', '=', 'products.id')
        //         ->whereBetween('sales_date', [$rangeStart, $rangeEnd])
        //         ->where('sales_status,0')
        //         ->select('sales.*', 'products.name as n')
        //         ->get();
        // } else {
        //     $sales = Sale::join('products', 'sales.product_id', '=', 'products.id')
        //         ->select('sales.*', 'products.name as n')
        //         ->get();
        // }
        return view('backend.sales.index', compact('sales'));
    }

    public function setSpecificSale(Request $request)
    {
        $rangeStart = $request->from_date;
        $rangeEnd = $request->to_date;
        $sales = Sale::all();
        foreach ($sales as $sls) {
            if ($sls->sales_date >= $rangeStart && $sls->sales_date <= $rangeEnd) {
                $sls->sales_status = 1;
                $sls->save();
            }
            else{
                $sls->sales_status = 0;
                $sls->save();
            }
            
        }
        return redirect()->back()->with('success_message', 'Seccessfully Added Date Range Filter');
    }

    public function resetStatus()
    {

        $sales = Sale::all();
        foreach ($sales as $sls) {
            $sls->sales_status = 0;
            $sls->save();
        }



        return redirect()->back()->with('success_message', 'Seccessfully Reset Date Range');
    }

    public function exportCsv()
    {
        $product = Product::all();
        $name = date('Y-m-d h:i:s') . '_' . 'SaleExport.xlsx';
        return Excel::download(new SaleExport, $name);
    }

    public function productprint()
    {
        $product = Product::all();
        $name = date('Y-m-d h:i:s') . '_' . 'ProductPrint.xlsx';
        return Excel::download(new ProductPrint, $name);
    }

    public function getMoney(Request $request)
    {
        $m = new Money();
        $m->money = $request->get_money;
        $m->save();
        return redirect()->back();
    }

    public function resetDelete()
    {
        DB::table('money')->delete();
        return redirect()->back();
    }
    
}

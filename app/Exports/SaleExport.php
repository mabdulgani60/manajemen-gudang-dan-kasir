<?php

namespace App\Exports;

use App\Models\Sale;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SaleExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return collect(Sale::getDecoration());
        return Sale::where('sales_status', 1)->get();
    }

    public function headings(): array
    {
        return [
            'ID Penjualan',
            'Tanggal Penjualan',
            'Nama Barang',
            'Quantity',
            'Total Harga',
        ];
    }

    public function map($sale):array
    {
        $product = Product::where('id',$sale->product_id)->first();
        
        //dd($productName);

        $arrayData = [
            $sale->history_id,
            $sale->sales_date,
            // $sale->product_id,
            $product->name,
            $sale->quantity,
            $sale->price,
        ];
        //dd($arrayData);
        
        return $arrayData;
    }
    
}

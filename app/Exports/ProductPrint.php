<?php

namespace App\Exports;

use App\Models\Productcategory;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductPrint implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return collect(Sale::getDecoration());
        return Product::join('productcategories', 'products.productcategory_id', '=', 'productcategories.id')
        ->select('products.*', 'productcategories.name as n')
        ->get()
        ->sortBy('n')
        ->sortBy('name');
    }

    public function headings(): array
    {
        return [
            'Kategori',
            'Nama',
            'Code',
            'Harga Karton',
            'Harga Pack',
            'Harga Pcs',
            'Stok'
        ];
    }

    public function map($product):array
    {
        

        $arrayData = [
            $product->n,
            $product->name,
            $product->code,
            $product->quantity,
            $product->status,
            $product->price,
            $product->stock,
        ];
        //dd($arrayData);
        
        return $arrayData;
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $fillable = ['history_id', 'product_id', 'price', 'quantity', 'saller_name', 'buyer_name', 'sales_date', 'sales_status', 'birthday_status', 'dob', 'phone', 'created_at', 'updated_at'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    // public static function getDecoration()
    // {
    //     $Sales = DB::tabble('sales')->select('product_id')->get()->toArray();


    //     foreach ($Sales as $sls) {
    //         $product = DB::table('products')
    //             ->select('name', 'name')
    //             ->where('id', '=', $Sales->product_id)
    //             ->get()->toArray();
    //         //$Sales[$i]=$product;
    //     }

    //     return $Sales;
    // }

    // public function sale()
    // {
    //     //return $this->belongsTo(User::class);
    //     return $this->belongsTo('App\Models\Product');
    // }
}

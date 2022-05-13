<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $subquery = Stock::select('product_id', DB::raw('sum(quantity) as inventory'))
            ->groupBy('product_id')
            ->having('inventory', '>', 0);
        $products = Product::joinSub($subquery, 'stocks', function($join){
            $join->on('products.id', '=', 'stocks.product_id');
        })->select('id', 'title', 'price', 'inventory')->orderBy('price')->paginate(5);
        
        return $products;
    }
}

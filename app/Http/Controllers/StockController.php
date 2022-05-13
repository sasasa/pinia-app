<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    public function store(StockRequest $request)
    {
        $stock = new Stock([
            'product_id' => $request->product_id,
            "quantity" => $request->quantity * -1,
        ]);

        if($stock->save()) {
            return $stock;
        } else {
            return abort(500);
        }
    }
}

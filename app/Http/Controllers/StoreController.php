<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Address;
use App\Models\Product;
use App\Models\InvoiceProduct;
use Carbon\Carbon;

class StoreController extends Controller
{
    public function store_data(Request $request)
    {
        
        $this->validate(request(), [
            'title' => 'required|max:255',
            'due_date' => 'required',
            'line' => 'required|min:3|max:255',
            'city' => 'required',
            'state' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'comment' => 'required',
        ]);

        $address = new Address();
        $address->line = $request->line;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->save();

        $invoice = new Invoice();
        $invoice->title = $request->title;
        $invoice->status = 'saved';
        $invoice->address_id = $address->id;
        $invoice->created_at = Carbon::now();
        $invoice->due_date = $request->due_date;
        $invoice->save();

        $product = new Product();
        $product->id = $request->product_id;

        //TODO
        // $products = Product::all();
        // foreach ($products as $product) {
        //     dd($product->quantity_in_stock);
        // }
       

        $invoice_product = new InvoiceProduct();
        $invoice_product->invoice_id = $invoice->id;
        $invoice_product->product_id = $product->id;
        $invoice_product->quantity = $request->quantity;
        $invoice_product->comment = $request->comment;
        $invoice_product->save();

        return redirect('/')->with('status', 'Form posted successfully!');
    }
}

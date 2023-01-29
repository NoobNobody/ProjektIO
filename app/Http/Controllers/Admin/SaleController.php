<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::paginate(3);
        return view('admin.sale.index', compact('sales'));
    }

    public function create()
    {
        $sale = Sale::all();
        return view('admin.sale.create', compact('sale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleStoreRequest $request)
    {
        $s = Sale::create($request->validated());
        $products = Product::all();
        return redirect()->route('admin.sale.edit', ['sale' => $s->id, 'products' => $products]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale, Request $request)
    {
        $datetime1 = new DateTime($sale->created_at);
        $datetime2 = new DateTime($sale->rental_time);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        if ($request['search'] == null) {
            $products = Product::all();
        } else {
            $products = Product::where('name', 'LIKE', '%' . $request['search'] . '%')->get();
        }
        $price = 0;
        foreach ($sale->ordered_products as &$p) {
            $price = $price + ($p->product->price * $p->amount * $days);
        }
        return view('admin.sale.edit', compact('sale', 'products', 'price'));
    }

    public function edit2(Sale $sale)
    {
        $datetime1 = new DateTime($sale->created_at);
        $datetime2 = new DateTime($sale->rental_time);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $products = Product::all();
        $price = 0;
        foreach ($sale->ordered_products as &$p) {
            $price = $price + ($p->product->price * $p->amount * $days);
        }
        return view('admin.sale.edit', compact('sale', 'products', 'price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'email' => 'required',
            'telephone_number' => 'required|numeric|digits:9',
            'rental_time' => 'required'
        ]);

        $sale->update([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'telephone_number' => $request->telephone_number,
            'rental_time' => $request->rental_time,
        ]);


        return to_route('admin.sale.index')->with('alert', 'Udało się zaktualizować zamówienie!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sale $sale)
    {
        $sale->delete();
        return to_route('admin.sale.index');
    }

    public function adminsalesearch(Request $request)
    {
        $sales = Sale::where('first_name', 'LIKE', '%' . $request['search'] . '%')->paginate(10);
        return view('admin.sale.index', compact('sales'));
    }

    public function metoda1()
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.sale.index')->with('alert', 'Udało się dodać zamówienie!');
        }

        return redirect()->route('dashboard')->with('alert', 'Udało się dodać zamówienie!');
    }
}

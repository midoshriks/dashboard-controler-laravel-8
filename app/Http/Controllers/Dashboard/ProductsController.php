<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Helper;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $type = $request->type;
        $products = Product::orderby('id')->whereHas('type', function ($q) use ($type) {
            $q->where('name', $type);
        })->paginate(20);
        $types = Type::where('model', 'product')->get();
        $helpers = Helper::all();
        return view('dashboard.products.index', compact('products', 'types', 'type', 'helpers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->type_id = $request->type_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->helper_id = $request->helper_id;
        $product->save();

        Alert::success('Success Save product' . ' ' . $product->name);
        return redirect()->route('dashboard.products.index', ['type' => $request->type]);
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd($product);
        return view('dashboard.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->update();

        Alert::success('Success Update product' . ' ' . $product->name);
        return redirect()->route('dashboard.products.index');
        // dd($product);
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Alert::toast('deleted successfully product',);
        return redirect()->route('dashboard.products.index');
    }
}

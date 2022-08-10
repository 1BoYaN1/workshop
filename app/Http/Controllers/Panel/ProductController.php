<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\PanelProduct;
use App\Scopes\AvailableScopes;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = PanelProduct::without('images')->get();

        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
//        $rules = [
//            'title' => ['required', 'max:255'],
//            'description' => ['required', 'max:1000'],
//            'price' => ['required', 'min:1'],
//            'stock' => ['required', 'min:0'],
//            'status' => ['required', 'in:available,unavailable'],
//        ];
//        request()->validate($rules);
//        dd(request(), request()->title, request()->all());
//        $product = Product::create([
//            'title' => request()->title,
//            'description' => request()->description,
//            'price' => request()->price,
//            'stock' => request()->stock,
//            'status' => request()->status,
//        ]);
//
//        dd('In Store');

//        if (request()->stock == 0 && request()->status == 'available'){
//            session()->flash('error', 'If available must have stock');
//            return redirect()
//                ->back()
//                ->withInput(request()->all())
//                ->withErrors('If available must have stock');
//        }
//            session()->forget('error');
//
//        session()->flash('success', "New product with id {$product->id} was created");
//        dd($request->all(), $request->validated());
        $product = PanelProduct::create(request()->all());

        return redirect()
            ->route('products.index')
            ->withSuccess("New product with id {$product->id} was created");
    }

    public function show(PanelProduct $product)
    {

//        $products = Product::where('id', $products)->get();
//        $products = DB::table('productstable')->where('id', $product)->first();
//        $products = Product::findOrFail($products);
//        dd($products);
        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function edit(PanelProduct $product)
        {
            return view('products.edit')->with([
                'product' => $product,
            ]);
        }

    public function update(ProductRequest $request, PanelProduct $product)
        {
//            $rules = [
//                'title' => ['required', 'max:255'],
//                'description' => ['required', 'max:1000'],
//                'price' => ['required', 'min:1'],
//                'stock' => ['required', 'min:0'],
//                'status' => ['required', 'in:available,unavailable'],
//            ];
//            request()->validate($rules);
//            $product = Product::findOrFail($product);
            $product->update(request()->all());
            return redirect()
                ->route('products.index')
                ->withSuccess("Product with id {$product->id} was updated");
//                redirect()->action('ProductController@index');
        }

    public function destroy(PanelProduct $product)
        {
//            $product = Product::findOrFail($product);
            $product->delete();
            return redirect()
                ->route('products.index')
                ->withSuccess("The product with id {$product->id} was removed");
        }


}


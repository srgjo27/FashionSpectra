<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexClothes()
    {
        $products = Product::join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.*', 'stocks.quantity')
            ->get();

        return view('pages.admin.product.main-clothes', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexShoes()
    {
        $products = Product::join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.*', 'stocks.quantity')
            ->get();

        return view('pages.admin.product.main-shoes', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('sizes')->get();
        return view('pages.admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ], [
            'name.required' => 'Nama produk harus diisi.',
            'category_id.required' => 'Kategori produk harus diisi.',
            'description.required' => 'Deskripsi produk harus diisi.',
            'price.required' => 'Harga produk harus diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'image.required' => 'Gambar produk harus diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus memiliki ekstensi jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar harus maksimal 10 MB.',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->size_id = $request->size_id;
        $product->price = $request->price;
        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('public/product', $request->file('image')->getClientOriginalName());
            $product->image = $request->file('image')->getClientOriginalName();
        }
        $product->save();

        $stok = new Stock();
        $stok->product_id = $product->id;
        $stok->quantity = 0;
        $stok->save();

        return redirect()->route('auth.admin.product-clothes')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.*', 'stocks.quantity')
            ->where('products.id', '=', $id)
            ->first();
        return view('pages.admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::with('sizes')->get();
        return view('pages.admin.product.create', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ], [
            'name.required' => 'Nama produk harus diisi.',
            'category_id.required' => 'Kategori produk harus diisi.',
            'description.required' => 'Deskripsi produk harus diisi.',
            'price.required' => 'Harga produk harus diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus memiliki ekstensi jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar harus maksimal 10 MB.',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->size_id = $request->size_id;
        $product->price = $request->price;
        if ($request->hasFile('image')) {
            Storage::delete('public/product/' . $product->image);
            $request->file('image')->storeAs('public/product', $request->file('image')->getClientOriginalName());
            $product->image = $request->file('image')->getClientOriginalName();
        }
        $product->save();

        $stok = Stock::findOrFail($id);
        $stok->product_id = $product->id;
        $stok->quantity = $request->quantity;
        $stok->save();

        return redirect()->route('auth.admin.product-clothes')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete('storage/product/' . $product->image);
        $product->delete();
        return redirect()->route('auth.admin.product-clothes')->with('success', 'Produk berhasil dihapus');
    }
}

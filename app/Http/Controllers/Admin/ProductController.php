<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\Stock;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAccessories()
    {
        $products = Product::join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.*', 'stocks.quantity')
            ->get();

        return view('pages.admin.product.main-accessories', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBeauty()
    {
        $products = Product::join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.*', 'stocks.quantity')
            ->get();

        return view('pages.admin.product.main-beauty', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.product.create', ['categories' => $categories]);
    }

    public function getSizeProduct($id)
    {
        try {
            $size = Size::where('category_id', $id)->get();
            return response()->json($size);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'size_id' => 'nullable',
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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->size_id = $request->size_id ?? null;
        $product->price = $request->price;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $randomName = Str::random(40); // Generate a random 40-character string
            $imageName = $randomName . '.' . $extension;
            $request->file('image')->storeAs('public/product', $imageName);
            $product->image = $imageName;
        }
        $product->save();

        $stok = new Stock();
        $stok->product_id = $product->id;
        $stok->quantity = $request->quantity ?? 0;
        $stok->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil ditambahkan.',
        ], 200);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'size_id' => 'nullable',
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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->size_id = $request->size_id;
        $product->price = $request->price;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $randomName = Str::random(40); // Generate a random 40-character string
            $imageName = $randomName . '.' . $extension;
            $request->file('image')->storeAs('public/product', $imageName);
            $product->image = $imageName;
        }
        $product->save();

        $stok = Stock::findOrFail($id);
        $stok->product_id = $product->id;
        $stok->quantity = $request->quantity;
        $stok->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil diubah.',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$product = Product::findOrFail($id);
        $product = Product::where('id', $id)->first();
        Storage::delete('public/product/' . $product->image);
        Product::where('id', $id)->delete();
        //$product->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil dihapus 😭',
        ], 200);
    }
}

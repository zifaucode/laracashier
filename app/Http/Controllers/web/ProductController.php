<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->get();
        // return $product;
        return view('admin.product.index', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = ProductCategory::all();
        return view('admin.product.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $mtRand = mt_rand(0000, 9999);
            $date = Carbon::now()->format('d-m-Y');
            $number = 'P-' . $mtRand . $date;

            DB::beginTransaction();
            $newProduct = new Product();
            $newProduct->number = $number;
            $newProduct->name = $request->name;
            $newProduct->stock = $request->stock;
            $newProduct->unit_price = $request->unit_price;
            $newProduct->category_id = $request->category_id;


            if ($request->image != null) {
                $fileImage = $request->file('image');
                $file_image_name =  $request->name . "_" . $request->image_name;
                $fileImage->move('file/product-image', $file_image_name);
                $newProduct->product_image = $file_image_name;
            }
            $newProduct->save();


            DB::commit();
            return response()->json([
                'message' => 'Data has been saved',
                'code' => 200,
                'error' => false,
                'data' => $newProduct,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

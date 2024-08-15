<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SaleHistoryResource;
use App\Http\Resources\StockHistoryResource;
use App\Models\Product;
use App\Models\Stock;
use App\Models\VoucherRecord;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    protected $keyName = "products";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (Cache::has($this->keyName)) {
        //     $products = Cache::get($this->keyName);
        //     return ProductResource::collection($products);
        // } else {
        $products = Product::when(request()->has("search"), function ($query) {
            $query->where(function (Builder $builder) {
                $search = request()->search;

                $builder->where("name", "like", "%" . $search . "%");
                $builder->orWhere("unit", "like", "%" . $search . "%");
                // $builder->orWhere("total_stock", "like", "%" . $search . "%");
            });
        })->when(request()->has('orderBy'), function ($query) {
            $sortType = request()->sort ?? 'asc';
            $query->orderBy(request()->orderBy, $sortType);
        })->latest("id")->paginate(10)->withQueryString();

        // Cache::put($this->keyName, $products);
        return ProductResource::collection($products);
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            "name" => $request->name,
            "brand_id" => $request->brand_id,
            "actual_price" => $request->actual_price,
            "sale_price" => $request->sale_price,
            "user_id" => Auth::id(),
            "unit" => $request->unit,
            "more_information" => $request->more_information,
            "photo" => $request->photo
        ]);
        return  response()->json(['message' => "product has been created successfully"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }

        return  new ProductDetailResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
        $product->name = $request->name ?? $product->name;
        $product->brand_id = $request->brand_id ?? $product->brand_id;
        $product->actual_price = $request->actual_price ?? $product->actual_price;
        $product->sale_price = $request->sale_price ?? $product->sale_price;
        $product->unit = $request->unit ?? $product->unit;
        $product->more_information = $request->more_information ?? $product->more_information;
        $product->update();
        return response()->json(["message" => "product has been updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::denies("isAdmin")) {
            return response()->json([
                "message" => "Unauthorized"
            ]);
        }
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
        $product->delete();
        return response()->json([
            "message" => "A product is deleted successfully"
        ], 200);
    }
}

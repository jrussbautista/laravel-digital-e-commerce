<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductDownloadController extends Controller
{
    public function show(Request $request,  Product $product) {

        //  throw not found page if user does not purchased the product
        throw_unless($request->user()->isProductPurchased($product),
            ModelNotFoundException::class);


        return Storage::disk('local')->download($product->file_path);
    }
}

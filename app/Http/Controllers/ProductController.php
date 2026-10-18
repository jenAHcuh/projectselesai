<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Product Query
        |--------------------------------------------------------------------------
        */

        $query = Product::with('variants');


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $query->where(
                'name',
                'like',
                '%' . $request->search . '%'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->where(
                'category',
                $request->category
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Tags
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tag')) {

            $query->where(
                'tags',
                'like',
                '%' . $request->tag . '%'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Price Range
        |--------------------------------------------------------------------------
        */

        switch ($request->price_range) {

            case 'under_50':

                $query->where('price', '<', 50000);

                break;


            case '50_150':

                $query->whereBetween(
                    'price',
                    [50000, 150000]
                );

                break;


            case '150_300':

                $query->whereBetween(
                    'price',
                    [150000, 300000]
                );

                break;


            case 'above_300':

                $query->where(
                    'price',
                    '>=',
                    300000
                );

                break;
        }


        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        switch ($request->sort) {

            case 'low':

                $query->orderBy('price', 'asc');

                break;


            case 'high':

                $query->orderBy('price', 'desc');

                break;


            default:

                $query->latest();

                break;
        }


        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        $products = $query
            ->paginate(12)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Categories From Database
        |--------------------------------------------------------------------------
        */

        $categories = Product::query()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');


        /*
        |--------------------------------------------------------------------------
        | Tags From Database
        |--------------------------------------------------------------------------
        */

        $allTags = Product::query()
            ->whereNotNull('tags')
            ->pluck('tags');


        $tags = collect();


        foreach ($allTags as $tagString) {

            $productTags = explode(',', $tagString);

            foreach ($productTags as $tag) {

                $tag = trim($tag);

                if ($tag !== '') {

                    $tags->push($tag);

                }
            }
        }


        $tags = $tags
            ->unique()
            ->sort()
            ->values();


        return view('shop', compact(
            'products',
            'categories',
            'tags'
        ));
    }


    public function show(string $slug)
    {
        $product = Product::with('variants')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('products.show', compact('product'));
    }
}
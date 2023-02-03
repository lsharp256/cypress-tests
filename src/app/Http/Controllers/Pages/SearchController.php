<?php

namespace App\Http\Controllers\Pages;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    public function search(Request $request)
    {

        $filterPriceMin = $request->input('filter-price-min');
        $filterPriceMax = $request->input('filter-price-max');
        $filterRating = $request->input('filter-rating');

        $sortBy = $request->input('sort-by');

        /**
         * Get the data
         */
        $productQuery = Product::select(
            'id',
            'name',
            'description',
            'price',
            'rating',
            'created_at',
            'updated_at'
        );

        if ($filterPriceMin && $filterPriceMin != 'min') {
            $productQuery = $productQuery->where('price', '>=', $filterPriceMin);
        }

        if ($filterPriceMax && $filterPriceMax != 'max') {
            $productQuery = $productQuery->where('price', '<=', $filterPriceMax);
        }

        if ($filterPriceMin && $filterPriceMin != 'min' && $filterPriceMax && $filterPriceMax != 'max') {

            $productQuery = $productQuery->where([
                ['price', '>=', $filterPriceMin],
                ['price', '<=', $filterPriceMax]
            ]);
        }


        if ($filterRating) {

            switch ($filterRating) {
                case '4-and-up':
                    $productQuery = $productQuery->where('rating', '>=', 4);
                    break;
                case '3-and-up':
                    $productQuery = $productQuery->where('rating', '>=', 3);
                    break;
                case '2-and-up':
                    $productQuery = $productQuery->where('rating', '>=', 2);
                    break;
                case '1-and-up':
                    $productQuery = $productQuery->where('rating', '>=', 1);
                    break;
            }
        }

        if ($sortBy) {

            switch ($sortBy) {
                case 'price-desc':
                    $productQuery = $productQuery->orderBy('price', 'desc');
                    break;
                case 'price-asc':
                    $productQuery = $productQuery->orderBy('price', 'asc');
                    break;
                case 'rating-desc':
                    $productQuery = $productQuery->orderBy('rating', 'desc');
                    break;
            }
        }

        $products = $productQuery->get();




        return view('search', compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderBy('created_at')->take(50)->get();
        return view('index', [
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {

        $src = $request->src;
        $products = Product::where(function ($query) use ($src) {
        $query->where('title', 'LIKE', "%{$src}%")
            ->orWhereHas('category', function ($query) use ($src) {
                $query->where('title', 'LIKE', "%{$src}%");
            });
        })->get();


        return view('index', [
            'products' => $products
        ]);
    }
    
}

<?php


namespace App\exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Product implements FromView
{

    /**
     * @return View
     */
    public function view(): View
    {
        return view('exports.products', [
            'products' => \App\Product::all()
        ]);
    }
}

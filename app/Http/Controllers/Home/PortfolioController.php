<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Image;

class PortfolioController extends Controller
{
    public function AllPortfolio() {
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolios'));
    } // End Method
}

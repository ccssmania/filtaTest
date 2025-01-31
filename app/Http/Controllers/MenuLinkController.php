<?php

namespace App\Http\Controllers;

use App\Models\MenuLink;
use Illuminate\Http\Request;

class MenuLinkController extends Controller
{
    public function index($imageUrl = null)
    {
        
        return view('welcome', compact('imageUrl'));
    }
}

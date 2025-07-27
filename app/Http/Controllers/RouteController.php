<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return Route::all();
    }

    // method lain akan kita isi nanti kalau udah sampai ke CRUD-nya
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        echo 'Selamat datang';
        echo "<h1>".Auth::user()->name."</h1>";
        echo '<a href="/logout">Logout</a>';
    }

    function operator()
    {
        echo 'Selamat datang di halaman operator';
        echo "<h1>".Auth::user()->name."</h1>";
        echo '<a href="/logout">Logout</a>';
    }

    function admin()
    {
        echo 'Selamat datang di halaman admin';
        echo "<h1>".Auth::user()->name."</h1>";
        echo '<a href="/logout">Logout</a>';
    }
}

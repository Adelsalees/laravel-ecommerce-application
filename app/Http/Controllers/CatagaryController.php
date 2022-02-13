<?php

namespace App\Http\Controllers;

use App\Models\catagary;
use Illuminate\Http\Request;

class CatagaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin/catagary");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manag_catagary()
    {
        return view('admin/manag_catagary');
    }

 
}

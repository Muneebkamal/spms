<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function create(){
        return view('content.properties.add-property');
    }
    public function index(){
        return view('content.properties.property-list');
    }
    public function search(){
        return view('content.properties.admin-search.admin-search');
    }
}

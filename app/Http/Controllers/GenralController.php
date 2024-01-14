<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenralController extends Controller
{
    public function index()
    {
        return view('content.dashboard.dashboard');
    }
    public function accessRecords() {
        return view('content.records.access-records');
    }
    public function onlineForm() {
        return view('content.online-form.online-form');
    }
    public function termOfUse() {
        return view('content.terms-of-use.terms-of-use');
    }
    public function shareList() {
        return view('content.share-list.share-list');
    }

}

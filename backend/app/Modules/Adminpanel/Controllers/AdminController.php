<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {

        return view('Adminpanel::index');

    }

}

<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\Directory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\CsvDataImport;
use DB;
use Excel;

class DirectoryProductsController extends Controller
{

    public function index () {
        $directoryproducts = Directory::all();
        return view('Adminpanel::directory.index',['directoryproducts' => $directoryproducts]);
    }

    public function store (Request $request)
    {
        $directoryproducts = Directory::all();
        $this->validate($request, [
            'select_file' => 'required'
        ]);
        $path1 = $request->file('select_file')->store('temp');
        $path=storage_path('app').'/'.$path1;

        //dd($path);

        $data = Excel::import(new CsvDataImport, $path);
    }
}

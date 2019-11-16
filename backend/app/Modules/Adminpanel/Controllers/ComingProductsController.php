<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\ComingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Curl;

class ComingProductsController extends Controller
{
    public function index()
    {
        // GET API GROUPS
        $url_groups = Curl::to('http://sh.evos.uz/admin/api/groups')
            ->get();

        $response_array_groups = json_decode($url_groups,true);

        $response_groups = array_combine($response_array_groups["rid"], array_values($response_array_groups['categories']));


        return view('Adminpanel::comingproducts.index',['$response_groups'=>$response_groups]);
    }

        public function create()
        {
            $comingproducts = ComingProduct::all();
            $units = [1=>'кг',2=>'л',3=>'шт'];
            return view('Adminpanel::comingproducts.create', ['comingproducts' => $comingproducts,'units' => $units]);
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'groups'	=>	'required',
                'goods' => 'required',
            ]);
            $array_request = $request->all();


            foreach($array_request['goods'] as $value)
            $data = [
                'head' => '222#1',
                'original' => [
                    "55",    // Спецификация комплекта:WTax,Vat,SaleTax
                    "56",    // Спецификация комплекта:WTax,Vat,SaleTax
                    "57",     // Спецификация комплекта:WTax,Vat,SaleTax
                    "58",
                    "9", "69", "5", "105\\1", "212\\9", "213\\9", "210\\1", "210\\206#2\\1", "210\\215\\216\\1", "1"
                ],
                'values' => [
                    [0.0], // Спецификация комплекта:WTax,Vat,SaleTax
                    [0.0], // Спецификация комплекта:WTax,Vat,SaleTax
                    [0.0], // Спецификация комплекта:WTax,Vat,SaleTax
                    [0.0],
                    [2.0], //кол-во товара 1.0 - 1шт, 2.0 - 2шт ...
                    [1.0], //кратное
                    [0],
                    [29360136],
                    [0],
                    [0],
                    [5],
                    [0],
                    [null]
                ],
                'status' => [
                    ['Insert']
                ]
            ];




            dd($request);die();

            return redirect()->route('adminpanel.comingproducts.index');
        }

        public function edit($id)
        {
            $comingproducts = ComingProduct::find($id);
            $units = [1=>'кг',2=>'л',3=>'шт'];
            return view('Adminpanel::comingproducts.edit', ['comingproducts'=>$comingproducts,'units'=>$units ]);
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name'	=>	'required' //обязательно
            ]);

            $comingproducts = ComingProduct::find($id);
            $comingproducts->update([
                'name' => $request['name']
            ]);

            return redirect()->route('adminpanel.comingproducts.index');
        }

        public function destroy($id)
        {
            ComingProduct::find($id)->delete();
            return redirect()->route('adminpanel.comingproducts.index');
        }

}

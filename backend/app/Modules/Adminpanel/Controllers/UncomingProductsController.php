<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\UncomingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UncomingProductsController extends Controller
{
    public function index()
    {
        $uncomingproducts = UncomingProduct::all();
        return view('Adminpanel::uncomingproducts.index', ['uncomingproducts' => $uncomingproducts]);
    }

        public function create()
        {
            $uncomingproducts = UncomingProduct::all();
            $units = [1=>'кг',2=>'л',3=>'шт'];
            return view('Adminpanel::uncomingproducts.create', ['uncomingproducts' => $uncomingproducts,'units' => $units]);
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'name'	=>	'required',
                'count' => 'required',
                'unit' => 'required',
                'comment' => 'required'

            ]);

            $uncomingproducts = UncomingProduct::add($request->all());

            return redirect()->route('adminpanel.uncomingproducts.index');
        }

        public function edit($id)
        {
            $uncomingproducts = UncomingProduct::find($id);
            $units = [1=>'кг',2=>'л',3=>'шт'];
            return view('Adminpanel::uncomingproducts.edit', ['uncomingproducts'=>$uncomingproducts,'units'=>$units ]);
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name'	=>	'required' //обязательно
            ]);

            $uncomingproducts = UncomingProduct::find($id);
            $uncomingproducts->update([
                'name' => $request['name']
            ]);

            return redirect()->route('adminpanel.uncomingproducts.index');
        }

        public function destroy($id)
        {
            UncomingProduct::find($id)->delete();
            return redirect()->route('adminpanel.uncomingproducts.index');
        }

}

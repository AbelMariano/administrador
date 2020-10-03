<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;
use Session;
class ProductController extends Controller
{


public function index() {

 $imprimir=Product::all();
 return view('Inventario.base',compact('imprimir'));
   }


  public function store(ProductRequest $request)
    {
     
        $imprimir=Product::create($request->all());
        Session::flash('message','Registro Exitoso');
        return redirect()->route('Product.index');
    }



public function update(ProductRequest $request, $id)
    {
        $imprimir=Product::find($id);
        $imprimir->fill($request->all());
        $imprimir->save();
        Session::flash('message','Actualizacion Exitosa');
        return redirect()->route('Product.index');
    }


 public function destroy(Product $product,$id)
    {
        $product::destroy($id);
        Session::flash('message','Producto Eliminado');
        return redirect()->route('Product.index');
    }
}


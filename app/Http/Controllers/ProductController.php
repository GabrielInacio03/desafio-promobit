<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Contracts\IProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public IProductRepository $product;

    public function __construct(
        IProductRepository $product
    )
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->all();
        return view('/Restrito/product/index', compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Restrito/product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                 
        $products = $this->product->all();

        $validacao = new Product;
        $validacao->name = $request->nome;        

        if($products->where('name', $request->nome)->count() < 1){
            $this->product->store($validacao);
            return redirect('/Restrito/product')->with('success', 'Produto criado com sucesso');
        } else{
            return redirect('/Restrito/product/create')->with('erros', 'Falha ao salvar, produto com esse nome já existe no banco de dados');
        }        
                
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $productId = $this->product->getById($id);

        return view('/Restrito/product/edit', compact('productId'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = $this->product->all();

        $validacao = $this->product->getById($id);
        $validacao->name = $request->input('nome');    

        if($products->where('name', $request->nome)->count() < 1){
            $this->product->update($validacao);
            return redirect('/Restrito/product')->with('success', 'Produto editado com sucesso');          
        } else{
            return redirect('/Restrito/product/'.$id.'/edit')->with('erros', 'Falha ao editar, produto com esse nome já existe no banco de dados');
        }                    
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $productId = $this->product->getById($id);;
        $this->product->delete($productId);
        return redirect('/Restrito/product')->with('success', 'Produto excluido com sucesso');            
    }
}

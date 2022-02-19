<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Tag;
use App\Models\Tag;
use App\Repositories\Contracts\ITagRepository;
use App\Repositories\Contracts\IProductRepository;
use App\Repositories\Contracts\IProductTagRepository;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public IProductTagRepository $productTag;
    public IProductRepository $product;
    public ITagRepository $Tag;

    public function __construct(
        IProductTagRepository $productTag,
        IProductRepository $product,
        ITagRepository $Tag
    )
    {
        $this->productTag = $productTag;
        $this->product = $product;
        $this->Tag = $Tag;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->all();
        $product_tags = $this->productTag->all();
        $tags = $this->Tag->all();
        

        return view('/Restrito/vinculado/index')->with(
            [
                'products' => $products,
                'product_tags' => $product_tags,
                'tags' => $tags
            ]
        ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->product->all();
        $product_tags = $this->productTag->all();
        $tags = $this->Tag->all();
        

        return view('/Restrito/vinculado/create')->with(
            [
                'products' => $products,
                'product_tags' => $product_tags,
                'tags' => $tags
            ]
        ); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pts = $this->productTag->all();

        $validacao = new Product_Tag();
        $validacao->product_id = $request->dllprodutos;        
        $validacao->tag_id = $request->dlltags; 
      
        $this->productTag->store($validacao);
        return redirect('/Restrito/vinculado')->with('success', 'Vínculo criado com sucesso');        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_Tag  $product_Tag
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_Tag  $product_Tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_tags = $this->productTag->getById($id);

        $products = $this->product->all();
        $tags = $this->Tag->all();
        

        return view('/Restrito/vinculado/edit')->with(
            [
                'products' => $products,
                'product_tags' => $product_tags,
                'tags' => $tags
            ]
        ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product_Tag  $product_Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validacao = $this->productTag->getById($id);
        $validacao->product_id = $request->dllprodutos;        
        $validacao->tag_id = $request->dlltags; 

        $this->productTag->update($validacao);
        return redirect('/Restrito/vinculado')->with('success', 'Vínculo editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_Tag  $product_Tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pt = $this->productTag->getById($id);;
        $this->productTag->delete($pt);
        return redirect('/Restrito/vinculado')->with('success', 'Vínculo excluido com sucesso');  
    }
}

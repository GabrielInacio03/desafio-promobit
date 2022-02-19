<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Repositories\Contracts\ITagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public ITagRepository $tag;

    public function __construct(
        ITagRepository $tag
    )
    {
        $this->tag = $tag;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tag->all();
        return view('/Restrito/tag/index', compact('tags')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Restrito/tag/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = $this->tag->all();

        $validacao = new Tag;
        $validacao->name = $request->nome;        

        if($tags->where('name', $request->nome)->count() < 1){
            $this->tag->store($validacao);
            return redirect('/Restrito/tag')->with('success', 'Tag criada com sucesso');
        } else{
            return redirect('/Restrito/tag/create')->with('erros', 'Falha ao salvar, tag com esse nome já existe no banco de dados');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tagId = $this->tag->getById($id);

        return view('/Restrito/tag/edit', compact('tagId'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tags = $this->tag->all();

        $validacao = $this->tag->getById($id);
        $validacao->name = $request->input('nome');    

        if($tags->where('name', $request->nome)->count() < 1){
            $this->tag->update($validacao);
            return redirect('/Restrito/tag')->with('success', 'Tag editada com sucesso');          
        } else{
            return redirect('/Restrito/tag/'.$id.'/edit')->with('erros', 'Falha ao editar, tag com esse nome já existe no banco de dados');
        }       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagId = $this->tag->getById($id);;
        $this->tag->delete($tagId);
        return redirect('/Restrito/tag')->with('success', 'Tag excluida com sucesso');     
    }
}

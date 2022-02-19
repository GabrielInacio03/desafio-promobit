@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Vínculo</h1>    
</div>
<div class="row">
    <div class="col-md-12">  
        <div class="card">
            <div class="card-head">
                @if(session()->get('erros'))
                    <div class="alert alert-danger mt-1">
                        {{ session()->get('erros') }}  
                    </div>
                @endif 
            </div>            
            <div class="card-body">
                <form class="row g-3" method="post" action="{{ route('vinculado.update', $product_tags->id) }}">
                @csrf
                @method('PATCH')
                    <div class="col-md-6">
                        <label for="dllprodutos" class="form-label">Produtos:</label>
                        <select class="custom-select" id="dllprodutos" name="dllprodutos">
                            <option value="{{ $product_tags->product_id }}" selected>{{ $product_tags->product->name }}</option> 
                            @foreach($products as $product)    
                                @if($product_tags->product_id != $product->id)                            
                                    <option value="{{ $product->id }}" >{{ $product->name }}</option> 
                                @endif                                                             
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="dlltags" class="form-label">Tags:</label>
                        <select class="custom-select" id="dlltags" name="dlltags">
                            <option value="{{ $product_tags->tag_id }}" selected>{{ $product_tags->tag->name }}</option>
                            @foreach($tags as $tag)
                                @if($product_tags->tag_id != $tag->id)                            
                                    <option value="{{ $tag->id }}" >{{ $tag->name }}</option> 
                                @endif                                   
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <br>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>    
            </div>        
        </div>
       
    </div>
</div>
@endsection

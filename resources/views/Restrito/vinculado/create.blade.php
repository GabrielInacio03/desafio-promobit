@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo Vínculo</h1>    
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
                <form class="row g-3" method="post" action="{{ route('vinculado.store') }}">
                @csrf
                    <div class="col-md-6">
                        <label for="dllprodutos" class="form-label">Produtos:</label>
                        <select class="custom-select" id="dllprodutos" name="dllprodutos">
                            <option selected>--- Selecione um Produto ---</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" >{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="dlltags" class="form-label">Tags:</label>
                        <select class="custom-select" id="dlltags" name="dlltags">
                            <option selected>--- Selecione uma Tag ---</option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
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

@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Produto</h1>    
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
                <form class="row g-3" method="post" action="{{ route('product.update', $productId->id) }}">
                @csrf
                @method('PATCH')
                    <div class="col-md-6">
                        <label for="txtNome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="txtNome" name="nome" value="{{ $productId->name }}">
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

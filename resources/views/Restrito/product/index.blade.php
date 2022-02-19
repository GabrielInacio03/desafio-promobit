@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>   
</div>
<br />
<div class="row">
    <div class="col-md-12">        
        <a href="{{ url('/Restrito/product/create') }}" class="btn btn-success">Novo</a><br />      
        @if(session()->get('success'))
            <div class="alert alert-success mt-1">
                {{ session()->get('success') }}  
            </div><br />
        @endif 
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-9">Produtos</th>
                    <th class="col-md-2">Ações</th>
                </tr>
            </thead> 
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="col-md-1">{{$product->id}}</td>
                    <td class="col-md-9">{{$product->name}}</td>                    
                    <td class="col-md-2">
                        <a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary mb-1">                            
                            <span data-feather="edit">Editar</span>
                        </a>
                        <form action="{{ route('product.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <span data-feather="trash-2">Deletar</span>
                            </button>
                        </form>
                    </td>
                    <td>
                        
                    </td>
                </tr>
                @endforeach
            </tbody> 
        </table>       
    </div>
</div>
@endsection
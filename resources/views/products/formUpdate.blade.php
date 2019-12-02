@extends('layouts.app')

@section('content')

<section class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Atualização de Produto</h1>
        </div>
    </div>

    @if(isset($product))
    <div class="card body">
      <form action="/produtos/atualizar" method="POST" enctype="multipart/form-data">
         @csrf

        <input type="text" name="idProduct" valeu="{{$product->id}}" hidden>
        <div class="form-group">
            <label for="nameProduct">Nome Produto</label>
            <input class="form-control" type="text" name="nameProducts" id="nameProducts" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="quantProduct">Quantidade</label>
            <input value="{{$product->quantity}}" type="number" name="quantity" id="quantity">
        </div>
        <div class="form-group">
            <label for="priceProduct">Preço</label>
            <input value="{{$product->price}}" type="number" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="descProduct">Descrição</label>
            <textarea type="text" name="description" id="description"> {{$product->description}} </textarea>
        </div>
        <div class="form-group">
            <label for="imgProducts">Imagem Produto</label>
            <input  type="file" name="imgProdutcs" id="">
        </div>
      
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar Produto</button>
        </div>
    </form>
    </div>
    @else
    </br></br></br><h1>Você nao passou um id ou o produto nao existe</h1>
    @endif
        <div class="row">
            <div class="col-md-12">
                @if(isset($result))
                    @if($result)
                        <h1>Deu certo</h1>
                    @else
                        <h1>Atualização não efetuada</h1>
                    @endif
                @endif        
            </div>
        
        </div>


</section>


@endsection
@extends('layouts.app')

@section('content')

<section class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Cadastro de Produto</h1>
        </div>
    </div>
    <form action="/produtos/cadastrar" method="POST" enctype="multipart/form-data">
         @csrf
        <div class="form-group">
            <label for="nameProduct">Nome Produto</label>
            <input class="form-control" type="text" name="nameProducts" id="nameProducts">
        </div>
        <div class="form-group">
            <label for="quantProduct">Quantidade</label>
            <input type="number" name="quantity" id="quantity">
        </div>
        <div class="form-group">
            <label for="priceProduct">Preço</label>
            <input type="number" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="imgProducts">Imagem Produto</label>
            <input type="file" name="imgProdutcs" id="">
        </div>
        <div class="form-group">
            <label for="descProduct">Descrição</label>
            <textarea type="text" name="description" id="description"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

        <div class="row">
            <div class="col-md-12">
                @if(isset($result))
                    @if($result)
                        <h1>Deu certo</h1>
                    @else
                        <h1>Cadastro não efetuado</h1>
                    @endif
                @endif        
            </div>
        
        </div>


</section>


@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //impostamos a classe para poder usar na funcao create
use App\Product;
use Auth;


class ProductController extends Controller
{
    public function create(Request $request){
        // fica resp por cadastrar um produto
       $newProduct = new Product();
       $newProduct->name = $request->nameProducts;
       $newProduct->description = $request->description;
       $newProduct->quantity = $request->quantity;
       $newProduct->price = $request->price;
       $newProduct->user_id= Auth::user()->id; 

       $result = $newProduct->save();

    //    if($result){
    //        echo "Deu certo";
    //    }else{
    //        echo "Deu errado";
    //    }

      return view('products.form', ["result"=>$result]);

    }

    public function viewForm(Request $request){
        return view('products.form'); //para pegar uma view dentro de uma pasta, é necessario especificar a pasta e a sintax é ponto e nao barra


    }

    public function update(Request $request){

        //para atualizar devemos buscar um objeto ao invez de criar
        //usando Product::find($iddo produto)
        //vai ser necessario usar rotas com parametros

        $newProduct = Product::find(//id do produto);
        $newProduct->name = $request->nameProducts;
        $newProduct->description = $request->description;
        $newProduct->quantity = $request->quantity;
        $newProduct->price = $request->price;
        $newProduct->user_id= Auth::user()->id; 

    }

    public function delete(Request $request)
    // para deletar vc vau usar Produtc::destry($id)



    public function viewAllProducts(Request $request){
        //vai precisar do Product::All
    }

    public function viewOneProduct(Request $request){
        // vai precisar do Product::find($idProduct)
    }


}

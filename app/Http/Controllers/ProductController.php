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

      return view('products.formRegister', ["result"=>$result]);

    }

    public function viewForm(Request $request){
        return view('products.formRegister'); //para pegar uma view dentro de uma pasta, é necessario especificar a pasta e a sintax é ponto e nao barra


    }
    
    public function viewFormUpdate(Request $request, $id=0){
        $product = Product::find($id);
        if($product){
            return view('products.formUpdate',['product'=>$product]);
        }else{
            return view('products.formUpdate');
        }
       

    }


    public function update(Request $request){

        //para atualizar devemos buscar um objeto ao invez de criar
        //usando Product::find($id do produto)
        //vai ser necessario usar rotas com parametros
        $Product = Product::find($request->idProduct);
        $Product->name = $request->nameProducts;
        $Product->description = $request->description;
        $Product->quantity = $request->quantity;
        $Product->price = $request->price;
         
        $result = $Product->save();
 
       return view('products.formUpdate', ["result"=>$result]);

    }

    public function delete(Request $request, $id=0){
    // para deletar vc vau usar Produtc::destry($id)
         $result = Product::destroy($id);
         if($result){
             return redirect('/produtos');
         }

    } 
    
    
    public function viewAllProducts(Request $request){
        //vai precisar do chamar o modelo Product e o metodo -> All

        $listProducts = Product::all();
        return view('products.products',['listProducts'=>$listProducts]);
    }

    // public function viewOneProduct(Request $request){
    //     // vai precisar do Product::find($idProduct)
    // }


}

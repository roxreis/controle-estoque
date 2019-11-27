<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User; //importa a classe model User
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [ //validacao de dados
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //pego nome do arquivo
        $nomeArquivo = $data['img']->getClientOriginalName();
        // pego a data do sistema
        $dataAtual = date('y-m-d');
        //gero o link para meu usuario acessar
        $nomeArquivo = $dataAtual.'/'.$nomeArquivo;
        //salvo a imagem dentrop da pasta storage
        $caminhoImg = "storage/profile/$nomeArquivo";
        
        //funcao storeAs salva no lugar e com o nome que vc deu 
        $resultado = $data['img']->storeAs('public/profile', $nomeArquivo);

        // dd($data['img']);

        //php artisan storage:link -> serve para linkar a pasta public para que as imagens colocadas nela possam ser acessadas pelo usuario, pq por padrao ela é bloqueada - criamos nesta pasta uma outra pasta chamada 'profile
        
        

        return User::create([ //no automatico o laravel ja cria isso 
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'img_profile'=> $caminhoImg,
            'active'=> 1,
        ]);
    }
}

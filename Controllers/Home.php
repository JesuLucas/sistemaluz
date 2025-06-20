<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome');
    }
    public function login(){

        return view('login');

    }
    public function cerrarSesion(){
        session()->destroy();
        return redirect()->to('/login');
    }
    public function verificarAcceso(){
        // verificar las credenciales de acceso 
        // verificar al usuario 
        $usuario= $this->request->getPost('usuario');
        $password= $this->request->getPost('password');
        
        // información estática 
        $usuarioEstatico="admin";
        $passwordEstatico="12345";

        if($usuario===$usuarioEstatico && $password===$passwordEstatico){
            session()->set('logueado',true);
            return redirect()->to('/');
        }else{
            return view('login',['mensaje'=>'Usuario o contraseña incorrectas']);
        }
        



        //return redirect()->to('/');
        
    }
}

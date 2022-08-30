<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use Illuminate\Http\Request;

class ApiClientsController extends Controller
{
    public function create(Request $request){
        $mensage = ['error'=>''];
        $cliente = new Clients;
        $cliente->nome          = $request->nome;
        $cliente->CPF           = $request->CPF;
        $cliente->email         = $request->email;
        $cliente->sexo          = $request->sexo;
        $cliente->nascimento    = $request->nascimento;
        $cliente->telefone      = $request->telefone;
        $cliente->cep           = $request->cep;
        $cliente->endereco      = $request->endereco;
        $cliente->bairro        = $request->bairro;
        $cliente->cidade        = $request->cidade;
        $cliente->estado        = $request->estado;
        try{
            $cliente->save();
            return response()->json([
                'success' => "true",               
                'message' => 'Cliente cadastrado com sucesso'
            ]);
        }catch (QueryException  $e){
            $error_code = $e->errorInfo[1];
            if($error_code == 1062){
               return response()->json([
                    'success' => 'false',
                    'message' => 'CPF já cadastrado no sistema!'
                ]);
            }
        }
        return $mensage;
    }

    public function update(Request $request){
        try{
           
            $cliente = Clients::find($request->id);
     
         
            $cliente->nome          =  $request->nome;
            $cliente->CPF           = $request->CPF;
            $cliente->email         = $request->email;
            $cliente->sexo          = $request->sexo;
            $cliente->nascimento    = $request->nascimento;
            $cliente->telefone      = $request->telefone;
            $cliente->cep           = $request->cep;
            $cliente->endereco      = $request->endereco;
            $cliente->bairro        = $request->bairro;
            $cliente->cidade        = $request->cidade;
            $cliente->estado        = $request->estado;
             
            if($cliente->save()){
                return response()->json([
                   'success' => 'true',
                    'message' => 'Alterado com sucesso!'
                 ]);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'message' => 'Algum erro ocorreu no sistema!'
                ]);
            }
            
            }catch(QueryException $e){
                return response()->json([
                    'success' => 'false',
                    'message' => $e->errorInfo[2]
                ]);
            }
    }

    public function readall(Request $request){
        $all_clients = Clients::all();
        return $all_clients;
    }

    public function readonly(Request $request){
        $cliente = Clients::find($request->id);
        if ($cliente){
            return $cliente;
        }
        return dd("Cliente não encontrado");
        
    }


    public function delete(Request $request){
        $cliente = Clients::find($request->id);
        $cliente->delete();
        return response()->json([
            'success' => 'true',
            'message' => 'Cliente excluido com sucesso',
        ]);
    }

    public function falsedelete(Request $request){
        try{
           
            $cliente = Clients::find($request->id);
     
            $cliente->apagado        = $request->apagado;
             
            if($cliente->save()){
                return response()->json([
                   'success' => 'true',
                    'message' => 'Cliente apagado com sucesso!'
                 ]);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'message' => 'Algum erro ocorreu no sistema!'
                ]);
            }
            
            }catch(QueryException $e){
                return response()->json([
                    'success' => 'false',
                    'message' => $e->errorInfo[2]
                ]);
            }
    }
}

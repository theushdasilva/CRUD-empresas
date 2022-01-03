<?php

namespace App\Http\Controllers;

use App\Models\Empregados;
use Illuminate\Console\Scheduling\Event;

class EmpregadosController extends Controller
{
    public function index(){

        $consulta = Empregados::all();

        return "<p>".$consulta."</p>";
    }

    public function create($nome, $sobrenome, $prontuario, $empresa, $email, $telefone){
        Empregados::insert([
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'prontuario' => $prontuario,
            'empresa' => $empresa,
            'email' => $email,
            'telefone' => $telefone
        ]);
    }

    public function update($id, $nome, $sobrenome, $prontuario, $empresa, $email, $telefone){
        if ($nome != Null){
            Empregados::
                where('id', $id)
                ->update(['nome' => $nome]);
        }
        if ($sobrenome != Null){
            Empregados::
                where('id', $id)
                ->update(['sobrenome' => $sobrenome]);
        }
        if ($prontuario != Null){
            Empregados::
                where('id', $id)
                ->update(['prontuario' => $prontuario]);
        }
        if ($empresa != Null){
            Empregados::
                where('id', $id)
                ->update(['empresa' => $empresa]);
        }
        if ($email != Null){
            Empregados::
                where('id', $id)
                ->update(['email' => $email]);
        }
        if ($telefone != Null){
            Empregados::
                where('id', $id)
                ->update(['telefone' => $telefone]);
        }    
    }

    public function select($id, $nome){
        if ($nome != Null && $id == Null){
            $pessoa = Empregados::select('nome', 'sobrenome', 'prontuario', 'empresa', 'email', 'telefone')
                ->where('nome', $nome)
                ->get();

            return $pessoa;
        }
        if ($id != Null){
            $pessoa = Empregados::select('nome', 'sobrenome', 'prontuario', 'empresa', 'email', 'telefone')
                ->where('id', $id)
                ->get();
            return $pessoa;
        }     
    }
}

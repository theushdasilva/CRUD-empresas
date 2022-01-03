<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index(){
        
        $consulta = Empresa::all();
        
        return "<p>".$consulta."</p>";
    }

    public function create($nome, $endereco, $logotipo, $website){
        #Empresa::save();
        Empresa::insert([
            'nome' => $nome,
            'endereco' => $endereco,
            'logotipo' => $logotipo,
            'website' => $website
        ]);
    }

    public function update($nome, $endereco, $logotipo, $website){
        #Empresa::update();
        if ($endereco != Null){
            Empresa::
                where('nome', $nome)
                ->update(['endereco' => $endereco]);
        }
        if ($logotipo != Null){
            Empresa::
                where('nome', $nome)
                ->update(['logotipo' => $logotipo]);
        }
        if ($website != Null){
            Empresa::
                where('nome', $nome)
                ->update(['website' => $website]);
        }
    }

    public function select($id, $nome){
        if ($nome != Null && $id == Null){
            $empresa = Empresa::select('nome','endereco', 'logotipo', 'website')
                ->get();
                return $empresa;
        }
        if ($id != Null){
            $empresa = Empresa::select('nome','endereco', 'logotipo', 'website')
                ->where('id', $id)
                ->get();
            return $empresa;
        }     
    }
    
    
}

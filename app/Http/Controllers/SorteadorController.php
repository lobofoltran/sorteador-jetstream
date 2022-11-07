<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SorteadorController extends Controller
{
    public function index()
    {
        return view('sorteador.index');
    }

    public function sortear()
    {
        $texto = request('texto');
        $ordem = request('ordem');

        if (!$texto) {
            return response(view('sorteador.alert-error', [
                'msg' => 'Texto não preenchido!',
            ]), 200);    
        }

        if (strpos($texto, ';')) {
            if (substr($texto, strlen($texto)-1, 1) != ';') {
                $texto = $texto . ';';
            }

            $texto = explode(';', $texto, -1);
        } else {
            $texto = explode("\n", $texto);
        }

        $rand = rand(0, (sizeof($texto)-1));

        $response[$rand] = $texto[$rand];

        while (sizeof($response) < sizeof($texto)) {
            $num = rand(0, (sizeof($texto)-1));
            
            $response[$num] = $texto[$num];
        }

        array_multisort($response);
        
        return response(view('sorteador.alert', [
            'sorteado' => $texto[$rand],
            'response' => $response,
        ]), 200);
    }
}

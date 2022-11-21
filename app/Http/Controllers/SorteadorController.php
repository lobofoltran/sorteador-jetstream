<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeSorteioFormRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SorteadorController extends Controller
{
    public function index()
    {
        return view('sorteador.index');
    }

    public function sortear(MakeSorteioFormRequest $request)
    {
        $texto = $request->texto;

        if (strpos($texto, ';')) {
            if (substr($texto, strlen($texto)-1, 1) != ';')
                $texto = $texto . ';';

            $texto = explode(';', $texto, -1);
        } else {
            $texto = explode("\n", $texto);
        }

        if ($request->qtde > sizeof($texto)) {
            return back()->withErrors('O campo de quantidade não pode ser superior a quantidade de palavras declaradas a serem sorteadas!');
        }

        $rand = array_rand($texto, $request->qtde);
        
        if (!is_array($rand)) {
            $sorteio[] = $texto[$rand];
        } else {
            foreach ($rand as $value) {
                $sorteio[] = $texto[$value];
            }
        }

        if ($request->decrescente)
            $sorteio = array_reverse($sorteio);
        
        $vars = [
            'tms_created_at' => date('Y-m-d H:i:s'),
            'sorteio' => $sorteio,
            'ordem' => $request->decrescente
        ];

        $data = session('sorteio');
        $data[] = $vars;
        
        session(['sorteio' => $data]);
        return view('sorteador.sorteio', $vars);
    }

    public function history()
    {
        $sorteio = session('sorteio') ?? [];

        return view('sorteador.history', [
            'sorteio' => $sorteio,
        ]);
    }

    public function show($id)
    {
        $sorteio = session('sorteio') ?? [];

        return view('sorteador.sorteio', [
            'sorteio' => $sorteio[$id]['sorteio'],
            'ordem' => $sorteio[$id]['ordem'],
        ]);
    }
}

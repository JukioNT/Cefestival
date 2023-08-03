<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nota;

class notaController extends Controller
{
    private $notas;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = nota::all();
        return view('sistema.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->input('notas');
        $userid = substr($dados, -1);
        $dados = substr($dados, 0, -1);
        $dados = str_replace('.,', ' ', $dados);
        $valores = explode(" ", $dados);
        $arrayFinal = [];
        foreach ($valores as $valor) {
            list($parte1, $parte2) = explode(",", $valor);
            $arrayFinal[] = [(int)$parte1, (int)$parte2];
        }
        $dados = $arrayFinal;

        foreach($dados as $item){
            $data = new nota();
            $data->user_id = $userid;
            $data->apresentacao_id = $item[1];
            $data->nota = $item[0];
            $data->save();
        }

        return view('sistema.enviaNotas', compact('dados'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

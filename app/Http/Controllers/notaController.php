<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notas;

class notaController extends Controller
{
    private $notas;
    
    public function __construct(notas $nota){
        $this->middleware('auth');
        $this->notas = $nota;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = notas::all();
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
        //
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

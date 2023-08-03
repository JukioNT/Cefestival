<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\categorias;
use App\Models\apresentacoes;

class indexController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    private $categorias;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categorias::all();
        $user = Auth::user();
        $apresentacoes = apresentacoes::all();
        return view('sistema.index', compact('categorias', 'apresentacoes', 'user'));
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

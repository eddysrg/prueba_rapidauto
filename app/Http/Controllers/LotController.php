<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLotRequest;
use App\Http\Requests\UpdateLotRequest;
use App\Models\Lot;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lots = Lot::latest()->paginate(10);

        return view('lots.index', compact('lots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLotRequest $request)
    {
        Lot::create($request->validated());

        return redirect()->route('lots.index')->with('success', 'Lote creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lot $lot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lot $lot)
    {
        return view('lots.edit', compact('lot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLotRequest $request, Lot $lot)
    {
        $lot->update($request->validated());

        return redirect()->route('lots.index')->with('success', 'Lote actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lot $lot)
    {
        try {
            $lot->delete();

            return redirect()->route('lots.index')->with('success', 'Lote eliminado');
        } catch (QueryException $e) {
            if($e->getCode() === "23000") {
                return back()->withErrors(['error' => 'No se puede eliminar este Lote porque tiene vendedores asignados.']);
            }
            throw $e;
        }
    }
}

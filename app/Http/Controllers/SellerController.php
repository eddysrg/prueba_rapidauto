<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSellerRequest;
use App\Models\Lot;
use App\Models\Seller;
use App\Services\ImportSellersServices;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index() {
        $sellers = Seller::with('lot')->paginate(10);
        return view('sellers.index', compact('sellers'));
    }

    public function edit(Seller $seller) {
        $lots = Lot::all();

        return view('sellers.edit', compact('seller', 'lots'));
    }

    public function update(UpdateSellerRequest $request, Seller $seller) {
        $seller->update([
            'name' => $request->name,
            'email' => $request->email,
            'lot_id' => $request->lot_id,
        ]);

        return redirect()->route('sellers.index')->with('success', 'Vendedor Actualizado correctamente');
    }

    public function destroy(Seller $seller) {
        $seller->delete();

        return redirect()->route('sellers.index')->with('success', 'Vendedor eliminado correctamente');
    }

    public function showImportForm() {
        $lots = Lot::all();

        return view('sellers.import', compact('lots'));
    }

    public function import(Request $request, ImportSellersServices $importService) {
        $request->validate([
            'lot_id' => 'required|exists:lots,id'
        ]);

        try {
            $count = $importService->import($request->lot_id);

            return redirect()->route('sellers.index')->with('success', "Exito, se han importado/actualizado {$count} vendedores");
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

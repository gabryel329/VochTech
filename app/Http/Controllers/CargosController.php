<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cadastros.cargo', compact('cargos'));
    }

    public function store(Request $request)
    {
        $cargo = $request->input('cargo');

        $existingCargo = Cargo::where('cargo', $cargo)->first();

        if ($existingCargo) {
            return redirect()->route('cargos.index')->with('error', 'Nome de Cargo já existe');
        }

        Cargo::create([
            'cargo' => $cargo,
        ]);

        return redirect()->route('cargos.index')->with('success', 'Cargo criado com sucesso');
    }

    public function update(Request $request, $id)
    {
        $cargos = Cargo::find($id);
        $cargos->update([
            'cargo' => $request->input('cargo'),
        ]);
        return redirect()->back()->with('success', 'Cargo atualizado com sucesso');
    }

    public function destroy(string $id)
    {
        $cargos = Cargo::findOrFail($id);

        $cargos->delete();

        return redirect()->route('cargos.index')->with('error', 'Cargo excluído com sucesso');
    }
}

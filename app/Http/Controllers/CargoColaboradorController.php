<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\CargoColaborador;
use App\Models\Colaborador;
use Illuminate\Http\Request;

class CargoColaboradorController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        $colaboradores = Colaborador::all();
        $cargocolaboradores = CargoColaborador::all();
        return view('avaliacao.index', compact(['cargos', 'colaboradores', 'cargocolaboradores']));
    }

    public function buscar($id)
    {
        $colaborador = Colaborador::find($id);

        if ($colaborador) {

            return response()->json(['cargo' => $colaborador->cargo->cargo , 'id' => $colaborador->cargo->id]);
        }

        return response()->json(['cargo' => 'Colaborador não encontrado']);
    }

    public function store(Request $request)
    {
        $colaborador_id = $request->input('colaborador_id');
        $cargo_id = $request->input('cargos_id');

        $nota_desempenho = $request->input('nota_desempenho');

        $existingCargoColaborador = CargoColaborador::where('colaborador_id', $colaborador_id)->first();

        if ($existingCargoColaborador) {
            return redirect()->route('cargocolaboradores.index')->with('error', 'Colaborador já avaliado');
        }

        CargoColaborador::create([
            'colaborador_id' => $colaborador_id,
            'cargo_id' => $cargo_id,
            'nota_desempenho' => $nota_desempenho,
        ]);

        return redirect()->route('cargocolaboradores.index')->with('success', 'Avaliação criada com sucesso');
    }

    public function update(Request $request, $id)
    {
        $cargocolaboradores = CargoColaborador::find($id);
        $cargocolaboradores->update([
            'nota_desempenho' => $request->input('nota_desempenho'),
        ]);
        return redirect()->back()->with('success', 'Avaliação atualizada com sucesso');
    }

    public function destroy(string $id)
    {
        $cargocolaboradores = CargoColaborador::findOrFail($id);

        $cargocolaboradores->delete();

        return redirect()->route('cargocolaboradores.index')->with('error', 'Avaliação excluída com sucesso');
    }
}

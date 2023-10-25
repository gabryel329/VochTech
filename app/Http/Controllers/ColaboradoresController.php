<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Colaborador;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ColaboradoresController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::all();
        $unidades = Unidade::all();
        $cargos = Cargo::all();
        return view('cadastros.colaborador', compact(['colaboradores', 'unidades', 'cargos']));
    }

    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
        $email = $request->input('email');
        $unidade_id = $request->input('unidade_id');
        $cargo_id = $request->input('cargo_id');

        $existingColaborador = Colaborador::where('nome', $nome)->first();

        if ($existingColaborador) {
            return redirect()->route('colaboradores.index')->with('error', 'Nome de Colaborador já existe');
        }

        Colaborador::create([
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,
            'unidade_id' => $unidade_id,
            'cargo_id' => $cargo_id,
        ]);

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador criado com sucesso');
    }

    public function update(Request $request, $id)
    {
        $colaborador = Colaborador::find($id);
        $colaborador->update([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
            'unidade_id' => $request->input('unidade_id'),
            'cargo_id' => $request->input('cargo_id'),
        ]);
        return redirect()->back()->with('success', 'Colaborador atualizado com sucesso');
    }

    public function destroy(string $id)
    {
        $colaborador = Colaborador::findOrFail($id);

        $colaborador->delete();

        return redirect()->route('colaboradores.index')->with('error', 'Colaborador excluído com sucesso');
    }
}

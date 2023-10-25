<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        return view('cadastros.unidade', compact('unidades'));
    }

    public function store(Request $request)
    {
        $nome_fantasia = $request->input('nome_fantasia');
        $razao_social = $request->input('razao_social');
        $cnpj = $request->input('cnpj');

        $existingUnidade = Unidade::where('nome_fantasia', $nome_fantasia)->first();

        if ($existingUnidade) {
            return redirect()->route('unidades.index')->with('error', 'Nome de Unidade já existe');
        }

        Unidade::create([
            'nome_fantasia' => $nome_fantasia,
            'razao_social' => $razao_social,
            'cnpj' => $cnpj,
        ]);

        return redirect()->route('unidades.index')->with('success', 'Unidade criada com sucesso');
    }

    public function update(Request $request, $id)
    {
        $unidades = Unidade::find($id);
        $unidades->update([
            'nome_fantasia' => $request->input('nome_fantasia'),
            'razao_social' => $request->input('razao_social'),
            'cnpj' => $request->input('cnpj'),
        ]);
        return redirect()->back()->with('success', 'Unidade atualizada com sucesso');
    }

    public function destroy(string $id)
    {
        $unidades = Unidade::findOrFail($id);

        $unidades->delete();

        return redirect()->route('unidades.index')->with('error', 'Unidade excluída com sucesso');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\CargoColaborador;
use App\Models\Colaborador;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function colaboradores()
    {
        $colaboradores = Colaborador::with('unidade', 'cargo')->get();

        return view('relatorios.colaboradores', ['colaboradores' => $colaboradores]);
    }

    public function unidades()
    {
        $relatorio = Unidade::select('nome_fantasia', 'razao_social', 'cnpj')
            ->withCount('colaboradores')
            ->get();

        return view('relatorios.unidades', ['relatorio' => $relatorio]);
    }

    public function avaliacao()
    {
        $colaboradores = DB::table('colaboradores')
            ->join('unidades', 'colaboradores.unidade_id', '=', 'unidades.id')
            ->join('cargo_colaborador', 'colaboradores.id', '=', 'cargo_colaborador.colaborador_id')
            ->join('cargos', 'cargo_colaborador.cargo_id', '=', 'cargos.id')
            ->whereNull('colaboradores.deleted_at')
            ->orderByDesc('cargo_colaborador.nota_desempenho')
            ->get();

        return view('relatorios.avaliacao', compact('colaboradores'));
    }


}

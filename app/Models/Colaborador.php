<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colaborador extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'colaboradores';
    protected $fillable = ['unidade_id', 'nome', 'cpf', 'email', 'cargo_id'];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    public function cargocolaborador()
    {
        return $this->belongsToMany(CargoColaborador::class, 'cargo_colaborador', 'colaborador_id', 'cargo_id')
            ->withPivot('nota_desempenho');
    }

}

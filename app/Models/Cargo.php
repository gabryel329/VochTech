<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'cargos';
    protected $fillable = ['cargo'];

    public function colaboradores()
    {
        return $this->belongsToMany(Colaborador::class, 'cargo_colaborador', 'cargo_id', 'colaborador_id')
            ->withPivot('nota_desempenho');
    }
}

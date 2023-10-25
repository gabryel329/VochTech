<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'unidades';
    protected $fillable = ['nome_fantasia', 'razao_social', 'cnpj'];

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'unidade_id');
    }
}

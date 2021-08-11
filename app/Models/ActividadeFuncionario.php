<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActividadeFuncionario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'actividade_funcionario';

    protected $fillable = [

        'actividade_id',
        'funcionario_id',
	    'tarefa'
    ];

    public function actividade(){

        return $this->belongsTo('App\Models\Actividade','actividade_id');

    }

    public function funcionario(){

        return $this->belongsTo('App\Models\Funcionario','funcionario_id');

    }


}


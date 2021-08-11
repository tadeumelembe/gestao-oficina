<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consumivel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'consumiveis';

    protected $fillable = [
        'name',
        'quantidade',
        'notas',
        'custo',
        'actividade_id'
    ];

    public function actividade(){

        return $this->belongsTo('App\Models\Actividade','actividade_id');

    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producoes extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'producao';

    public function tipo()
    {
        return $this->belongsTo('App\TipoProd','tipo_Prod_id');
    }

    public function professor()
    {
        return $this->belongsTo('App\Professor','professores_id');
    }

    public function arquivos()
    {
        return $this->hasMany('App\ArquivosProducao');
    }

    public function producao_curso()
    {
        return $this->belongsToMany('App\Curso','producao_curso','producao_id','cursos_id')->withPivot(['id','created_at']);
    }
}

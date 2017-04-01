<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArquivosProducao extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'arquivos_producao';


    public function producao()
    {
        return $this->belongsTo('App\Producao','producao_id');
    }
}

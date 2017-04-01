<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArquivosPublicacao extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'arquivos_publicacao';


    public function publicacao()
    {
        return $this->belongsTo('App\Publicacao','publicacao_id');
    }
}

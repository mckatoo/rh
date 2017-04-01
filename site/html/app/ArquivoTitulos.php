<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArquivoTitulos extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'arquivos_titulos';

    /**
    * Relationships
    */
    public function titulos()
    {
        return $this->belongsTo('App\Titulos','titulos_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArquivoTempoExp extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'arquivos_tempo_exp';

    /**
    * Relationships
    */
    public function tempo()
    {
        return $this->belongsTo('App\TempoExpProForaMag','tempo_exp_pro_fora_mag_id');
    }
}

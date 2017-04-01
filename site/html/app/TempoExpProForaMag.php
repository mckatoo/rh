<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TempoExpProForaMag extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tempo_exp_pro_fora_mag';

    
    public function arquivos()
    {
        return $this->hasMany('App\ArquivoTempoExp');
    }
}

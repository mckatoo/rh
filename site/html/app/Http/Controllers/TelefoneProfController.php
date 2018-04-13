<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TelefoneProf;
use Auth;
use Input;

class TelefoneProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $tipouser = Auth::user()->tipo->tipo;
        $telefones = \App\TelefoneProf::where('professores_id', $id_prof)->get();
        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }
        if ($telefones->count() < 1){
            $disable = " disabled";
        }else {
            $disable = "";
        }

        return view('telefone-prof')->with(compact('telefones','id_prof','ext','div','disable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = Auth::user()->email;
        $id_prof = \App\Professor::where('email',$email)->first()->id;
        $tel = new TelefoneProf();
        $tel->telefone = Input::get('telefone');
        $tel->professores_id = $id_prof;
        $tel->save();

        $tipouser = Auth::user()->tipo->tipo;
        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' adicionou um número de telefone.']);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $telefone = \App\TelefoneProf::find($id);
        $telefone->delete();

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' excluiu um número de telefone.']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class TempoMagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $email = Auth::user()->email;
        $tipouser = Auth::user()->tipo->tipo;
        $id_tempo_mag = \App\Professor::where('users_id',Auth::id())->first()->tempo_mag_sup_exp_pro_id;
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $tempo_mag = \App\TempoMagSupExpPro::with('arquivos')->find($id_tempo_mag);

        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }


        return view('arquivo-tempo-mag')->with(compact('tempo_mag','id_tempo_mag','id_prof','ext','div'));
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
        //
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
    public function destroy($id)
    {
        //
    }

    // public function list_arq_tempo_mag()
    // {
    //     return view('arquivo-tempo-mag');
    // }

    public function upload_tempo_mag()
    {
        $doc = \Request::file('documento');
        $id_prof = \Request::get('id_prof');
        $id_tempo_mag = \Request::get('id_tempo_mag');
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/tempo_mag/';
        $nomeArq = str_replace('.PDF','',str_replace('.pdf','',$doc->getClientOriginalName()))."-".date('d-m_H-i-s').".".$doc->getClientOriginalExtension();

        // Sanitização
        $sanitizado = ['nomeArq' => filter_var($nomeArq, FILTER_SANITIZE_URL)];

        if (!file_exists($localArmazem.'/'.$sanitizado['nomeArq'])) {
            $doc->move($localArmazem, $sanitizado['nomeArq']);
        }

        $arq_mag = new \App\ArquivoTempoMag();
        $arq_mag->arquivo = $sanitizado['nomeArq'];
        $arq_mag->tempo_mag_sup_exp_pro_id = $id_tempo_mag;
        $arq_mag->save();

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' adicionou um comprovante de experiência no magistério.']);
    }

    public function download($id_arq)
    {
        $prof = \App\Professor::where('users_id',Auth::id())->first();
        $id_prof = $prof->id;
        $arquivo = \App\ArquivoTempoMag::find($id_arq);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/tempo_mag/';
        return \Response::download($localArmazem.'/'.$arquivo->arquivo);
    }

    public function excluir(Request $request)
    {
        $prof = \App\Professor::where('users_id',Auth::id())->first();
        $id_prof = $prof->id;
        $id_tempo_mag = $request->id_tempo_mag;
        $arquivo = \App\ArquivoTempoMag::find($request->id_arq);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/tempo_mag/';
        $arquivo->delete();
        if (file_exists($localArmazem.'/'.$arquivo->arquivo)) {
            unlink($localArmazem.'/'.$arquivo->arquivo);
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' excluiu um comprovante de experiência no magistério.']);
    }
}
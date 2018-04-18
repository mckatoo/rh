<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class TempoExpController extends Controller
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
        $prof = \App\Professor::where('users_id',Auth::id())->first();
        $id_tempo_exp = $prof->tempo_exp_pro_fora_mag_id;
        $id_prof = $prof->id;

        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }

        $tempo_exp = \App\TempoExpProForaMag::with('arquivos')->find($id_tempo_exp);

        return view('arquivo-tempo-exp')->with(compact('tempo_exp','id_tempo_exp','id_prof','ext','div'));
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

    public function upload_tempo_exp()
    {
        $doc = \Request::file('documento');
        $id_prof = \Request::get('id_prof');
        $id_tempo_exp = \Request::get('id_tempo_exp');
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/tempo_exp/';
        $nomeArq = str_replace('.PDF','',str_replace('.pdf','',$doc->getClientOriginalName()))."-".date('d-m_H-i-s').".".$doc->getClientOriginalExtension();

        // Sanitização
        $sanitizado = ['nomeArq' => filter_var($nomeArq, FILTER_SANITIZE_URL)];

        if (!file_exists($localArmazem.'/'.$sanitizado['nomeArq'])) {
            $doc->move($localArmazem, $sanitizado['nomeArq']);
        }

        $arq_exp = new \App\ArquivoTempoExp();
        $arq_exp->arquivo = $sanitizado['nomeArq'];
        $arq_exp->tempo_exp_pro_fora_mag_id = $id_tempo_exp;
        $arq_exp->save();

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' adicionou um comprovante de experiência profissional.']);
    }

    public function download($id_arq)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $arquivo = \App\ArquivoTempoExp::find($id_arq);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/tempo_exp/';
        return \Response::download($localArmazem.'/'.$arquivo->arquivo);
    }

    public function excluir(Request $request)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $id_tempo_mag = $request->id_tempo_mag;
        $arquivo = \App\ArquivoTempoExp::find($request->id);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/tempo_exp/';
        if (file_exists($localArmazem.'/'.$arquivo->arquivo)) {
            unlink($localArmazem.'/'.$arquivo->arquivo);
        }
        $arquivo->delete();

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' excluiu um comprovante de experiência profissional.']);
    }
}
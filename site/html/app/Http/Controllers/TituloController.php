<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class TituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $id_prof  = \App\Professor::where('users_id', Auth::id())->first()->id;
        $tipouser = Auth::user()->tipo->tipo;
        $titulos  = \App\Titulos::where('professores_id', $id_prof)->orderBy('peso', 'desc')->get();
        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }
        if ($titulos->count() < 1) {
            $disable = " disabled";
        } else {
            $disable = "";
        }

        return view('titulos/cad')->with(compact('titulos', 'id_prof', 'ext', 'div', 'disable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email   = Auth::user()->email;
        $id_prof = \App\Professor::where('users_id', Auth::id())->first()->id;
        if ($request->id === "") {
            $titulo = new \App\Titulos();
        } else {
            $titulo = \App\Titulos::find($request->id);
        }
        $titulo->titulo         = $request->titulo;
        $titulo->professores_id = $id_prof;
        $titulo->curso          = $request->curso;
        $titulo->ano_conclusao  = $request->ano_conclusao;
        $titulo->instituicao    = $request->instituicao;
        switch ($request->titulo) {
            case 'GRADUAÇÃO':
                $peso = 1;
                break;
            case 'ESPECIALIZAÇÃO':
                $peso = 2;
                break;
            case 'MESTRADO':
                $peso = 3;
                break;
            case 'DOUTORADO':
                $peso = 4;
                break;
            case 'PÓS-DOUTORADO':
                $peso = 5;
                break;
        }
        $titulo->peso = $peso;
        $titulo->save();

        \App\Notificacoes::create(['notificacao' => 'O Professor ' . Auth::user()->name . ' modificou sua titulação.']);

        $tipouser = Auth::user()->tipo->tipo;
        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id_prof  = \App\Professor::where('users_id', Auth::id())->first()->id;
        $arquivos = \App\ArquivoTitulos::where('titulos_id', $request->id)->get();
        foreach ($arquivos as $arquivo) {
            $localArmazem = storage_path() . '/docprof/' . $id_prof . '/titulo/';
            if (file_exists($localArmazem . '/' . $arquivo->arquivo)) {
                unlink($localArmazem . '/' . $arquivo->arquivo);
            }
        }

        $titulo = \App\Titulos::find($request->id);
        $titulo->delete();
        \App\Notificacoes::create(['notificacao' => 'O Professor ' . Auth::user()->name . ' modificou sua titulação.']);
    }

    public function cad_arq($id_titulo)
    {
        $email    = Auth::user()->email;
        $tipouser = Auth::user()->tipo->tipo;
        $id_prof  = \App\Professor::where('users_id', Auth::id())->first()->id;

        $arq = \App\ArquivoTitulos::where('titulos_id', $id_titulo)->get();

        return view('titulos.cad_arq', compact('arq', 'id_titulo', 'id_prof'));
    }

    public function upload()
    {
        $doc          = \Request::file('documento');
        $id_prof      = \Request::get('id_prof');
        $id_titulo    = \Request::get('id_titulo');
        $localArmazem = storage_path() . '/docprof/' . $id_prof . '/titulo/';
        $nomeArq      = str_replace('.PDF', '', str_replace('.pdf', '', $doc->getClientOriginalName())) . "-" . date('d-m_H-i-s') . "." . $doc->getClientOriginalExtension();

        // Sanitização
        $sanitizado = ['nomeArq' => filter_var($nomeArq, FILTER_SANITIZE_URL)];

        if (!file_exists($localArmazem . '/' . $sanitizado['nomeArq'])) {
            $doc->move($localArmazem, $sanitizado['nomeArq']);
        }

        $arq_titulo             = new \App\ArquivoTitulos();
        $arq_titulo->arquivo    = $sanitizado['nomeArq'];
        $arq_titulo->titulos_id = $id_titulo;
        $arq_titulo->save();

        \App\Notificacoes::create(['notificacao' => 'O Professor ' . Auth::user()->name . ' adicionou um comprovante a sua titulação.']);
    }

    public function download($id_arq)
    {
        $id_prof      = \App\Professor::where('users_id', Auth::id())->first()->id;
        $arquivo      = \App\ArquivoTitulos::find($id_arq);
        $localArmazem = storage_path() . '/docprof/' . $id_prof . '/titulo/';
        return \Response::download($localArmazem . '/' . $arquivo->arquivo);
    }

    public function excluir_arq(Request $request)
    {
        $id_arq       = $request->idArq;
        $id_prof      = \App\Professor::where('users_id', Auth::id())->first()->id;
        $arquivo      = \App\ArquivoTitulos::find($id_arq);
        $localArmazem = storage_path() . '/docprof/' . $id_prof . '/titulo/';
        $arquivo->delete();
        if (file_exists($localArmazem . '/' . $arquivo->arquivo)) {
            unlink($localArmazem . '/' . $arquivo->arquivo);
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor ' . Auth::user()->name . ' excluiu um comprovante de sua titulação.']);
    }

    public function list_arq($id_titulo)
    {
        $id_prof = \App\Professor::where('users_id', Auth::id())->first()->id;
        $arq     = \App\ArquivoTitulos::where('titulos_id', $id_titulo)->get();
        return view('titulos/list_arq', compact('id_prof', 'id_titulo', 'arq'));
    }
}

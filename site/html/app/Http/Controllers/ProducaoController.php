<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class ProducaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipouser = Auth::user()->tipo->tipo;
        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $prod = \App\Producoes::with('tipo','professor','producao_curso')->where('professores_id',$id_prof)->get();
        $cursos = \App\Curso::get();
        $tipos = \App\TipoProd::lists('tipo','id');

        return view('producoes.index')->with(compact('prod','cursos','tipos','div','ext','id_prof'));
    }

   
    public function listTipo()
    {
        $tipo = \App\TipoProd::get();

        return view('producoes.tipo',compact('tipo'));
    }


    public function addTipo(Request $request)
    {
        if (($request->id == "") or ($request->id == null)) {
            $tipo = new \App\TipoProd;
        } else {
            $tipo = \App\TipoProd::find($request->id);
        }

        $tipo->tipo = $request->tipo;
        $tipo->save();


        if ($request->id !== "") {
            \App\Notificacoes::create(['notificacao' => Auth::user()->name.' atualizou um tipo de produção.']);
            return back()->with('success','Tipo atualizado com sucesso!');
        } else {
            \App\Notificacoes::create(['notificacao' => Auth::user()->name.' adicionou um novo tipo de produção.']);
            return back()->with('success','Tipo adicionado com sucesso!');
        }
        
    }


    public function rmTipo(Request $request)
    {
        \App\TipoProd::find($request->id)->delete();
        \App\Notificacoes::create(['notificacao' => Auth::user()->name.' removeu um tipo de produção.']);
    }


    public function store(Request $request)
    {
        if ($request->id !== "") {
            $prod = \App\Producoes::find($request->id);
            $prod->producao_curso()->detach();
        } else {
            $prod = new \App\Producoes();
        }
        $prod->tipo_Prod_id = $request->tipo;
        $prod->professores_id = \App\Professor::where('users_id',Auth::id())->first()->id;
        $prod->desc = $request->descricao;
        $prod->save();
        if ($request->curso !== null) {
            foreach ($request->curso as $curso) {
                \App\Curso::find($curso)->producao_curso()->attach($prod);
            }
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' atualizou suas produções.']);

        return back()->with('success', 'Produção registrada com sucessso!');
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
    public function excluir(Request $request)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $arquivo = \App\ArquivosProducao::where('producao_id',$request->id);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/producoes/';
        foreach ($arquivo as $arq) {
            if (file_exists($localArmazem.'/'.$arq->arquivo)) {
                unlink($localArmazem.'/'.$arq->arquivo);
            }
            $arq->delete();
        }
        \App\Producoes::find($request->id)->delete();

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' atualizou suas produções.']);
    }

    public function excluir_arq(Request $request)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $id_producao = $request->idProducao;
        $arquivo = \App\ArquivosProducao::find($request->idArq);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/producoes/';
        $arquivo->delete();
        if (file_exists($localArmazem.'/'.$arquivo->arquivo)) {
            unlink($localArmazem.'/'.$arquivo->arquivo);
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' excluiu um comprovante de produção.']);
    }

     public function upload(Request $request)
    {

        $doc = $request->documento;
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $id_producao = $request->idProducao;
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/producoes/';
        $nomeArq = str_replace('.PDF','',str_replace('.pdf','',$doc->getClientOriginalName()))."-".date('d-m_H-i-s').".".$doc->getClientOriginalExtension();

        // Sanitização
        $sanitizado = ['nomeArq' => filter_var($nomeArq, FILTER_SANITIZE_URL)];

        if (!file_exists($localArmazem.'/'.$sanitizado['nomeArq'])) {
            $doc->move($localArmazem, $sanitizado['nomeArq']);
        }
        $arquivo_producao = new \App\ArquivosProducao();
        $arquivo_producao->arquivo = $sanitizado['nomeArq'];
        $arquivo_producao->producao_id = $id_producao;
        $arquivo_producao->save();

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' adicionou um comprovante de produção.']);
    }

    public function download($id_arq)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $arquivo = \App\ArquivosProducao::find($id_arq);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/producoes/';
        return \Response::download($localArmazem.'/'.$arquivo->arquivo);
    }

    public function list_arq($idProducao)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $arq = \App\ArquivosProducao::where('producao_id',$idProducao)->get();
        return view('producoes/list',compact('id_prof','idProducao','arq'));
    }
}

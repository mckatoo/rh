<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class PublicacaoController extends Controller
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
        $pub = \App\Publicacoes::with('tipo','professor','publicacao_curso')->where('professores_id',$id_prof)->get();
        $cursos = \App\Curso::get();
        $tipos = \App\TipoPub::lists('tipo','id');

        return view('publicacoes.index')->with(compact('pub','cursos','tipos','div','ext','id_prof'));
    }


    public function listTipo()
    {
        $tipo = \App\TipoPub::get();

        return view('publicacoes.tipo',compact('tipo'));
    }


    public function addTipo(Request $request)
    {
        if (($request->id == "") or ($request->id == null)) {
            $tipo = new \App\TipoPub;
        } else {
            $tipo = \App\TipoPub::find($request->id);
        }

        $tipo->tipo = $request->tipo;
        $tipo->save();


        if ($request->id !== "") {
            \App\Notificacoes::create(['notificacao' => Auth::user()->name.' atualizou um tipo de publicação.']);
            return back()->with('success','Tipo atualizado com sucesso!');
        } else {
            \App\Notificacoes::create(['notificacao' => Auth::user()->name.' adicionou um novo tipo de publicação.']);
            return back()->with('success','Tipo adicionado com sucesso!');
        }
        
    }

    public function rmTipo(Request $request)
    {
        \App\TipoPub::find($request->id)->delete();
        \App\Notificacoes::create(['notificacao' => Auth::user()->name.' removeu um tipo de publicação.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id !== "") {
            $pub = \App\Publicacoes::find($request->id);
            $pub->publicacao_curso()->detach();
        } else {
            $pub = new \App\Publicacoes();
        }
        $pub->tipo_Pub_id = $request->tipo;
        $pub->professores_id = \App\Professor::where('users_id',Auth::id())->first()->id;
        $pub->desc = $request->descricao;
        $pub->save();
        foreach ($request->curso as $curso) {
            \App\Curso::find($curso)->publicacao_curso()->attach($pub);
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' atualizou suas publicações.']);
        
        return back()->with('success', 'Publicação registrada com sucessso!');
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
        $arquivo = \App\ArquivosPublicacao::where('publicacao_id',$request->id);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/publicacoes/';
        foreach ($arquivo as $arq) {
            if (file_exists($localArmazem.'/'.$arq->arquivo)) {
                unlink($localArmazem.'/'.$arq->arquivo);
            }
            $arq->delete();
        }
        \App\Publicacoes::find($request->id)->delete();

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' excluiu uma publicação.']);
    }

     public function upload(Request $request)
    {

        $doc = $request->documento;
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $id_publicacao = $request->idPublicacao;
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/publicacoes/';
        $nomeArq = str_replace('.PDF','',str_replace('.pdf','',$doc->getClientOriginalName()))."-".date('d-m_H-i-s').".".$doc->getClientOriginalExtension();

        // Sanitização
        $sanitizado = ['nomeArq' => filter_var($nomeArq, FILTER_SANITIZE_URL)];

        if (!file_exists($localArmazem.'/'.$sanitizado['nomeArq'])) {
            $doc->move($localArmazem, $sanitizado['nomeArq']);
        }
        $arquivo_publicacao = new \App\ArquivosPublicacao();
        $arquivo_publicacao->arquivo = $sanitizado['nomeArq'];
        $arquivo_publicacao->publicacao_id = $id_publicacao;
        $arquivo_publicacao->save();

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' adicionou um comprovante de publicação.']);
    }

    public function download($id_arq)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $arquivo = \App\ArquivosPublicacao::find($id_arq);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/publicacoes/';
        return \Response::download($localArmazem.'/'.$arquivo->arquivo);
    }

    public function excluir_arq(Request $request)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $id_publicacao = $request->idPublicacao;
        $arquivo = \App\ArquivosPublicacao::find($request->idArq);
        $localArmazem = storage_path().'/docprof/'.$id_prof.'/publicacoes/';
        $arquivo->delete();
        if (file_exists($localArmazem.'/'.$arquivo->arquivo)) {
            unlink($localArmazem.'/'.$arquivo->arquivo);
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' excluiu um comprovante de publicação.']);
    }

    public function list_arq($idPublicacao)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $arq = \App\ArquivosPublicacao::where('publicacao_id',$idPublicacao)->get();
        return view('publicacoes/list',compact('id_prof','idPublicacao','arq'));
    }
}

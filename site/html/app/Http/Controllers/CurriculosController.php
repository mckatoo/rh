<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class CurriculosController extends Controller
{
    public function postProfessor(Request $request)
    {
        if ($request->professor == "") {
            $professores = \App\Professor::with('tempomag','tempoexp','cursos','ja_ministrou','publicacao','producao','telefones','titulos')->get();
            $producao = \App\Producoes::with('tipo','producao_curso')->get();
            $publicacao = \App\Publicacoes::with('tipo','publicacao_curso')->get();
            $titulos = \App\Titulos::with('arquivos')->get();
            $count = $professores->count();
        } else {
            $professores = \App\Professor::with('tempomag','tempoexp','cursos','ja_ministrou','publicacao','producao','telefones','titulos')->where('id',$request->professor)->get();
            $email = \App\User::where('id',$professores->first()->users_id)->get()->first()->email;
            $count = 1;
            $producao = \App\Producoes::with('tipo','producao_curso')->where('professores_id',$professores->first()->id)->get();
            $publicacao = \App\Publicacoes::with('tipo','publicacao_curso')->where('professores_id',$professores->first()->id)->get();
            $titulos = \App\Titulos::with('arquivos')->get();
        }
        return view('curriculos.professores',compact('count','professores','producao','publicacao','titulos','email'));
    }

    public function getProfessor()
    {
        $professores = \App\Professor::with('tempomag','tempoexp','cursos','ja_ministrou','publicacao','producao','telefones','titulos')
        ->where('users_id',Auth::id())->get();

        $prof_id = \App\Professor::where('users_id',Auth::id())->first()->id;

        $producao = \App\Producoes::with('tipo','producao_curso')->where('professores_id',$prof_id)->get();
        $publicacao = \App\Publicacoes::with('tipo','publicacao_curso')->where('professores_id',$prof_id)->get();

        $email = Auth::user()->email;

        $count = 1;
        
        $tipouser = Auth::user()->tipo->tipo;

        return view('curriculos.professores',compact('count','professores','producao','publicacao','email'));
    }

    public function arq_titulo($id_titulo)
    {
        $arq     = \App\ArquivoTitulos::where('titulos_id', $id_titulo)->get();
        return view('curriculos/arq_titulo', compact('id_titulo', 'arq'));
    }

    public function arq_publicacao($publicacao_id)
    {
        $arq     = \App\ArquivosPublicacao::where('publicacao_id', $publicacao_id)->get();
        return view('curriculos/arq_publicacao', compact('publicacao_id', 'arq'));
    }

    public function arq_producao($producao_id)
    {
        $arq     = \App\ArquivosProducao::where('producao_id', $producao_id)->get();
        return view('curriculos/arq_producao', compact('producao_id', 'arq'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = \App\Professor::lists('nome','id');
        return view('curriculos.index',compact('professores'));
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
}

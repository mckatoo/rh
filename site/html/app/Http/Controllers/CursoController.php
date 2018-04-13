<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $cursos = \App\Curso::with('professores','coordenador')->get();
        $professores = \App\Professor::lists('nome','id');

        return view('cursos.index',compact('cursos','professores'));
    }


    public function ministra(Request $request)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        $tipouser = Auth::user()->tipo->tipo;
        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }

        $cursos = \App\Curso::lists('curso','id');
        $professor = \App\Professor::find($id_prof)->cursos()->orderBy('pivot_created_at','desc')->paginate(5);
        $jaministrou = \App\Professor::find($id_prof)->ja_ministrou()->orderBy('pivot_created_at','desc')->paginate(5);
        return view('cursos.ministra',compact('cursos','div','ext','professor','jaministrou'));
    }


    public function addProfessor(Request $request)
    {
        $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
        if ($request->id !=="") {
            \App\Professor::find($id_prof)
                ->cursos()->updateExistingPivot($request->curso,['tempo_meses'=>$request->tempo]);
            return back()->with('success','Curso atualizado com sucesso!');
        } else {
            $professor = \App\Professor::find($id_prof);
            \App\Curso::find($request->curso)->professores()->attach($professor,['tempo_meses'=>$request->tempo]);
            return back()->with('success','Curso adicionado com sucesso!');
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' atualizou os tempos de vínculo a cursos que ministra ou ministrou aula.']);
    }


    public function addCoordenador(Request $request)
    {
        $curso = \App\Curso::find($request->id);
        if ($request->professor !== "") {
            $curso->professores_id = $request->professor;
        } else {
            $curso->professores_id = NULL;
        }
        $curso->save();

        \App\Notificacoes::create(['notificacao' => Auth::user()->name.' modificou o coordenador do curso de '.$curso->curso.'.']);

        return back()->with('success','Coordenador adicionado com sucesso!');
    }


    public function rmProfessor(Request $request)
    {
        try {
            $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
            $professor = \App\Professor::find($id_prof);
            \App\Curso::find($request->idcurso)->ja_ministrou()->attach($professor,['tempo_meses'=>$request->tempo]);
            $professor->cursos()->detach($request->idcurso);
            
            \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' atualizou os tempos de vínculo a cursos que ministra ou ministrou aula.']);

            return back()->with('success','Curso desvinculado com sucesso. Este curso agora consta como Já Ministrado.');
        } catch (Exception $e) {
            return back()->withErrors('msg',$e);
        }

    }


    public function rmJaMinistrou(Request $request)
    {
        try {
            $id_prof = \App\Professor::where('users_id',Auth::id())->first()->id;
            $professor = \App\Professor::find($idprof);
            $professor->ja_ministrou()->detach($request->idcurso);
            
            \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' atualizou os tempos de vínculo a cursos que ministra ou ministrou aula.']);

            return back()->with('success','Curso removido com sucesso!');
        } catch (Exception $e) {
            return back()->withErrors('msg',$e);
        }
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

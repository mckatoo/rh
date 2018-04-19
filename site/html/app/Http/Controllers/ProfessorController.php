<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Professor;
use App\TempoExpProForaMag;
use App\TempoMagSupExpPro;
use App\ArquivoTempoExp;
use App\ArquivoTempoMag;
use Redirect;
use File;
use Auth;
use DateTime;

class ProfessorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pendentes()
    {
        $idTipoProf = \App\TipoUser::where('tipo','Professor')->first()->id;
        $pendentes = \App\User::with('tipo')->where('tipo_User_id',$idTipoProf)->get();
        $professores = \App\Professor::get();

        return view('prof_pendentes', compact('pendentes','professores'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($id = null)
    public function create()
    {
        $user = \Auth::user();
        $tipoU = $user->tipo->id;
        $tipo = \App\TipoUser::where('id',$tipoU)->get()->first()->tipo;
        
        $ext = 'base';
        $div = 'class=container';
        $prof = \App\Professor::where('users_id',$user->id)->get()->first();

        return view('cad-professores', compact('user','ext','div','prof'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prof = \App\Professor::where('id',$request->id);
        if ($prof->count() > 0) {
            $prof = $prof->first();
        } else {
            $prof = new Professor();
        }

        $prof->users_id = \App\User::where('email',$request->email)->pluck('id');
        $prof->nome = $request->nome;
        $cpf = preg_replace("/\D+/", "", $request->cpf);
        $prof->cpf = $cpf;
        $prof->mae = $request->mae;
        $prof->pai = $request->pai;
        $prof->endereco = $request->endereco;
        $prof->data_admissao = DateTime::createFromFormat('d/m/Y', $request->data_admissao);
        $prof->ch_cursos_total = $request->ch_cursos_total;
        $prof->ch_atividade_compl = $request->ch_atividade_compl;
        $prof->num_disciplinas = $request->num_disciplinas;

        $tempo_mag = new TempoMagSupExpPro();
        $tempo_mag->tempo = $request->tempo_mag_sup_exp_pro_id;
        $tempo_mag->save();

        $tempo_exp = new TempoExpProForaMag();
        $tempo_exp->tempo = $request->tempo_exp_pro_fora_mag_id;
        $tempo_exp->save();

        $id_tempo_mag = $tempo_mag->id;
        $id_tempo_exp = $tempo_exp->id;
        $prof->tempo_mag_sup_exp_pro_id = $id_tempo_mag;
        $prof->tempo_exp_pro_fora_mag_id = $id_tempo_exp;

        if ($request->file('foto') !== null) {
            $foto = $request->file('foto');
            $localArmazem = storage_path().'/docprof/'.Auth::id().'/foto/';
            $foto_sanitizada = filter_var($foto->getClientOriginalName(), FILTER_SANITIZE_URL);
            if (File::exists($localArmazem.'/'.$prof->foto)) {
                File::delete($localArmazem.'/'.$prof->foto);
            }
            $foto->move($localArmazem, $foto_sanitizada);
            $prof->foto = $foto_sanitizada;
            $prof->save();
        } else {
            $prof->save();
        }

        $id_prof = $prof->id;

        $tipoU = \App\User::where('email',$request->email)->pluck('tipo_User_id');
        $tipouser = \App\TipoUser::where('tipo',$tipoU)->pluck('id');

        $ext = 'base';
        $div = 'class=container';

        $user = \App\User::where('email',$request->email)->get()->toArray();


        \App\Notificacoes::create(['notificacao' => 'O Professor '.$request->nome.' atualizou seus dados pessoais.']);

        return view('arquivo-tempo-mag')->with(compact('tempo_mag','id_tempo_mag','id_prof','ext','div','user'));
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
    // public function edit()
    // {
    //     $prof = \App\Professor::where('users_id',Auth::id())->first();
    //     $tempo_mag = \App\TempoMagSupExpPro::find($prof->tempo_mag_sup_exp_pro_id);
    //     $tempo_exp = \App\TempoExpProForaMag::find($prof->tempo_exp_pro_fora_mag_id);

    //     $tipouser = Auth::user()->tipo->tipo;
    //     if ($tipouser == 'Professor') {
    //         $ext = 'base';
    //         $div = 'class=container';
    //     } else {
    //         $ext = 'admin';
    //         $div = 'id=page-wrapper';
    //     }

    //     try {
    //         return view('edit-professores', compact('prof','tempo_mag','tempo_exp','ext','div'));
    //     } catch (Exception $e) {
    //         return $e->getMessage();
    //     }

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $prof = \App\Professor::where('users_id',Auth::id())->first();
        if ($request->file('foto') !== null) {
            $foto = $request->file('foto');
            $localArmazem = storage_path().'/docprof/'.Auth::id().'/foto/';
            $foto_sanitizada = filter_var($foto->getClientOriginalName(), FILTER_SANITIZE_URL);
            if (file_exists($localArmazem.'/'.$prof->foto)) {
                unlink($localArmazem.'/'.$prof->foto);
            }
            $foto->move($localArmazem, $foto_sanitizada);
            $prof->foto = $foto_sanitizada;
        }
        $prof->nome = $request->nome;
        $cpf = $request->cpf;
        $cpf = preg_replace("/\D+/", "", $cpf);
        $prof->cpf = $cpf;
        $prof->mae = $request->mae;
        $prof->pai = $request->pai;
        $prof->endereco = $request->endereco;
        $prof->data_admissao = DateTime::createFromFormat('d/m/Y', $request->data_admissao);
        $prof->ch_cursos_total = $request->ch_cursos_total;
        $prof->ch_atividade_compl = $request->ch_atividade_compl;
        $prof->num_disciplinas = $request->num_disciplinas;

        if (isset($prof->tempo_mag_sup_exp_pro_id)) {
            $tempo_mag = TempoMagSupExpPro::find($prof->tempo_mag_sup_exp_pro_id);
            $tempo_mag->tempo = $request->tempo_mag_sup_exp_pro_id;
            $tempo_mag->save();
        }else {
            $tempo_mag = new TempoMagSupExpPro();
            $tempo_mag->tempo = $request->tempo_mag_sup_exp_pro_id;
            $tempo_mag->save();
        }

        if (isset($prof->tempo_exp_pro_fora_mag_id)) {
            $tempo_exp = TempoExpProForaMag::find($prof->tempo_exp_pro_fora_mag_id);
            $tempo_exp->tempo = $request->tempo_exp_pro_fora_mag_id;
            $tempo_exp->save();
        }else {
            $tempo_exp = new TempoExpProForaMag();
            $tempo_exp->tempo = $request->tempo_exp_pro_fora_mag_id;
            $tempo_exp->save();
        }

        $id_tempo_mag = $tempo_mag->id;
        $id_tempo_exp = $tempo_exp->id;

        $prof->tempo_mag_sup_exp_pro_id = $id_tempo_mag;
        $prof->tempo_exp_pro_fora_mag_id = $id_tempo_exp;

        $prof->save();
        $id_prof = $prof->id;

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' atualizou seus dados pessoais.']);

        return redirect(route("tempo_mag.index"));
    }

    public function foto($users_id)
    {
        $prof = \App\Professor::where('users_id',$users_id)->first();
        $path = storage_path() . '/docprof/' . $users_id . '/foto/' . $prof->foto;

        if(!File::exists($path)){
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}

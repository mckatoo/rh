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

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function pendentes()
    {
        $idTipoProf = \App\TipoUser::where('tipo','Professor')->first()->id;
        $pendentes = \App\User::with('tipo')->where('tipo_User_id',$idTipoProf)->get();
        $professores = \App\Professor::get();

        return view('prof_pendentes', compact('pendentes','professores'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $email = \Auth::user()->email;
        $name = strtoupper(\Auth::user()->name);
        $tipo = \Auth::user()->tipo->tipo;
        if ($tipo == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
            return view('cad-professores', compact('email','name','ext','div'));
        }else{
            $ext = 'admin';
            $div = 'id=page-wrapper';
            return view('cad-professores',compact('ext','div'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prof = new Professor();
        if ($request->file('foto') !== null) {
            $foto = $request->file('foto');
            $localArmazem = storage_path().'/docprof/'.$prof->id.'/foto/';
            $foto_sanitizada = filter_var($foto->getClientOriginalName(), FILTER_SANITIZE_URL);
            if (file_exists($localArmazem.'/'.$prof->foto)) {
                unlink($localArmazem.'/'.$prof->foto);
            }
            $foto->move($localArmazem, $foto_sanitizada);
            $prof->foto = $foto_sanitizada;
        }
        $prof->users_id = Auth::user()->id;
        $prof->nome = $request->nome;
        $cpf = $request->cpf;
        $cpf = preg_replace("/\D+/", "", $cpf);
        $prof->cpf = $cpf;
        $prof->mae = $request->mae;
        $prof->pai = $request->pai;
        $prof->endereco = $request->endereco;
        $prof->email = $request->email;

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

        $prof->save();
        $id_prof = $prof->id;
        $tipouser = Auth::user()->tipo->tipo;
        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }

        \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' atualizou seus dados pessoais.']);

        return view('arquivo-tempo-mag')->with(compact('tempo_mag','id_tempo_mag','id_prof','ext','div'));
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
    public function edit()
    {
        $prof = \App\Professor::where('users_id',Auth::id())->first();
        $tempo_mag = \App\TempoMagSupExpPro::find($prof->tempo_mag_sup_exp_pro_id);
        $tempo_exp = \App\TempoExpProForaMag::find($prof->tempo_exp_pro_fora_mag_id);

        $tipouser = Auth::user()->tipo->tipo;
        if ($tipouser == 'Professor') {
            $ext = 'base';
            $div = 'class=container';
        } else {
            $ext = 'admin';
            $div = 'id=page-wrapper';
        }

        try {
            return view('edit-professores', compact('prof','tempo_mag','tempo_exp','ext','div'));
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

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
            $localArmazem = storage_path().'/docprof/'.$prof->id.'/foto/';
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
        $prof->email = $request->email;

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

    public function foto($prof_id)
    {
        $prof = \App\Professor::where('id',$prof_id)->first();
        $path = storage_path() . '/docprof/' . $prof_id . '/foto/' . $prof->foto;

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}

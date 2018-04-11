<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function updateUser(Request $request)
    {
        $user = \App\User::where('email',$request->input('email'))->first();
        $user->name = $request->name;
        if ($request->password !== "") {
            $user->password = bcrypt($request->password);
        }
        $user->tipo_User_id = $request->tipo;
        $user->save();

        return back()->with('sucesso','Usuário alterado com sucesso!');
    }

    public function perfil($id=null)
    {
        if (Auth::user()->tipo->tipo == "Administrador") {
            $tipo = \App\TipoUser::lists('tipo','id');
        } elseif (Auth::user()->tipo->tipo == "Gerente") {
            $tipo = \App\TipoUser::where('tipo','!=','Administrador')->lists('tipo','id');
        } else {
            $tipo = \App\TipoUser::where('tipo','!=','Administrador')->where('tipo','!=','Gerente')->lists('tipo','id');
        }
        
        if ($id == null) {
            $user = Auth::user();
        } else {
            $user = \App\User::with('tipo')->where('id',$id)->first();
        }

        return view('auth.perfil',compact('user','tipo'));

    }

    public function usuarios()
    {
        $usuarios = \App\User::with('tipo')->get();
        return view('usuarios', compact('usuarios'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo = Auth::user()->tipo->tipo;
        $email = Auth::user()->email;
        $prof = \App\Professor::where('email', $email)->where('users_id',Auth::id())->get();
        if (($tipo == 'Administrador') || ($tipo == 'Gerente')) {
            $idTipoProf = \App\TipoUser::where('tipo','Professor')->first()->id;
            $pendentes = \App\User::where('tipo_User_id',$idTipoProf)->get();
            \App\Notificacoes::create(['notificacao' => Auth::user()->name.' entrou no sistema.']);
            return view('dashboard', compact('pendentes'));
            return view('dashboard');
        } elseif ($prof->count()<1) {
            \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' entrou no sistema.']);
            return redirect(route('prof.create'));
        } elseif ($prof->count() == 1) {
            \App\Notificacoes::create(['notificacao' => 'O Professor '.Auth::user()->name.' entrou no sistema.']);
            return redirect(route('prof.edit'));
        }
    }

    public function getRegister()
    {
        $tipoUser = Auth::user()->tipo->tipo;
        if (Auth::check()) {
            switch ($tipoUser) {
                case 'Professor':
                    return redirect(route('index'));
                    break;
                default:
                    if (Auth::user()->tipo->tipo == "Administrador") {
                        $tipo = \App\TipoUser::lists('tipo','id');
                    } elseif (Auth::user()->tipo->tipo == "Gerente") {
                        $tipo = \App\TipoUser::where('tipo','!=','Administrador')->lists('tipo','id');
                    } else {
                        $tipo = \App\TipoUser::where('tipo','!=','Administrador')->where('tipo','!=','Gerente')->lists('tipo','id');
                    }
                    $users = \App\User::with('tipo')->get();
                    return view('auth.register', compact('tipo','users'));
                    break;
            }
        } else {
            return redirect('login');
        }
    }
}

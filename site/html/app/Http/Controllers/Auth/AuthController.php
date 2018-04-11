<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Input;

class AuthController extends Controller
{
     protected $loginPath = '/login';
     protected $redirectTo = '/';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'tipo' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tipo_User_id' => $data['tipo'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function getLogin()
    {
        if (\Auth::check()) {
            return redirect(route('index'));
        } else {
            try {
                $tipo = \App\TipoUser::where('tipo','Professor')->pluck('id');
                $professores = \App\User::where('tipo_User_id',$tipo)->orderBy('name')->lists('name','id')->toArray();
                return view('auth.login', compact('professores'));
            } catch (Exception $e) {
                return view('login')->with('erro', $e);
            }
        }
        redirect('/');
    }

    public function getLogout()
    {
        \App\Notificacoes::create([
            'notificacao'=>Auth::user()->name . ' saiu.'
        ]);
        Auth::logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
}

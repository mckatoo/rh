<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotificacaoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    
    public function index(Request $request)
    {
        if (($request->search == null) or ($request->search == "")) {
            $notificacoes = \App\Notificacoes::get();
        } else {
            $notificacoes = \App\Notificacoes::where('notificacao','like',"%$request->search%")->get();
        }
        return view('notificacoes.index',compact('notificacoes'));
    }


    public function list()
    {
        $notificacao = \App\Notificacoes::orderBy('created_at','desc')->paginate(15);
        return view('notificacoes.list',compact('notificacao'));
    }

}

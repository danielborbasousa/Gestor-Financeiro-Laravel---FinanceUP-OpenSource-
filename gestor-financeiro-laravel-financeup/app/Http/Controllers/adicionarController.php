<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\trancacaoRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class adicionarController extends Controller
{
    public function index()
    {
        return view('adicionar-transacao');
    }

    public function create(trancacaoRequest $request)
    {

        try{
            $user = Auth::user();

            $dataComHora = Carbon::parse($request->data)->setTime(0, 0, 0);

            Transaction::create([
                "category" => $request->category,
                "type" => $request->type,
                "values" => $request->values,
                "email" => $user->email,
                "data" => $dataComHora->toDateTimeString(),
            ]);

            return redirect()->back()->with('success', 'Transação criada com sucesso!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Ocorreu um erro ao criar a transação. Por favor, tente novamente.');
        }
        
    }
}

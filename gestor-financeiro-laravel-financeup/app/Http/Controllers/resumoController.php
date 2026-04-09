<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Carbon\Carbon;

class resumoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $transactions = Transaction::where('email', $user->email)->get();

        return $this->Getresumo($transactions);
    }

    public function filter(Request $request)
    {
        $data = "$request->ano-$request->mes%";

        $transactions = Transaction::where('email', Auth::user()->email)
        ->where('data', 'LIKE', $data)
        ->get();    

        return $this->Getresumo($transactions);
    }

    public function Getresumo($transactions)
    {
        $financeController = new FinanceController();
        $totais = $financeController->calcularTotais($transactions);

        return view('resumo-mensal',[ 
            'totaldeganho' => $totais['totaldeganho'],
            'totaldegasto' => $totais['totaldegasto'],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        //pegar dados de 30 dias
        $trintadiasantes = Carbon::now()->subDays(30);

        $transactions = Transaction::where('email', Auth::user()->email)
        ->where('data', '>=', $trintadiasantes)
        ->get();

        //pegar total de gastos e ganhos
        $financeController = new FinanceController();
        $totais = $financeController->calcularTotais($transactions);

        return view('dashboard',[ 
            'totaldeganho' => $totais['totaldeganho'],
            'totaldegasto' => $totais['totaldegasto'],
            'saldo' => $totais['saldo'],
            'transactions' => $transactions,
        ]);
    }

    
}

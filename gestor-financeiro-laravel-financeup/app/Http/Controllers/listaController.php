<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class listaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $transactions = Transaction::where('email', $user->email)->get();

        return view('lista-transacoes', ['transactions' => $transactions]);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if ($transaction) {
            $transaction->delete();
            return redirect()->back()->with('success', 'Transação excluída com sucesso!');
        }

        return redirect()->back()->with('error', 'Transação não encontrada.');
    }
}

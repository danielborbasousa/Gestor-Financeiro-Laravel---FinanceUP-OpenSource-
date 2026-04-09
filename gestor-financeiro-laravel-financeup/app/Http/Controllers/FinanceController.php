<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function calcularTotais($transactions)
    {
        $totaldeganho = $totaldegasto = 0;

        foreach ($transactions as $transaction) {
            if ($transaction->type === "ganho") {
                $totaldeganho += $transaction->values;
            } else {
                $totaldegasto += $transaction->values;
            }
        }

        $saldo = $totaldeganho - $totaldegasto;

        return [
            'saldo' => $saldo,
            'totaldeganho' => $totaldeganho,
            'totaldegasto' => $totaldegasto,
        ];
    }
}

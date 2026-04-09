<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AcoesController extends Controller
{
    public function buscarAcoes()
    {
        $apiKey = 'csqhjihr01qv7qe2dbv0csqhjihr01qv7qe2dbvg';  // Substitua pela sua chave de API do Finnhub
        $symbols = ['MSFT', 'AAPL', 'GOOGL', 'AMZN', 'TSLA'];

        $acoes = [];

        foreach ($symbols as $symbol) {
            $url = "https://finnhub.io/api/v1/quote?symbol={$symbol}&token={$apiKey}";
            $response = Http::withOptions(['verify' => false])->get("https://finnhub.io/api/v1/quote?symbol={$symbol}&token={$apiKey}");

            if ($response->successful()) {
                $dados = $response->json();

                // Verifica se a resposta contém os dados necessários
                if (isset($dados['c'])) {
                    $acoes[$symbol] = [
                        'current' => $dados['c'], // Preço atual
                        'high' => $dados['h'],    // Preço mais alto
                        'low' => $dados['l'],     // Preço mais baixo
                        'open' => $dados['o'],    // Preço de abertura
                        'close' => $dados['pc'],  // Preço de fechamento do dia anterior
                    ];
                } else {
                    $acoes[$symbol] = 'Nenhum dado encontrado';
                }
            } else {
                $acoes[$symbol] = 'Erro ao buscar dados';
            }
        }

        return view('acoes', compact('acoes'));
    }
}
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotações de Ações</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-semibold text-center mb-8">Cotações de Ações Famosas</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($acoes as $symbol => $precos)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-4">Ação: {{ $symbol }}</h2>
                    
                    @if (is_array($precos))
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left border-b">Preço</th>
                                    <th class="px-4 py-2 text-left border-b">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border-b">Abertura</td>
                                    <td class="px-4 py-2 border-b">R$ {{ number_format($precos['open'], 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border-b">Fechamento</td>
                                    <td class="px-4 py-2 border-b">R$ {{ number_format($precos['close'], 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border-b">Mais Alto</td>
                                    <td class="px-4 py-2 border-b">R$ {{ number_format($precos['high'], 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border-b">Mais Baixo</td>
                                    <td class="px-4 py-2 border-b">R$ {{ number_format($precos['low'], 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border-b">Atual</td>
                                    <td class="px-4 py-2 border-b">R$ {{ number_format($precos['current'], 2, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="text-red-600">Erro ao buscar dados da ação.</p>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="/dashboard" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700">Voltar ao Dashboard</a>
        </div>
    </div>

</body>
</html>

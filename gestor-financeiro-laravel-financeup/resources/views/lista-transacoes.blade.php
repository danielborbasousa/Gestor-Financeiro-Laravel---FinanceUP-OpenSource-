<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Transações - FinanceUp</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 py-10">
  <div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Lista de Transações</h2>

      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
          @if (session('success'))
          <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
          </div>
          @endif

          @if (session('error'))
          <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
          </div>
          @endif
          <thead>
            <tr>
              <th class="py-3 px-4 bg-indigo-600 text-white font-semibold text-left">Descrição</th>
              <th class="py-3 px-4 bg-indigo-600 text-white font-semibold text-left">Valor</th>
              <th class="py-3 px-4 bg-indigo-600 text-white font-semibold text-left">Categoria</th>
              <th class="py-3 px-4 bg-indigo-600 text-white font-semibold text-left">Data</th>
              <th class="py-3 px-4 bg-indigo-600 text-white font-semibold text-left">Excluir</th>
            </tr>
          </thead>
          <tbody id="transactionList" class="text-gray-700">
            @foreach($transactions as $transaction)
            <tr>
              <td class="border-t py-2 px-4">{{$transaction->category}}</td>
              @if($transaction->type == "ganho")
              <td class="border-t py-2 px-4 text-green-600">R$ {{$transaction->values}}</td>
              @else
              <td class="border-t py-2 px-4 text-red-600">R$ {{$transaction->values}}</td>
              @endif
              <td class="border-t py-2 px-4">{{$transaction->type}}</td>
              <td class="border-t py-2 px-4">{{ \Carbon\Carbon::parse($transaction->data)->format('d/m/Y') }}</td>

              <td class="border-t py-2 px-4 flex items-center justify-center">
                <form action="{{ route('transacao.delete', $transaction->id) }}" method="POST" class="inline">
                  @csrf
                  <button type="submit" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash-alt"></i> Excluir
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <a href="\dashboard" class="block mt-6 text-center bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">Voltar ao Dashboard</a>
    </div>
  </div>
</body>

</html>
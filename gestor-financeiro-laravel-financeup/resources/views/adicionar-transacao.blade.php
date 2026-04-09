<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Transação - FinanceUp</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Adicionar Nova Transação</h2>
    @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    <form id="transactionForm" action="{{route('post.trancacao')}}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label for="mes" class="block text-lg font-semibold">Data:</label>
      </div>

      <div>
        <input type="date" id="data" name="data" placeholder="Data" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
      </div>

      <input type="text" id="category" name="category" placeholder="Motivo" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">

      <select id="type" name="type" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
        <option value="ganho">Ganho</option>
        <option value="gasto">Gasto</option>
      </select>

      <input type="number" id="values" name="values" placeholder="Valor" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">

      <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700">Adicionar</button>
    </form>

    <a href="/dashboard" class="block mt-6 text-center bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">Voltar ao Dashboard</a>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - FinanceUp</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 10;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      position: relative;
      width: 90%;
      max-width: 600px;
      max-height: 80%;
    }
    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }
  </style>
</head>

<body class="bg-gray-100">
  <div class="flex flex-col md:flex-row h-screen">
    <!-- Barra Lateral -->
    <nav class="bg-white w-full md:w-64 h-auto md:h-full shadow-md">
      <div class="p-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Menu</h2>
        <ul class="space-y-4">
          <li>
            <a href="resumo-mensal" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-indigo-100">
              <i class="fas fa-chart-line mr-2"></i>
              Resumo Mensal
            </a>
          </li>
          <li>
            <a href="adicionar-transacao" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-green-100">
              <i class="fas fa-plus-circle mr-2"></i>
              Adicionar Transação
            </a>
          </li>
          <li>
            <a href="lista-transacoes" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-100">
              <i class="fas fa-list mr-2"></i>
              Lista de Transações
            </a>
          </li>
          <!-- Novo item de menu para Notícias -->
          <li>
            <a href="noticias" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-yellow-100">
              <i class="fas fa-newspaper mr-2"></i>
              Notícias
            </a>
          </li>
          <li>
            <a href="acoes" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-green-100">
              <i class="fas fa-chart-line mr-2"></i>
              Ações
            </a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="GET" class="w-full">
              @csrf
              <button type="submit" class="flex items-center p-3 text-red-500 rounded-lg hover:bg-red-100 w-full text-left">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Sair
              </button>
            </form>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="flex-1 p-4 md:p-8">
      <div class="bg-white p-4 rounded-lg shadow-lg mx-auto max-w-full">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Bem-vindo ao FinanceUp!</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
          <!-- Blocos de Resumo (Saldo Total, Despesas, Receitas) com hover e focus -->
          <div class="bg-yellow-200 p-4 rounded-lg shadow-md transform transition duration-200 hover:scale-105 focus:scale-105 focus:shadow-lg hover:shadow-lg">
            <h3 class="text-lg font-semibold text-gray-700">Saldo Total</h3>
            <p class="text-2xl font-bold text-gray-800">R$ {{$saldo}}</p>
            <p class="text-gray-600">Últimos 30 dias</p>
          </div>
          <div class="bg-red-200 p-4 rounded-lg shadow-md transform transition duration-200 hover:scale-105 focus:scale-105 focus:shadow-lg hover:shadow-lg">
            <h3 class="text-lg font-semibold text-gray-700">Resumo de Despesas</h3>
            <p class="text-2xl font-bold text-gray-800">R$ {{$totaldegasto}}</p>
            <p class="text-gray-600">Últimos 30 dias</p>
          </div>
          <div class="bg-green-200 p-4 rounded-lg shadow-md transform transition duration-200 hover:scale-105 focus:scale-105 focus:shadow-lg hover:shadow-lg">
            <h3 class="text-lg font-semibold text-gray-700">Resumo de Receitas</h3>
            <p class="text-2xl font-bold text-gray-800">R$ {{$totaldeganho}}</p>
            <p class="text-gray-600">Últimos 30 dias</p>
          </div>
        </div>

        <!-- Controle do Gráfico -->
        <div class="mb-4 flex items-center space-x-4">
          <select id="chartType" class="border border-gray-300 rounded p-2">
            <option value="bar">Gráfico de Barras</option>
            <option value="pie">Gráfico de Pizza</option>
          </select>
        </div>

        <!-- Gráfico de Despesas -->
        <div class="mb-6">
          <canvas id="financialChart" class="w-full" style="height: 250px; width: 250px;"></canvas>
        </div>

        <!-- Tabela de Transações -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">Últimas Transações</h3>
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
              <thead>
                <tr class="w-full bg-gray-100">
                  <th class="py-2 px-4 text-left">Data</th>
                  <th class="py-2 px-4 text-left">Descrição</th>
                  <th class="py-2 px-4 text-left">Valor</th>
                </tr>
              </thead>
              <tbody>
                @foreach($transactions as $transaction)
                <tr>
                  <td class="border-t py-2 px-4">{{ \Carbon\Carbon::parse($transaction->data)->format('d/m/Y') }}</td>
                  <td class="border-t py-2 px-4">{{$transaction->category}}</td>
                  @if($transaction->type == "ganho")
                  <td class="border-t py-2 px-4 text-green-600">R$ {{$transaction->values}}</td>
                  @else
                  <td class="border-t py-2 px-4 text-red-600">R$ {{$transaction->values}}</td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/scripts.js') }}"></script>

  <script>
    const ctx = document.getElementById('financialChart').getContext('2d');
    let chartType = 'bar'; // Tipo inicial do gráfico
    let financialChart;

    function createChart(type, data = [{{ json_encode($saldo) }}, {{ json_encode($totaldegasto) }}, {{ json_encode($totaldeganho) }}]) {
      // Restante do código do gráfico...
      // Destruir gráfico atual se existir
      if (financialChart) {
        financialChart.destroy();
      }

      // Criar um novo gráfico com o tipo especificado
      financialChart = new Chart(ctx, {
        type: type,
        data: {
          labels: ['Saldo Total', 'Despesas', 'Receitas'],
          datasets: [{
            label: 'Valores (R$)',
            data: data,
            backgroundColor: [
              'rgba(255, 206, 86, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
              'rgba(255, 206, 86, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    // Configurar o gráfico inicial
    createChart(chartType);

    // Alterar tipo de gráfico
    document.getElementById('chartType').addEventListener('change', (event) => {
      chartType = event.target.value;
      createChart(chartType);
    });
  </script>
</body>
</html>

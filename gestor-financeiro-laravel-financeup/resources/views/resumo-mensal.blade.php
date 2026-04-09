<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resumo Mensal - FinanceUp</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen min-h-screen px-4 mt-6">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Resumo Mensal</h2>
    
    <form action="{{ route('post.resumo-mensal') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="mes" class="block text-lg font-semibold">Filtro:</label>
        <select id="mes" name="mes" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
          <option value="1">Janeiro</option>
          <option value="2">Fevereiro</option>
          <option value="3">Março</option>
          <option value="4">Abril</option>
          <option value="5">Maio</option>
          <option value="6">Junho</option>
          <option value="7">Julho</option>
          <option value="8">Agosto</option>
          <option value="9">Setembro</option>
          <option value="10">Outubro</option>
          <option value="11">Novembro</option>
          <option value="12">Dezembro</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="ano" class="block text-lg font-semibold">Escolha o Ano:</label>
        <select id="ano" name="ano" class="mt-1 block w-full border border-gray-300 rounded-lg p-2"></select>
      </div>

      <div class="flex space-x-4">
        <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">
          Aplicar
        </button>

        <button type="button" onclick="limparFormulario()" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">
          Limpar
        </button>
      </div>
    </form>

    <!-- Resumo Financeiro -->
    <div class="flex justify-between items-center border-b py-4">
      <p class="text-lg font-semibold">Total de Ganhos:</p>
      <span id="total-ganhos" class="text-green-600 font-bold text-lg">R$ {{$totaldeganho}}</span>
    </div>

    <div class="flex justify-between items-center border-b py-4">
      <p class="text-lg font-semibold">Total de Gastos:</p>
      <span id="total-gastos" class="text-red-600 font-bold text-lg">R$ {{$totaldegasto}}</span>
    </div>

    <!-- Notificação de Status -->
    <div id="mensagem-status" class="p-4 mt-4 text-center font-semibold rounded-lg"></div>

    <!-- Gráfico -->
    <canvas id="graficoResumo" class="my-4 h-40"></canvas>
    
    <a href="\dashboard" class="block mt-6 text-center bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">Voltar ao Dashboard</a>
  </div>

  <script>
    // Função para popular o campo de ano dinamicamente
    function popularAnos() {
      const anoSelect = document.getElementById('ano');
      const anoAtual = new Date().getFullYear();
      const anoInicio = 2023;
      
      for (let ano = anoInicio; ano <= anoAtual; ano++) {
        const option = document.createElement('option');
        option.value = ano;
        option.textContent = ano;
        anoSelect.appendChild(option);
      }
    }
    
    // Função para exibir a notificação de status financeiro
    function exibirMensagemStatus() {
      const mensagemStatus = document.getElementById('mensagem-status');
      const totalGanho = parseFloat('{{$totaldeganho}}');
      const totalGasto = parseFloat('{{$totaldegasto}}');

      if (totalGanho === 0 && totalGasto === 0) {
        mensagemStatus.innerText = 'Nenhum dado disponível para este mês.';
        mensagemStatus.classList.add('bg-gray-100', 'text-gray-700');
        return;
      }

      if (totalGanho > totalGasto) {
        mensagemStatus.innerText = 'Parabéns! Você ganhou mais do que gastou este mês.';
        mensagemStatus.classList.add('bg-green-100', 'text-green-700');
      } else if (totalGasto > totalGanho) {
        mensagemStatus.innerText = 'Atenção! Você gastou mais do que ganhou este mês.';
        mensagemStatus.classList.add('bg-red-100', 'text-red-700');
      } else {
        mensagemStatus.innerText = 'Você atingiu o ponto de equilíbrio financeiro este mês.';
        mensagemStatus.classList.add('bg-yellow-100', 'text-yellow-700');
      }
    }

    // Inicializa o campo de ano e status financeiro ao carregar a página
    document.addEventListener('DOMContentLoaded', () => {
      popularAnos();
      exibirMensagemStatus();
    });

    // Função para limpar o formulário
    function limparFormulario() {
      window.location = "{{ route('post.resumo-mensal') }}";
    }

    // Configurações do gráfico
    const ctx = document.getElementById('graficoResumo').getContext('2d');
    const graficoResumo = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Ganhos', 'Gastos'],
        datasets: [{
          label: 'Total',
          data: [parseFloat('{{$totaldeganho}}'), parseFloat('{{$totaldegasto}}')],
          backgroundColor: ['rgba(75, 192, 192, 0.6)', 'rgba(255, 99, 132, 0.6)'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            title: { display: true, text: 'Valor (R$)' }
          }
        }
      }
    });
  </script>
</body>
</html>

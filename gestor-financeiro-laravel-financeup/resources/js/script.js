// Armazenar transações em um array
let transactions = [];

// Listener para o formulário de adição de transação
document.getElementById("transactionForm")?.addEventListener("submit", function (event) {
  event.preventDefault();

  // Obtém os valores dos campos do formulário
  const description = document.getElementById("description").value;
  const amount = parseFloat(document.getElementById("amount").value);
  const category = document.getElementById("category").value;

  // Verifica se todos os campos foram preenchidos corretamente
  if (!description || isNaN(amount) || !category) {
    alert("Por favor, preencha todos os campos corretamente.");
    return;
  }

  // Adiciona a nova transação ao array
  const transaction = {
    description,
    amount,
    category,
    date: new Date().toLocaleDateString() // Adiciona a data atual
  };
  transactions.push(transaction);

  // Cria o item da lista para exibir a transação
  const transactionList = document.getElementById("transactions");
  const listItem = document.createElement("li");
  listItem.textContent = `${description} - R$ ${amount.toFixed(2)} - ${category} - ${transaction.date}`;
  transactionList.appendChild(listItem);

  // Reseta o formulário para limpar os campos
  document.getElementById("transactionForm").reset();

  // Atualiza o gráfico
  updateChart();

  // Lógica para armazenar ou processar a transação (exemplo com console log)
  console.log(`Descrição: ${description}, Valor: ${amount}, Categoria: ${category}`);
});

// Função para atualizar o gráfico de despesas
function updateChart() {
  const expenseData = {}; // Para armazenar a soma de despesas por categoria

  // Percorre as transações e acumula os valores por categoria
  transactions.forEach(transaction => {
    const { category, amount } = transaction;
    if (!expenseData[category]) {
      expenseData[category] = 0;
    }
    expenseData[category] += amount;
  });

  // Atualiza os dados do gráfico
  const labels = Object.keys(expenseData);
  const data = Object.values(expenseData);

  // Atualiza o gráfico
  const ctx = document.getElementById('expenseChart').getContext('2d');
  if (window.expenseChart) {
    window.expenseChart.destroy(); // Destroi o gráfico anterior se já existir
  }
  window.expenseChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels.length > 0 ? labels : ['Nenhuma Categoria'], // Adiciona uma categoria padrão se não houver dados
      datasets: [{
        label: 'Despesas (em R$)',
        data: data.length > 0 ? data : [0], // Adiciona 0 se não houver dados
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}

// Função de logout
function logout() {
  window.location.href = "index.html";
}

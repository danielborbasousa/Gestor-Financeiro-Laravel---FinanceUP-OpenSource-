<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notícias de Economia - FinanceUp</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4 mt-6">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Notícias sobre Economia e Dicas de Economia</h2>

    <!-- Plugin de Notícias -->
    <div id="noticias-economia" class="mt-4">
      <!-- Conteúdo será carregado dinamicamente aqui -->
      <p>Carregando notícias...</p>
    </div>
    
    <a href="{{ url('/dashboard') }}" class="block mt-6 text-center bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">
      Voltar ao Dashboard
    </a>
  </div>

  <!-- JavaScript para carregar as notícias de economia -->
  <script>
    async function carregarNoticias() {
      try {
        // Substitua 'SUA_CHAVE_AQUI' pela sua chave da NewsAPI
        const response = await fetch('https://newsapi.org/v2/everything?q=economia&language=pt&sortBy=publishedAt&apiKey=183b0be1705d400f98a5a5c8f0ac901e');
        
        // Verifique se a resposta é válida
        if (!response.ok) {
          throw new Error('Erro ao buscar as notícias');
        }
        
        const data = await response.json();

        if (data.articles.length === 0) {
          document.getElementById('noticias-economia').innerHTML = '<p class="text-red-600">Nenhuma notícia encontrada.</p>';
          return;
        }

        const container = document.getElementById('noticias-economia');
        container.innerHTML = data.articles.slice(0, 5).map(article => `
          <div class="mb-4 border-b pb-4">
            <a href="${article.url}" target="_blank" class="text-indigo-600 font-semibold hover:underline">${article.title}</a>
            <p class="text-gray-700 mt-2">${article.description || ''}</p>
          </div>
        `).join('');
      } catch (error) {
        // Se houver erro na requisição, exibe uma mensagem no console e na página
        console.error('Erro ao carregar as notícias:', error);
        document.getElementById('noticias-economia').innerHTML = '<p class="text-red-600">Erro ao carregar as notícias.</p>';
      }
    }

    // Chama a função para carregar as notícias
    carregarNoticias();
  </script>
</body>
</html>

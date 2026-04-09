<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - FinanceUp</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4 sm:p-8 lg:p-16">
  <div class="bg-white p-6 sm:p-8 lg:p-12 rounded-lg shadow-lg w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-700 mb-6">Login</h2>
         @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
    <form id="loginForm" action="{{ route('post.login') }}" method="POST" class="space-y-4">
      @csrf
      <input type="email" id="email" name="email" placeholder="Email" required class="w-full p-3 md:p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
      <input type="password" id="password" name="password" placeholder="Senha" required class="w-full p-3 md:p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
      <button type="submit" class="w-full bg-indigo-600 text-white py-3 md:py-4 rounded-lg font-semibold hover:bg-indigo-700">Entrar</button>
      <p class="text-gray-500 text-center">Não tem uma conta? <a href="/cadastro" class="text-indigo-600 hover:underline">Cadastre-se</a></p>
    </form>
  </div>
</body>
</html>

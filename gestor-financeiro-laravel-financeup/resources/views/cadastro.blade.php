<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - FinanceUp</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Cadastro</h2>   
    <form id="signupForm" action="{{ route('post.cadastro') }}" method="POST" class="space-y-4">
      @csrf
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
      <input type="text" id="name" name="name" placeholder="Nome" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
      <!--<input type="tel" id="phone" placeholder="Telefone" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">-->
      <input type="email" id="email" name="email" placeholder="Email" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">

      <div class="relative">
        <input type="password" id="password" name="password" placeholder="Senha" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
        <button type="button" id="togglePassword" name="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3">
          <i class="fas fa-eye" id="passwordIcon"></i>
        </button>
      </div>

      <div class="relative">
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Senha" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
        <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 flex items-center pr-3">
          <i class="fas fa-eye" id="confirmPasswordIcon"></i>
        </button>
      </div>

      <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">Cadastrar</button>
      <p class="text-gray-500 text-center">Já tem uma conta? <a href="/" class="text-indigo-600 hover:underline">Entre aqui</a></p>
    </form>
  </div>

  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('signupPassword');
    const passwordIcon = document.getElementById('passwordIcon');

    togglePassword.addEventListener('click', function () {
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);
      passwordIcon.classList.toggle('fa-eye');
      passwordIcon.classList.toggle('fa-eye-slash');
    });

    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordField = document.getElementById('confirmPassword');
    const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');

    toggleConfirmPassword.addEventListener('click', function () {
      const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmPasswordField.setAttribute('type', type);
      confirmPasswordIcon.classList.toggle('fa-eye');
      confirmPasswordIcon.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>

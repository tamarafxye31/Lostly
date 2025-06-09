<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in - Lostly</title>
  <meta name="title" content="Lostly">
  <meta name="description" content="">

  <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Quicksand', 'sans-serif'],
          },
          colors: {
            primary: '#4f46e5',
            secondary: '#6366f1',
          }
        }
      }
    }
  </script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">
  <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Form Header -->
    <div class="bg-primary p-6 text-center">
      <a href="/" class="inline-block">
        <img src="{{ asset('images/logo-dark.svg') }}" alt="Lostly" class="h-10 mx-auto">
      </a>
      <h2 class="mt-3 text-xl font-semibold text-white">Welcome back</h2>
      <p class="text-white/90 text-sm mt-1">Log in to your Account</p>
    </div>

   @if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

@if(session('status'))
    <div class="mb-4 px-4 py-2 bg-blue-100 border border-blue-200 text-blue-700 rounded">
        {{ session('status') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-4 px-4 py-2 bg-red-100 border border-red-200 text-red-700 rounded">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    
    <!-- Form Section -->
    <div class="p-6">
      <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
          <input type="email" id="email" name="email" required
                 class="w-full px-3 py-2 text-sm rounded border border-gray-300 focus:ring-1 focus:ring-primary focus:border-primary">
        </div>

        <div class="relative">
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" id="password" name="password" required
                 class="w-full px-3 py-2 text-sm rounded border border-gray-300 focus:ring-1 focus:ring-primary focus:border-primary pr-8">
          <span class="absolute right-2 top-8 text-gray-400 cursor-pointer password-toggle-icon">
            <i class="fas fa-eye text-sm"></i>
          </span>
        </div>

        <button type="submit" class="w-full bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded text-sm transition duration-150">
          Log in
        </button>
      </form>

      <p class="text-xs text-center text-gray-500 mt-4">
        Don't have an account? 
        <a href="{{ route('register') }}" class="text-primary font-medium hover:underline">Sign up</a>
      </p>
    </div>
  </div>

  <script>
    const passwordField = document.getElementById("password");
    const togglePassword = document.querySelector(".password-toggle-icon i");

    togglePassword.addEventListener("click", function () {
      if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
      }
    });
  </script>
</body>
</html>
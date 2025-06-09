<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Lostly</title>
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
      <h2 class="mt-3 text-xl font-semibold text-white">Create an Account</h2>
    </div>
    
@if($errors->any())
    <div class="mb-4 text-sm text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Form Section -->
    <div class="p-6">
      <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First name</label>
            <input type="text" id="first_name" name="first_name" required autofocus
                   class="w-full px-3 py-2 text-sm rounded border border-gray-300 focus:ring-1 focus:ring-primary focus:border-primary">
          </div>

          <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
            <input type="text" id="last_name" name="last_name" required
                   class="w-full px-3 py-2 text-sm rounded border border-gray-300 focus:ring-1 focus:ring-primary focus:border-primary">
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" id="email" name="email" required
                 class="w-full px-3 py-2 text-sm rounded border border-gray-300 focus:ring-1 focus:ring-primary focus:border-primary">
        </div>

        <div>
          <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
          <input type="tel" id="phone" name="phone" maxlength="11" required
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

        <div class="text-xs text-center text-gray-500 pt-2">
          <p>By creating an account, you agree to our 
            <a href="#" class="text-primary hover:underline">Privacy Policy</a> and
            <a href="#" class="text-primary hover:underline">Terms</a>
          </p>
        </div>

        <button type="submit" class="w-full bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded text-sm transition duration-150">
          Sign Up
        </button>
      </form>

      <p class="text-xs text-center text-gray-500 mt-4">
        Already have an account? 
        <a href="{{ route('login') }}" class="text-primary font-medium hover:underline">Log in</a>
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
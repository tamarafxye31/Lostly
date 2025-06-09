<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Lost Item Inventory</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center p-6">
        @csrf
        <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-8 text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome to Lostly</h1>
                <p class="text-gray-600 mb-8">Report, track, and recover lost items with ease.</p>
                <div class="space-y-4">
                    <p class="text-gray-700">Please log in or register to continue.</p>
                </div>
            </div>

            <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
<div class="flex flex-row space-x-3 justify-center">
    <a href="{{ route('login') }}" 
       class="w-1/2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 text-center">
        Login
    </a>
    <a href="{{ route('register') }}" 
       class="w-1/2 px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition duration-200 text-center">
        Register
    </a>
</div>

    
</div>

        </div>
    </body>
</html>
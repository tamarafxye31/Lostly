@php
    use App\Models\Item;
    use App\Models\User;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .stat-card {
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }

.empty-state {
    transition: all 0.3s ease;
}
.empty-state:hover {
    transform: translateY(-2px);
}        
    </style>
</head>
<body class="bg-gray-100">
    
@section('content')
<div class="min-h-screen">
    <!-- Sidebar Navigation -->
    <nav class="fixed top-0 left-0 h-screen w-64 bg-gray-800 text-white p-4">
        <div class="text-2xl font-bold mb-8">Lostly Admin</div>
        <ul>
            <li class="mb-4">
                <a href="#dashboard" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="#items" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span>Manage Items</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="#users" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span>User Management</span>
                </a>
            </li>
            <li class="mb-4">
                <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="flex items-center p-2 hover:bg-gray-700 rounded w-full text-left">
        <span>Logout</span>
    </button>
</form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="ml-64 p-8">
        <!-- Dashboard Overview -->
<section id="dashboard" class="mb-8">
    <h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Lost Items Card -->
        <div class="stat-card bg-blue-500 text-white rounded-lg p-6 shadow-lg">
            <h3 class="text-lg font-semibold">Total Lost Items</h3>
            <p class="text-3xl font-bold">
                {{ $stats['total_lost'] > 0 ? $stats['total_lost'] : 'No lost items' }}
            </p>
        </div>

        <!-- Found Items Card -->
        <div class="stat-card bg-green-500 text-white rounded-lg p-6 shadow-lg">
            <h3 class="text-lg font-semibold">Total Found Items</h3>
            <p class="text-3xl font-bold">
                {{ $stats['total_found'] > 0 ? $stats['total_found'] : 'No found items' }}
            </p>
        </div>

        <!-- Resolved Cases Card -->
        <div class="stat-card bg-purple-500 text-white rounded-lg p-6 shadow-lg">
            <h3 class="text-lg font-semibold">Resolved Cases</h3>
            <p class="text-3xl font-bold">
                {{ $stats['resolved_cases'] > 0 ? $stats['resolved_cases'] : 'No resolved cases' }}
            </p>
        </div>

        <!-- Active Users Card -->
        <div class="stat-card bg-yellow-500 text-white rounded-lg p-6 shadow-lg">
            <h3 class="text-lg font-semibold">Active Users</h3>
            <p class="text-3xl font-bold">
                {{ $stats['active_users'] > 0 ? $stats['active_users'] : 'No active users' }}
            </p>
        </div>
    </div>
</section>

<!-- Items Management -->
<section id="items" class="mb-8">
    <h2 class="text-2xl font-bold mb-4">Manage Items</h2>
    <div class="bg-white rounded-lg shadow p-6">
        @if(Item::count() > 0)
            <!-- Your existing items table code -->
            <table class="w-full">
                <!-- Table headers -->
                <tbody id="itemsTable">
                    <!-- Table content -->
                </tbody>
            </table>
        @else
            <div class="text-center py-8">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No items found</h3>
                <p class="mt-1 text-gray-500">Get started by adding your first lost or found item.</p>
                <div class="mt-6">
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Add New Item
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- User Management -->
<section id="users" class="mb-8">
    <h2 class="text-2xl font-bold mb-4">User Management</h2>
    <div class="bg-white rounded-lg shadow p-6">
        @if(User::count() > 0)
            <!-- Your existing users table code -->
            <table class="w-full">
                <!-- Table headers -->
                <tbody id="usersTable">
                    <!-- Table content -->
                </tbody>
            </table>
        @else
            <div class="text-center py-8">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No users found</h3>
                <p class="mt-1 text-gray-500">No users have registered yet.</p>
                <div class="mt-6">
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Add New User
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>
@push('scripts')
<script src="{{ asset('js/script.js') }}"></script>
@endpush


  
</body>
</html>
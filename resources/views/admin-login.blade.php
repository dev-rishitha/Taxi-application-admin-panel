<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login | UX DriveDesk</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
    <div class="flex justify-center mb-6">
      <img src="/images/ux-removebg-preview.png" alt="UX DriveDesk" class="w-16 h-16">
    </div>
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Admin Login</h2>

    @if(session('error'))
      <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
      @csrf
      <div>
        <label class="block text-gray-700 font-medium mb-1">Username</label>
        <input type="text" name="username" required class="w-full border-gray-300 rounded p-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="admin@example.com">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Password</label>
        <input type="password" name="password" required class="w-full border-gray-300 rounded p-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="••••••••">
      </div>

      <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 rounded font-semibold transition duration-200">
        Login
      </button>
    </form>
  </div>

</body>
</html>

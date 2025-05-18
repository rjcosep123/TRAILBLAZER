<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TrailBlazer - Faculty Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes slideIn {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .slide-in {
      animation: slideIn 0.6s ease-out forwards;
    }
  </style>
</head>
<body class="relative h-screen w-screen overflow-hidden">

  <!-- Background -->
  <div class="absolute inset-0 z-0 bg-cover bg-center filter blur-sm opacity-90" style="background-image: url('/pics/k21.jpg');"></div>

  <!-- Header -->
  <header class="z-10 relative bg-blue-800 text-white flex items-center justify-between px-6 py-4 shadow-md">
    <div class="flex items-center gap-3">
      <img src="/pics/k22.jpg" alt="Logo" class="h-8" />
      <span class="font-semibold text-lg">Dormitory Reservation System</span>
    </div>
    <nav class="flex gap-6">
      <a href="#" class="hover:underline">About</a>
      <a href="#" class="hover:underline">Contacts</a>
      <a href="#" class="hover:underline">Creators/Members</a>
    </nav>
  </header>

  <!-- Login Form Card -->
  <div class="relative z-10 flex items-center justify-center h-[calc(100vh-80px)]">
    <form id="facultyForm" class="bg-white bg-opacity-80 backdrop-blur-md p-8 rounded-lg shadow-lg text-center max-w-sm w-full space-y-6 slide-in">
      <h2 class="text-xl font-semibold">Faculty Login</h2>

      <div class="flex flex-col text-left">
        <label for="facultyUsername" class="text-sm mb-1 font-medium">Username</label>
        <input id="facultyUsername" type="text" placeholder="Enter your username" class="px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" autocomplete="off">
      </div>

      <div class="flex flex-col text-left">
        <label for="facultyPassword" class="text-sm mb-1 font-medium">Password</label>
        <input id="facultyPassword" type="password" placeholder="Enter your password" class="px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div class="flex flex-col gap-3">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded transition">Login</button>
        <button type="button" onclick="window.location.href='facultysign'" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 rounded transition">
          Sign Up
        </button>
      </div>
    </form>
  </div>

  <!-- Back to Home Button -->
  <div class="absolute bottom-4 left-4 z-20">
    <button onclick="window.location.href='/'" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition">
      Back to Home
    </button>
  </div>

</body>
</html>

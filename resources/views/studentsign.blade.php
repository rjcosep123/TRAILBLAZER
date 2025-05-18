<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Sign Up - TrailBlazer</title>
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

  <!-- Sign Up Form -->
  <div class="relative z-10 flex items-center justify-center h-[calc(100vh-80px)]">
    <form action="{{ route('student.register') }}" method="POST" class="bg-white bg-opacity-80 backdrop-blur-md p-8 rounded-lg shadow-lg text-center max-w-sm w-full space-y-6 slide-in">
      @csrf

      <h2 class="text-xl font-semibold">Student Sign Up</h2>

      <!-- Full Name -->
      <div class="flex flex-col text-left">
        <label for="fullName" class="text-sm mb-1 font-medium">Full Name</label>
        <input name="fullName" id="fullName" type="text" value="{{ old('fullName') }}" placeholder="Enter your full name" class="px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        @error('fullName')
          <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <!-- Email -->
      <div class="flex flex-col text-left">
        <label for="signupEmail" class="text-sm mb-1 font-medium">Email</label>
        <input name="signupEmail" id="signupEmail" type="email" value="{{ old('signupEmail') }}" placeholder="Enter your email" class="px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        @error('signupEmail')
          <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <!-- Password -->
      <div class="flex flex-col text-left">
        <label for="signupPassword" class="text-sm mb-1 font-medium">Password</label>
        <input name="signupPassword" id="signupPassword" type="password" placeholder="Enter your password" class="px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        @error('signupPassword')
          <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="flex flex-col text-left">
        <label for="signupPassword_confirmation" class="text-sm mb-1 font-medium">Confirm Password</label>
        <input name="signupPassword_confirmation" id="signupPassword_confirmation" type="password" placeholder="Re-enter your password" class="px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        @error('signupPassword_confirmation')
          <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <!-- Buttons -->
      <div class="flex flex-col gap-3">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded transition">
          Create Account
        </button>
        <a href="{{ route('student.login') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 rounded transition text-center">Back to Login</a>
      </div>
    </form>
  </div>

</body>
</html>

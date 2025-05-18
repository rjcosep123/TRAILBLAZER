<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dormitory Reservation System</title>
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

  <!-- Background Image -->
  <div class="absolute inset-0 z-0 bg-cover bg-center filter blur-sm opacity-90" style="background-image: url('/pics/k21.jpg');"></div>

  <!-- Header/Navbar -->
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

  <!-- Selection Card -->
  <div class="relative z-10 flex items-center justify-center h-[calc(100vh-80px)]">
    <div class="bg-white bg-opacity-80 backdrop-blur-md p-8 rounded-lg shadow-lg text-center max-w-sm w-full slide-in">
      <h2 class="text-xl font-semibold mb-6">Are you a Faculty or a Student?</h2>
      <div class="flex flex-col gap-4">
        <a href="faculty" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition">Faculty</a>
        <a href="student" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition">Student</a>
      </div>
    </div>
  </div>

</body>
</html>

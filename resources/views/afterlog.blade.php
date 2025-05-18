<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dormitory Room Availability</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <style>
    @keyframes slideIn {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .slide-in { animation: slideIn 0.6s ease-out forwards; }

    .room-grid-container::-webkit-scrollbar { width: 8px; }
    .room-grid-container::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.2); border-radius: 10px; }
    .room-grid-container::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.5); border-radius: 10px; }
    .room-grid-container::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.7); }

    .flatpickr-input {
      width: 100%;
      padding: 0.75rem;
      border-radius: 0.375rem;
      background-color: rgba(243, 244, 246, 0.7);
      border: 1px solid #d1d5db;
      color: #1f2937;
      text-align: center;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      outline: none;
    }
    .flatpickr-input:focus { border-color: #3b82f6; }

    .left-sidebar {
      position: fixed; top: 0; left: -256px; width: 256px; height: 100%;
      background-color: rgba(17, 24, 39, 0.9); color: white;
      box-shadow: 2px 0 5px rgba(0,0,0,0.5); transition: left 0.3s ease-in-out;
      z-index: 50; display: flex; flex-direction: column; padding: 1.5rem;
    }
    .left-sidebar.open { left: 0; }

    .sidebar-overlay {
      position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5);
      z-index: 40; opacity: 0; transition: opacity 0.3s ease-in-out;
    }
    .sidebar-overlay.visible { opacity: 1; }
    .sidebar-overlay.hidden { display: none; }
  </style>
</head>
<body class="relative h-screen w-screen overflow-hidden font-sans">

  <!-- Background -->
  <div class="absolute inset-0 z-0 bg-cover bg-center filter blur-sm opacity-90" style="background-image: url('/pics/k21.jpg');"></div>

  <!-- Sidebar -->
  <div id="left-sidebar" class="left-sidebar">
    <div class="mb-8"><span class="font-semibold text-xl">Menu</span></div>
    <nav class="flex flex-col gap-4 flex-grow">
      <a href="#" class="flex items-center gap-3 text-gray-300 hover:text-white transition cursor-pointer">🏠 Home</a>
      <a href="#" class="flex items-center gap-3 text-gray-300 hover:text-white transition cursor-pointer">⚙️ Settings</a>
    </nav>
    <div class="mt-auto">
      <a href="/" class="text-white bg-red-600 hover:bg-red-700 font-bold py-2 px-4 rounded-md transition duration-200">Sign out</a>
    </div>
  </div>
  <div id="sidebar-overlay" class="sidebar-overlay hidden"></div>

  <!-- Header -->
  <header class="z-10 relative bg-blue-800 text-white flex items-center justify-between px-6 py-4 shadow-md">
    <div class="flex items-center gap-3">
      <svg id="burger-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span class="font-semibold text-lg">Dormitory Dashboard</span>
    </div>
  </header>

  <!-- Main Content -->
  <main class="relative z-10 flex-1 flex p-6 gap-6 h-[calc(100vh-80px)] overflow-hidden">
    <!-- Room Grid -->
    <section class="flex-grow grid grid-cols-4 gap-4 p-4 bg-white bg-opacity-80 backdrop-blur-md rounded-lg shadow-lg overflow-y-auto room-grid-container slide-in">
      <!-- Room Cards (1–20) -->
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="1">ROOM NUMBER 1</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="2">ROOM NUMBER 2</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="3">ROOM NUMBER 3</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="4">ROOM NUMBER 4</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="5">ROOM NUMBER 5</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="6">ROOM NUMBER 6</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="7">ROOM NUMBER 7</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="8">ROOM NUMBER 8</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="9">ROOM NUMBER 9</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="10">ROOM NUMBER 10</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="11">ROOM NUMBER 11</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="12">ROOM NUMBER 12</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="13">ROOM NUMBER 13</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="14">ROOM NUMBER 14</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="15">ROOM NUMBER 15</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="16">ROOM NUMBER 16</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="17">ROOM NUMBER 17</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="18">ROOM NUMBER 18</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="19">ROOM NUMBER 19</div>
      <div class="room-card bg-gray-200 text-blue-800 py-5 px-3 rounded-md text-center cursor-pointer hover:bg-gray-300 transition" data-room="20">ROOM NUMBER 20</div>
    </section>
      </script>
    </section>

    <!-- Sidebar Widgets -->
    <aside class="relative z-10 w-80 flex flex-col gap-6 slide-in" style="animation-delay: 0.2s;">
      <!-- Calendar -->
      <div class="calendar-widget bg-white bg-opacity-80 backdrop-blur-md text-gray-800 p-6 rounded-lg shadow-lg flex flex-col items-center">
        <label for="checkin-date" class="block text-lg font-semibold mb-3">Check-in Date</label>
        <input type="text" id="checkin-date" placeholder="Select Date" class="flatpickr-input">
      </div>

      <!-- Time -->
      <div class="time-widget bg-white bg-opacity-80 backdrop-blur-md text-gray-800 p-6 rounded-lg shadow-lg flex flex-col items-center">
        <label for="checkin-time" class="block text-lg font-semibold mb-3">Check-in Time</label>
        <input type="text" id="checkin-time" placeholder="Select Time" class="flatpickr-input">
      </div>

      <!-- Submit -->
      <form id="proceedForm" action="{{ route('redirect.info') }}" method="POST" class="submit-button-container bg-white bg-opacity-80 backdrop-blur-md p-6 rounded-lg shadow-lg flex flex-col items-center">
        @csrf
        <input type="hidden" name="room" id="roomInput">
        <input type="hidden" name="date" id="dateInput">
        <input type="hidden" name="time" id="timeInput">
        <button type="submit" id="submit-selection" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
          Proceed
        </button>
      </form>
    </aside>
  </main>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    // Flatpickr setup
    flatpickr("#checkin-date", { dateFormat: "Y-m-d" });
    flatpickr("#checkin-time", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "h:i K",
      time_24hr: false
    });

    // Sidebar toggle
    const burgerIcon = document.getElementById('burger-icon');
    const leftSidebar = document.getElementById('left-sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');

    function toggleSidebar() {
      const isOpen = leftSidebar.classList.contains('open');
      if (isOpen) {
        leftSidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
        sidebarOverlay.classList.add('opacity-0');
        sidebarOverlay.addEventListener('transitionend', function handler() {
          if (!leftSidebar.classList.contains('open')) {
            sidebarOverlay.classList.add('hidden');
          }
          sidebarOverlay.removeEventListener('transitionend', handler);
        });
      } else {
        leftSidebar.classList.add('open');
        sidebarOverlay.classList.remove('hidden');
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            sidebarOverlay.classList.remove('opacity-0');
            sidebarOverlay.classList.add('visible');
          });
        });
      }
    }

    burgerIcon.addEventListener('click', toggleSidebar);
    sidebarOverlay.addEventListener('click', toggleSidebar);
    document.addEventListener('click', (event) => {
      const isClickInsideSidebar = leftSidebar.contains(event.target);
      const isClickOnBurger = burgerIcon.contains(event.target);
      const isOverlayClick = sidebarOverlay.contains(event.target);
      if (!isClickInsideSidebar && !isClickOnBurger && !isOverlayClick && leftSidebar.classList.contains('open')) {
        toggleSidebar();
      }
    });

    // Room selection logic
    const roomCards = document.querySelectorAll('.room-card');
    roomCards.forEach(card => {
      card.addEventListener('click', () => {
        const isSelected = card.classList.contains('bg-blue-500');
        roomCards.forEach(c => c.classList.remove('bg-blue-500', 'text-white'));
        roomCards.forEach(c => c.classList.add('bg-gray-200', 'text-blue-800'));
        if (!isSelected) {
          card.classList.remove('bg-gray-200', 'text-blue-800');
          card.classList.add('bg-blue-500', 'text-white');
        }
      });
    });

    // Form submission with validation
    document.getElementById('submit-selection').addEventListener('click', (e) => {
      const checkinDate = document.getElementById('checkin-date').value;
      const checkinTime = document.getElementById('checkin-time').value;
      const selectedCard = document.querySelector('.room-card.bg-blue-500');

      if (!checkinDate || !checkinTime || !selectedCard) {
        e.preventDefault(); // Stop form submission
        alert("Please select a check-in date, time, and a room.");
      } else {
        // Fill in hidden inputs
        document.getElementById('roomInput').value = selectedCard.getAttribute('data-room');
        document.getElementById('dateInput').value = checkinDate;
        document.getElementById('timeInput').value = checkinTime;
      }
    });
  </script>
</body>
</html>

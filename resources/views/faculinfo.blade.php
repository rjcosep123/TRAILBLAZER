<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Faculty Information</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative h-screen w-screen font-sans bg-cover bg-center" style="background-image: url('/pics/k21.jpg');">

  <!-- Background Blur Overlay -->
  <div class="absolute inset-0 bg-white bg-opacity-80 backdrop-blur-sm z-0"></div>

  <!-- Content Wrapper -->
  <div class="relative z-10 flex flex-col items-center justify-center min-h-screen p-6">
    <div class="bg-white bg-opacity-90 backdrop-blur-md rounded-xl shadow-2xl w-full max-w-xl p-8">
      <h2 class="text-2xl font-bold text-blue-800 text-center mb-6">Faculty Information</h2>

    <form id="facultyInfoForm" action="{{ route('faculty.info.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
        
        <!-- Name -->
        <div class="flex flex-col">
          <label for="facultyName" class="mb-1 font-medium text-gray-700">Name:</label>
          <input id="facultyName" name="facultyName" type="text" placeholder="Enter your name" required
                 class="px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100">
        </div>

        <!-- Number -->
        <div class="flex flex-col">
          <label for="facultyNumber" class="mb-1 font-medium text-gray-700">Number:</label>
          <input id="facultyNumber" name="facultyNumber" type="text" placeholder="Enter your number" required
                 class="px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100">
        </div>

        <!-- Email -->
        <div class="flex flex-col">
          <label for="facultyEmail" class="mb-1 font-medium text-gray-700">Email:</label>
          <input id="facultyEmail" name="facultyEmail" type="email" placeholder="Enter your email" required
                 class="px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100">
        </div>

        <!-- ID Image 1 -->
        <div class="flex flex-col">
          <label for="idImage1" class="mb-1 font-medium text-gray-700">Upload Valid ID Image 1:</label>
          <input id="idImage1" name="idImage1" type="file" accept="image/*" required
                 class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 bg-white rounded-md">
        </div>

        <!-- ID Image 2 -->
        <div class="flex flex-col">
          <label for="idImage2" class="mb-1 font-medium text-gray-700">Upload Valid ID Image 2:</label>
          <input id="idImage2" name="idImage2" type="file" accept="image/*" required
                 class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 bg-white rounded-md">
        </div>

        <!-- Buttons -->
        <div class="flex justify-center space-x-4 mt-6">
          <!-- Back Button -->
          <a href="javascript:history.back()"
             class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 flex items-center justify-center">
            Back
          </a>

          <!-- Submit Button -->
          <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 flex items-center justify-center">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('facultyInfoForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent default form submission
      window.location.href = 'facultyroom.html'; // Redirect after submit
    });
  </script>

</body>
</html>

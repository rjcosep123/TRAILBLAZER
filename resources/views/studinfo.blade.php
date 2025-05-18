<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Information</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative h-screen w-screen font-sans bg-cover bg-center" style="background-image: url('/pics/k21.jpg');">

  <!-- Background Blur Overlay -->
  <div class="absolute inset-0 bg-white bg-opacity-80 backdrop-blur-sm z-0"></div>

  <!-- Content Wrapper -->
  <div class="relative z-10 flex flex-col items-center justify-center min-h-screen p-6">
    <div class="bg-white bg-opacity-90 backdrop-blur-md rounded-xl shadow-2xl w-full max-w-xl p-8">
      <h2 class="text-2xl font-bold text-blue-800 text-center mb-6">Student Information</h2>

      <form id="studentInfoForm" action="{{ route('student.info.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="flex flex-col">
          <label for="studentName" class="mb-1 font-medium text-gray-700">Name:</label>
          <input id="studentName" name="studentName" type="text" placeholder="Enter your name" required
                 class="px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100">
        </div>

        <!-- Student ID -->
        <div class="flex flex-col">
          <label for="studentId" class="mb-1 font-medium text-gray-700">Student ID:</label>
          <input id="studentId" name="studentId" type="text" placeholder="Enter your student ID" required
                 class="px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100">
        </div>

        <!-- Email -->
        <div class="flex flex-col">
          <label for="studentEmail" class="mb-1 font-medium text-gray-700">Email:</label>
          <input id="studentEmail" name="studentEmail" type="email" placeholder="Enter your email" required
                 class="px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100">
        </div>

        <!-- ID Image Upload -->
        <div class="flex flex-col">
          <label for="idImage" class="mb-1 font-medium text-gray-700">Upload ID Image:</label>
          <input id="idImage" name="idImage" type="file" accept="image/*" required
                 class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 bg-white rounded-md">
        </div>

        <!-- COR Image Upload -->
        <div class="flex flex-col">
          <label for="corImage" class="mb-1 font-medium text-gray-700">Upload COR Image:</label>
          <input id="corImage" name="corImage" type="file" accept="image/*" required
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

</body>
</html>

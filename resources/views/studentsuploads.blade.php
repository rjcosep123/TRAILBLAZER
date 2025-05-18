<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uploaded Student Files</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Uploaded Student Files</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($students as $student)
        <div class="bg-white p-4 rounded shadow">
            <p class="font-semibold">{{ $student->name }}</p>
            <p class="text-sm text-gray-600">{{ $student->student_id }}</p>
            <p class="text-sm text-gray-600 mb-2">{{ $student->email }}</p>

            <div>
                <p class="text-sm font-semibold">ID Image:</p>
                <img src="{{ asset('storage/' . $student->id_image) }}" alt="ID Image" class="w-full h-40 object-cover rounded">
            </div>

            <div class="mt-2">
                <p class="text-sm font-semibold">COR Image:</p>
                <img src="{{ asset('storage/' . $student->cor_image) }}" alt="COR Image" class="w-full h-40 object-cover rounded">
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>

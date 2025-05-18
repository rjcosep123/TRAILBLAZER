<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction Complete</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Show alert after 0.5s and redirect after 3s
        window.onload = function () {
            setTimeout(function () {
                alert("Transaction Complete");
            }, 500);

            setTimeout(function () {
                window.location.href = "/";
            }, 3000);
        };
    </script>
</head>
<body class="flex items-center justify-center h-screen bg-green-100">
    <div class="text-center bg-white p-8 rounded-xl shadow-xl">
        <h1 class="text-3xl font-bold text-green-700 mb-4">Transaction Complete</h1>
        <p class="text-gray-600">You will be redirected to the home page shortly.</p>
    </div>
</body>
</html>

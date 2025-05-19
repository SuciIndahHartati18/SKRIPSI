<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- @vite(['resources/css/app.css','resources/css/app.css']) -->
    @vite('resources/css/app.css')
    <!-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> -->
</head>

<body>
    {{ $slot }}
</body>

</html>
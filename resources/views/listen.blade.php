<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <title>Sample Page</title>
</head>
<body>
    <div id="app"></div>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>
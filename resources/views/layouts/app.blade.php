<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/css/lightgallery.min.css"
        integrity="sha512-e/7+n/bcByOQg6+rGt7Bx12Si0rpj4Xfe3EeS3W2RDSGGG/qT9rC7ZQCVAgaVAmZKZisvZ1DqaMd66TzfVO/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/css/lg-zoom.min.css"
        integrity="sha512-SGo05yQXwPFKXE+GtWCn7J4OZQBaQIakZSxQSqUyVWqO0TAv3gaF/Vox1FmG4IyXJWDwu/lXzXqPOnfX1va0+A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <title>Faculty Deliverables</title>
    @livewireStyles
</head>

<body class="bg-gray-100">
    @yield('content')
    @livewireScripts
    @yield('scripts')
</body>

</html>

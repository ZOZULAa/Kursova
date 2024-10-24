<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
</head>
<body class="bg-success">

    @include('inc.header')

    <div class=" position-absolute bg-white h-100 w-75" >
        <div class="ms-5">
        @yield('content')
        </div>
    </div>
</body>
</html>
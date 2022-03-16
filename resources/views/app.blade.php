<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Copist') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="manifest" href="{{ asset('manifest/manifest.json') }}" />

    {{-- Font-awesome --}}
    <script src="https://kit.fontawesome.com/cd45ba16df.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="vue">
    </div>
</body>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</html>

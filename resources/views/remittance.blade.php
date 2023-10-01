<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Remittance Calculator</title>
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
<style>
    body{
        font-family: Montserrat !important;
        font-size:13px !important;
        font-weight:normal;
        font-style: normal;
    }
</style>
    @vite('resources/css/app.css')
    @vite('resources/mdb/css/mdb.min.css')
</head>
<body class="antialiased">
<div class="container">
            <div id="app">
                <remittance-component></remittance-component>
            </div>

</div>
</body>
@vite('resources/js/app.js')
@vite('resources/mdb/js/mdb.min.js')
</html>

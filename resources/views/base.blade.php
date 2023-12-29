<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.min.css">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/Images/UY1.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.6.5/signature_pad.min.js"></script>
		
        <title>@yield('title')</title>
        @section('scripts')
        @section('styles')
        @show
    </head>
    <body>
        @include('partials._sidebar')

        <div class="container">
            @yield('content')
        </div>

        @include('partials._modalLogout')
        @include('partials._scripts')
    </body>
</html>

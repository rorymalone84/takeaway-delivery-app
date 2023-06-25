<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<x-store-navbar />

<body class="bg-gray-200 h-screen antialiased leading-none font-sans pt-40">
    <div id="app">
        <div class="">
            {{ $slot }}
        </div>
    </div>
</body>

<footer class="w-full text-center p-4 sticky bottom-0">
    <div id="message"\>
        @if (session()->has('message'))
            <x-success />
        @endif
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    //add to basket
    $(document).ready(function() {
        $(document).on("click", "#add", function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: `/addtocart/` + id,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#message').addClass(
                        "bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    );
                    $('#message').html(data).fadeIn('slow');
                    $('#message').html("Product Added").fadeIn(
                        'slow');
                    $('#message').delay(5000).fadeOut('slow');
                    $("#error").text(data);
                }
            });
        });

        //remove from basket
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var currentRow = $(this).closest('tr');
            $.ajax({
                url: `/deletefromcart/` + id,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#message').addClass(
                        "bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    );
                    $('#message').html(data).fadeIn('slow');
                    $('#message').html("Product Removed").fadeIn(
                        'slow');
                    $('#message').delay(5000).fadeOut('slow');
                    currentRow.remove();
                    $("#error").text(data);
                }
            });
        });

        //update basket quantity
        $(document).on("change", "#quantity", function(e) {
            e.preventDefault();
            var ele = $(this);
            var id = $(this).data('id');
            $.ajax({
                url: `/updatecart/` + id,
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: ele.parents("tr").find("#quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    })
</script>

</html>

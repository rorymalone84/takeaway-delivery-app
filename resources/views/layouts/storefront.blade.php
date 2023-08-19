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

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<x-store-navbar />

<section
    class="bg-fixed bg-orange-100 bg-blend-multiply object-cover bg-[url('https://i0.wp.com/chawjcreations.com/wp-content/uploads/2020/07/IMG_8011.jpg?fit=2553%2C1436&ssl=1')] dark:bg-[url('https://images.ctfassets.net/e7lf9n037kdg/DckrbzNNtzivFHBBN5M9n/a445064c86205cc7c11245e311f5c387/pic-3.jpg_resize_420_2C280__038_ssl_1')]  dark:bg-gray-800 dark:bg-blend-multiply">

    <body class="h-screen antialiased leading-none font-sans pt-24 pb-0 bg-slate-200 dark:bg-slate-700 ">
        <div id="app">
            <div class="">
                {{ $slot }}
            </div>
        </div>
        <footer class="w-full text-center p-4 sticky bottom-0">
            <div id="message"\>
                @if (session()->has('message'))
                    <x-success />
                @endif
        </footer>
    </body>
</section>

<script src="{{ asset('/js/main.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- This is here because there is a server issue with the cart update function on external js file-->
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
                    //update quantity total
                    var totalQuantity = data.totalQuantity;
                    //update data on mobile screen navbar
                    $('#totalQuantitySM').text(totalQuantity).addClass(
                        "ml-1.5 mt-1 text-gray-950"
                    );
                    $('#cartIndictorSM').addClass(
                        "relative inline-flex rounded-full h-7 w-7 bg-pink-500 dark:bg-pink-400 text-center"
                    );
                    $('#cartAnimationSM').addClass(
                        "animate-ping absolute inline-flex h-8 w-8 rounded-full bg-pink-400 opacity-75"
                    );

                    //update data on medium and higher screen navbar
                    $('#totalQuantityMD').text(totalQuantity).addClass(
                        "ml-1.5 mt-0.5 text-gray-100 dark:text-gray-950"
                    );
                    $('#cartIndictorMD').addClass(
                        "relative inline-flex rounded-full h-7 w-7 bg-pink-500 dark:bg-pink-400 text-center"
                    );
                    $('#cartAnimationMD').addClass(
                        "animate-ping absolute inline-flex h-8 w-8 rounded-full bg-pink-400 opacity-75"
                    );

                    //notification of product being added
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
                    //update quantity total
                    var totalQuantity = data.totalQuantity;
                    //update data on mobile screen navbar
                    $('#totalQuantitySM').text(totalQuantity);
                    //update data on medium and higher screen navbar
                    $('#totalQuantityMD').text(totalQuantity);

                    //notification of product being deleted
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
                    //update quantity total
                    var totalQuantity = data.totalQuantity;
                    //update data on mobile screen navbar
                    $('#totalQuantitySM').text(totalQuantity);
                    //update data on medium and higher screen navbar
                    $('#totalQuantityMD').text(totalQuantity);
                }
            });
        });
    })
</script>

</html>

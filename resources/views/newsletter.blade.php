<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <title>{{ config('app.name', 'Jobportal') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <div class="2xl:mx-auto 2xl:container mx-4 py-16">
        <div class="w-full relative flex items-center justify-center">

            <div
                class="bg-gray-800 bg-opacity-80 md:my-16 lg:py-16 py-10 w-full md:mx-24 md:px-12 px-4 flex flex-col items-center justify-center relative z-40">
                <h1 class="text-4xl font-semibold leading-9 text-white text-center">Don’t miss out!</h1>
                <p class="text-base leading-normal text-center text-white mt-6">
                    Subscribe to your newsletter to stay in the loop. Our newsletter is sent once in <br />
                    a week on every friday so subscribe to get latest news and updates.
                </p>
                <form method="post" action="{{ url('newsletter/store') }}">
                    @csrf
                    <div
                        class="sm:border border-white flex-col sm:flex-row flex items-center  w-full mt-12 space-y-4 sm:space-y-0">
                        <input name="email"
                            class="border border-white sm:border-transparent text-base  font-medium leading-none text-white p-4 focus:outline-none bg-transparent placeholder-white"
                            placeholder="Email Address" required />
                        <button type="submit" id="form_submit"
                            class="focus:outline-none focus:ring-offset-2 focus:ring border border-white sm:border-transparent w-full sm:w-auto bg-white py-4 px-6 hover:bg-opacity-75">Subscribe</button>
                    </div>

                </form>
                <div class="mt-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="mydiv">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="mydiv">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif

                </div>

            </div>

        </div>
    </div>
    
</body>

</html>


<script>
    $("#mydiv").show().delay(5000).fadeOut();
</script>

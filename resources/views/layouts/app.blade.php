<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
    alpha/css/bootstrap.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>{{ config('app.name', 'Jobportal') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">

    <!-- Scripts -->
    <script src="js/app.js" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="font-sans text-grey-900 antialiased">
        <x-botman></x-botman>
        <x-header></x-header>
        {{ $slot }}
        <div class="p-6 flex container md:w-2/3 xl:w-auto mx-auto xl:items-stretch justify-between">

            <div class="w-full xl:w-1/2 xl:py-24">
                <h1
                    class="text-2xl md:text-4xl xl:text-5xl font-bold leading-10 text-gray-800 mb-4  md:mt-0 mt-4">
                    Subscribe</h1>
                <p class="text-base leading-normal text-gray-600"> Subscribe
                    to your newsletter to stay in the loop. Our newsletter is sent once in
                    a week on every friday so subscribe to get latest news and updates.
                <form method="post" action="{{ url('newsletter/store') }}">
                    {{-- @csrf --}}
                    <div class="flex items-stretch mt-12">
                        <input name="email"
                            class="bg-gray-100 rounded-lg rounded-r-none dark:bg-gray-800 text-base
                             leading-none text-gray-800 dark:text-white p-5 w-4/5 border border-transparent focus:outline-none focus:border-gray-500"
                            type="email" placeholder="Your Email" required />
                        <button type="submit" id="form_submit"
                            class="w-32 border-white hover:bg-indigo-600 bg-indigo-700 rounded text-base
                             font-medium leading-none text-white p-5 uppercase focus:outline-none
                              focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">subscribe</button>
                    </div>
                </form>
                <div class="mt-4" id="removthis">
                    @if (session('success'))
                        <div class="flex items-center justify-center px-4 sm:px-0" id="mydiv">
                            <div role="alert" id="alert"
                                class="lg:w-10/12 transition duration-150 ease-in-out bg-yellow-100 shadow rounded-md md:flex justify-between items-center top-0 mt-12 mb-8 py-4 px-4">
                                <div class="sm:flex items-center">
                                    <div class="flex items-end">
                                        <div class="mr-2 mt-0.5 sm:mt-0 text-yellow-700">
                                            <img class="focus:outline-none"
                                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/color-coded-with-icon-success-svg1.svg"
                                                alt="warning" />
                                        </div>

                                    </div>
                                    <div class="h-1 w-1 bg-yellow-700 rounded-full mr-2 hidden xl:block"></div>
                                    <p class="text-base text-yellow-700">{{ session('success') }}</p>
                                </div>
                                <div class="flex justify-end mt-4 md:mt-0 md:pl-4 lg:pl-0">
                                    <button onclick="closeAlert()"
                                        class="focus:outline-none focus:text-white hover:text-gray-400 text-sm cursor-pointer text-gray-600"
                                        id="close">Dismiss</button>
                                </div>
                            </div>
                        </div>
                    @elseif (session('error'))
                        <div class="flex items-center justify-center px-4 sm:px-0" id="mydiv">
                            <div role="alert" id="alert"
                                class="lg:w-10/12 transition duration-150 ease-in-out bg-yellow-100 shadow rounded-md md:flex justify-between items-center top-0 mt-12 mb-8 py-4 px-4">
                                <div class="sm:flex items-center">
                                    <div class="flex items-end">
                                        <div class="mr-2 mt-0.5 sm:mt-0 text-yellow-700">
                                            <img class="focus:outline-none"
                                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/color-coded-with-icon-warning-svg1.svg"
                                                alt="warning" />
                                        </div>

                                    </div>
                                    <div class="h-1 w-1 bg-yellow-700 rounded-full mr-2 hidden xl:block"></div>
                                    <p class="text-base text-yellow-700">{{ session('error') }}</p>
                                </div>
                                <div class="flex justify-end mt-4 md:mt-0 md:pl-4 lg:pl-0">
                                    <button onclick="closeAlert()"
                                        class="focus:outline-none focus:text-white hover:text-gray-400 text-sm cursor-pointer text-gray-600"
                                        id="close">Dismiss</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
    </div>

</body>

</html>


<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif

    $("#mydiv").show().delay(30000).fadeOut();

    $("#mydiv").click(function() {
        $("#removthis").hide().delay(1000).fadeOut();
    });
</script>

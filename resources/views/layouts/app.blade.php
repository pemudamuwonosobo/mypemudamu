<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Login | My-Pemudamu</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless\global_assets\css\icons\icomoon\styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\bootstrap_limitless.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\layout.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\components.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\colors.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\global_assets\css\icons\fontawesome\styles.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\global_assets\css\extras\animate.min.css') }}" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- <style>
        .form-group {
            transition: all 0.3s ease;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
        }

        .form-group.show {
            opacity: 1;
            max-height: 1000px;
            /* Adjust according to the expected height */
        }
    </style> --}}

    <!-- /global stylesheets -->

    <!-- Core JS files -->

    <script src="{{ asset('limitless\global_assets\js\main\jquery.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\main\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\loaders\blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('limitless\global_assets\js\demo_pages\animations_css3.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\visualization\d3\d3.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\visualization\d3\d3_tooltip.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\forms\styling\switchery.min.js') }}"></script>
    {{-- <script src="{{ asset('limitless\global_assets\js\plugins\forms\selects\bootstrap_multiselect.js') }}"></script> --}}
    <script src="{{ asset('limitless\global_assets\js\plugins\ui\moment\moment.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\pickers\daterangepicker.js') }}"></script>

    <script src="{{ asset('limitless\global_assets\js\plugins\extensions\jquery_ui\interactions.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\forms\selects\select2.min.js') }}"></script>

    <script src="{{ asset('limitless\global_assets\js\plugins\forms\styling\uniform.min.js') }}"></script>

    <script src="{{ asset('limitless\global_assets\js\plugins\uploaders\fileinput\plugins\purify.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\uploaders\fileinput\plugins\sortable.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\uploaders\fileinput\fileinput.min.js') }}"></script>

    <script src="{{ asset('limitless\global_assets\js\plugins\pickers\daterangepicker.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\pickers\anytime.min.js') }}"></script>
    {{-- <script src="{{ asset('limitless\global_assets\js\plugins\pickers\picker.js') }}"></script> --}}
    {{-- <script src="{{ asset('limitless\global_assets\js\plugins\pickers\picker.date.js') }}"></script> --}}
    <script src="{{ asset('limitless\global_assets\js\plugins\pickers\legacy.js') }}"></script>
    {{-- <script src="{{ asset('limitless\global_assets\js\plugins\notifications\jgrowl.min.js') }}"></script> --}}


    <script src="{{ asset('limitless\global_assets\js\demo_pages\picker_date.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\demo_pages\uploader_bootstrap.js') }}"></script>
    <script src="{{ asset('limitless\layout_1\LTR\default\full\assets\js\app.js') }}"></script>
    {{-- <script src="{{ asset('limitless\global_assets\js\demo_pages\dashboard.js') }}"></script> --}}
    <script src="{{ asset('limitless\global_assets\js\demo_pages\form_layouts.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\demo_pages\form_inputs.js') }}"></script>
    {{-- <script src="{{ asset('limitless\global_assets\js\plugins\tables\datatables\datatables.min.js') }}"></script> --}}
    <script src="{{ asset('limitless\global_assets\js\demo_pages\datatables_basic.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\demo_pages\form_checkboxes_radios.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\demo_pages\form_select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('costume-dea\costume-dea.js') }}"></script>



</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>


</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <!-- Styles -->
    
        <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>



</head>
<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault()
                                                     document.getElementById('logout-form').submit()">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                        @csrf
                                    </form>
                                </div>
                            </li>                           
                        @endguest
                      
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}

    <div id="wrapper">
        @include('layouts.inc.sidebar')

            <div id="content-wrapper" class="d-flex flex-column">

                <div id="content">                          
                    @include('layouts.inc.navbar')

                    <div class="container-fluid">
                            @yield('content')
                    </div>

                </div>

            </div>    


    </div>    
    @include('layouts.inc.footer')
    

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function(){

            $(document).on('click','.btnedit', function(){

                var daily_id = $(this).val();

                $('#editModal').modal('show');

                $.ajax({
                    type:'GET',
                    url: "/edit-data/"+daily_id,
                    success:function(response){
                        // console.log(response);
                        $('#order').val(response.daily.order);
                        $('#date').val(response.daily.date);
                        $('#city').val(response.daily.city);
                        $('#sender').val(response.daily.sender);
                        $('#receiver').val(response.daily.receiver);
                        $('#father_name').val(response.daily.father_name);
                        $('#cnic').val(response.daily.cnic);
                        $('#amount').val(response.daily.amount);
                        $('#status').val(response.daily.status);
                        $('#user_id').val(response.daily.user_id);
                        $('#entry_date').val(response.daily.entry_date);
                        $('#daily_id').val(daily_id);
                    }
                });

            });
        });


        // $(document).ready(function(){
        //     $(document).on('click', '.savebtn', function(){
        //         var save_id = $(this).val();
        //         $('#saveModal').modal('show');

        //         $.ajax({
        //             type:"GET",
        //             url:"/save-to-paid/"+save_id,
        //             success:function(response){
        //                 // console.log(response);
        //                 $('#order').val(response.savetopaid.order);
        //                 $('#receiver').val(response.savetopaid.receiver);
        //                 $('#father_name').val(response.savetopaid.father_name);
        //                 $('#cnic').val(response.savetopaid.cnic);
        //                 $('#sender').val(response.savetopaid.sender);
        //                 $('#city').val(response.savetopaid.city);
        //                 $('#amount').val(response.savetopaid.amount);
        //                 $('#paid').val(response.savetopaid.paid);
        //                 $('#date').val(response.savetopaid.date);
        //                 $('#save_id').val(save_id);
                        // $('#order').val(response.savetopaid.order);
                        // $('#order').val(response.savetopaid.order);
                        // $('#order').val(response.savetopaid.order);
        //             }
        //         });
        //     });
        // });


    


       
     
    </script>
    @yield('scripts')
    <link rel="stylesheet" href="{{asset('admin/js/sb-admin-2.min.js')}}">
    

</body>
</html>

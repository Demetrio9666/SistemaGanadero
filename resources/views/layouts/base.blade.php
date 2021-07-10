
<html>
    <head>
        @yield('css')
        
                <link href="{{asset('css/app.css')}}">
                <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.bootstrap4.min.css')}}">
                <link rel="stylesheet" type="text/css" href="{{asset('datatables/responsive.bootstrap4.min.css')}}">
                <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
        
        
    </head>
    <body>
        @section('content_header')
            @yield('contente')
        @endsection
        @yield('js')
                <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
                <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>
                <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>
                <script src="{{asset('datatables/dataTables.responsive.min.js')}}"></script>
                <script src="{{asset('datatables/dataTables.responsive.bootstrap4.min.js')}}"></script>
                <script src="{{asset('js/dataTables.sweetalert2@11.min.js')}}"></script>


            
    </body>



</html>
        
       


        

       
        

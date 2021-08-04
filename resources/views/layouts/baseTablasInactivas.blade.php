@extends('adminlte::page')

@section('content_header')
        <div class="card card-dark">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-book-open"></i>
                @yield('nombre_card')</h3>
            </div>
            <div class="col-lg-3 col-6">
                <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href=@yield('boton_atras')><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="card">
                <div class="card-body">
                        <div class="titulo "><h1> @yield('nombre_tabla')</h1></div>
                        @yield('tabla')
                </div>
            </div>
        </div>
@endsection
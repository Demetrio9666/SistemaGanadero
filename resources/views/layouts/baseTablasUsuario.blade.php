@extends('adminlte::page')

@section('content_header')
<label>Hora:</label>
<br>
<div id="reloj" class="reloj">00 : 00 : 00</div>
<br>
<br>
        <div class="card card-dark">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-book-open"></i>
                @yield('nombre_card')</h3>
            </div>
            <div class="col-lg-3 col-6">
                    <a type="button" title="Agregar nuevo registro" class="btn btn-success " style="margin: 10px" id="button-addon1" href= @yield('boton_registro')><i class="fas fa-plus-square"></i></a>

            </div>
            <div class="card">
                <div class="card-body">
                        <div class="titulo "><h1> @yield('nombre_tabla')</h1></div>
                        @yield('tabla')
                        @yield('usuario')
                </div>
            </div>
        </div>
@endsection
@yield('js')
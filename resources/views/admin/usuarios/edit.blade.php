@extends('admin.usuarios.base')
@section('nombre_regitro')
Asignación de Roles
@endsection
@section('formulario')
        <center>
            <i class="fas fa-user-tie" style="font-size: 3em"></i><h5> {{$usuario->name}}</h5>
        </center>
        
        {!! Form::model($usuario, ['route' => ['usuarios.update',$usuario],'method'=>'put']) !!}
        
            @foreach ($roles as $role )
                <div>
                    <label >
                       
                       
                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=> 'only-one'],['id'=>'checkResumen']) !!}
                        {{$role->rol}}
                    </label>
                </div>
               
            @endforeach
           
            <center>
                <a type="button"  class="btn btn-secondary mt-2"   href="{{url('/usuarios')}}">Cancelar</a>
                {!! Form::submit('Asignación', ['class'=>'btn btn-success mt-2 ']) !!}
            </center>
            @include('layouts.base-usuario')
        {!! Form::close() !!}

        <script>
            let Checked = null;
        //The class name can vary
        for (let CheckBox of document.getElementsByClassName('only-one')){
            CheckBox.onclick = function(){
              if(Checked!=null){
              Checked.checked = false;
              Checked = CheckBox;
            }
            Checked = CheckBox;
          }
        }
        </script>
@endsection












<div class="form-group">
    {!! Form::label('name', 'Nombre del Rol:') !!}
    {!! Form::text('Nombre_del_rol', null, ['class'=>'form-control' ]) !!}
</div>


<strong><h2>Permisos</h2></strong>
@foreach ( $permiso as $i )
    <div>
        <label >
            {!! Form::checkbox('permiso[]', $i->id, null, ['class'=>'mr-1 ']) !!}
            {{$i->name}}
        </label>

    </div>
    
@endforeach

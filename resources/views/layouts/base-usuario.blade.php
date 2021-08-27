<input  type="hidden"  name="id"  value="{{auth()->user()->id}}" >
<input  type="hidden"  name="usuario"  value="{{auth()->user()->name}}">
<input  type="hidden"  name="correo"  value="{{auth()->user()->email}}">
<input  type="hidden"  name="rol"  value="{{auth()->user()->roles->pluck('rol')}}">
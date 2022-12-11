@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/empleado') }}" method="POST" enctype="multipart/form-data">
    {{--Nos imprime una llave de seguridad y con eso automaticamente larevel nos va a responder cuando le enviemos la inf al metodo store   --}}
    @csrf
    @include('empleado.form',['modo'=>'Crear'])
   
</form>
</div>
@endsection

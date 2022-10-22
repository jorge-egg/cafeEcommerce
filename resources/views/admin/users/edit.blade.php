@extends('home')

@section('content')
    
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
  <h1>Asignar un rol</h1>
  <div class="card">
    <div class="card-header">
        <p class="h5">Nombre: </p>
        <p class="form-control">{{$user->name}}</p>
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role -> id, null, ['class' => 'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
            @endforeach
            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
  </div>
@stop
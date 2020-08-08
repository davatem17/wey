@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Game Edit </h1>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('games.update',['game'=>$game->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
        

                                        <div class="form-group">
            <label for="nombre">Nombre</label>
                    <input class="form-control String"  type="text"  name="nombre" id="nombre" value="{{old('nombre',$game->nombre)}}"
                                    required="required"
                        >
                    @if($errors->has('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="genero">Genero</label>
                    <input class="form-control String"  type="text"  name="genero" id="genero" value="{{old('genero',$game->genero)}}"
                                    required="required"
                        >
                    @if($errors->has('genero'))
            <p class="text-danger">{{$errors->first('genero')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="sinopsis">Sinopsis</label>
                    <textarea class="form-control Text"  name="sinopsis" id="sinopsis" cols="30" rows="10">{{old('sinopsis',$game->sinopsis)}}</textarea>
                    @if($errors->has('sinopsis'))
            <p class="text-danger">{{$errors->first('sinopsis')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ url()->previous() }}">Back</a>
        </div>
    </form>
    </div>
        </div>

</div>
@endsection
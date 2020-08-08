@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Game Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Nombre</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$game->nombre}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Genero</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$game->genero}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Sinopsis</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$game->sinopsis}}">
        </div>
                                                                    </div>

    </div>

    <div class="card mb-4">

        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1> Games </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('games.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($games))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Nombre</td>
                
                                                <td>Genero</td>
                
                                                <td>Sinopsis</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($games as $game)
            <tr>
                <td>
                    <a href="{{route('games.show',['game'=>$game] )}}">Show</a>
                    <a href="{{route('games.edit',['game'=>$game] )}}">Edit</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-game-{{$game->id}}').submit();">
                        Delete
                    </a>
                    <form id="delete-game-{{$game->id}}" action="{{route('games.destroy',['game'=>$game])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$game->nombre}}</td>
                                                                <td>{{$game->genero}}</td>
                                                                <td>{{$game->sinopsis}}</td>
                                                                                                                                
            </tr>
            @empty
            <p>No Games</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection
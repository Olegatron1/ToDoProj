@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>{{$user->name}}</div>
            <div>{{$user->surname}}</div>
            <div>{{$user->email}}</div>
            <div>{{$user->birthdate}}</div>
            <div>{{$user->position}}</div>
            <div>
                <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <hr>
    </div>
@endsection

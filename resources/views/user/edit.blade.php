@extends('layouts.app')

@section('content')
    <div>
        <hr>
        <div>
            <form action="{{ route('users.update', $user->id) }}" method="Post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3"><label>
                        <input class="form-control" type="text" name="name"
                               placeholder="name" value="{{$user->name}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="text" name="surname"
                               placeholder="surname" value="{{$user->surname}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="email" name="email"
                               placeholder="email" value="{{$user->email}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="date" name="birthdate"
                               placeholder="birthdate" value="{{$user->name}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="text" name="position"
                               placeholder="position" value="{{$user->position}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="file" name="avatar"
                               placeholder="avatar" value="{{$user->avatar}}">
                    </label></div>

                <div class="mb-3"><input type="submit" value="Сохранить" class="btn btn-success"></div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection

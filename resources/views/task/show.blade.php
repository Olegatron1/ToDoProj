@extends('layouts.app')

@section('content')
    <div>
        <div >
            <div>{{$task->name}}</div>
            <div>{{$task->description}}</div>
            <div>{{$task->priority}}</div>
            <div>{{$task->status}}</div>
            <div>{{$task->deadline}}</div>
            <div>
                <a href="{{ route('tasks.index') }}" class="btn btn-dark">Back</a>
                <hr>
            </div>
        </div>
        <hr>
    </div>
@endsection


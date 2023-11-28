@extends('layouts.app')

@section('content')
    <div>
        <hr>
        <div>
            <form action="{{ route('tasks.store') }}" method="Post">
                @csrf
                <div class=mb-3"><label>
                        <input class="form-control" type="text" name="user_id"
                               placeholder="userId">
                    </label></div>
                <div class=mb-3"><label>
                        <input class="form-control" type="text" name="name"
                               placeholder="name">
                    </label></div>
                <div class=mb-3"><label>
                        <input  class="form-control" type="text" name="description"
                                placeholder="description">
                    </label></div>
                <div class=mb-3"><label>
                        <input  class="form-control" type="text" name="priority"
                                placeholder="priority">
                    </label></div>
                <div class=mb-3"><label>
                        <input  class="form-control" type="text" name="status"
                                placeholder="status">
                    </label></div>
                <div class=mb-3"><label>
                        <input  class="form-control" type="date" name="deadline"
                                placeholder="deadline">
                    </label></div>

                <div class=mb-3"><input type="submit" value="Добавить" class="btn btn-danger"></div>
            </form>
        </div>
    </div>
@endsection


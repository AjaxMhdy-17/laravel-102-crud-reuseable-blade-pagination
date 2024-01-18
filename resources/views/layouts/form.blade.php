@extends('layouts.app')

@section('title', isset($id) ? 'Edit Task' : 'Add A Task')


@section('styles')
<style>
    .error__message {
        background: red;
        color: white;
    }
</style>
@endsection


@section('content')

<form method="POST" action="{{ isset($id)? route('task.update',['id' => $task->id]) : route('tasks.store')}}">
    @csrf
    @isset($id)
        @method('PUT')
    @endisset
    <div>
        {{$errors}}
    </div>

    <div>
        @error('title')
        <p class="error__message">{{$message}}</p>
        @enderror
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{$task->title ?? old('title')}}" />
    </div>
    <div>
        @error('description')
        <p class="error__message">{{$message}}</p>
        @enderror
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5">
        {{$task->description ?? old('description')}}
        </textarea>
    </div>
    <div>
        @error('long_description')
        <p class="error__message">{{$message}}</p>
        @enderror
        <label for="long_description">Long Description</label>
        <textarea id="long_description" name="long_description" rows="10">
        {{$task->long_description ?? old('long_description')}}
        </textarea>
    </div>
    <div>
        <button type="submit">
            @isset($id)
                Edit Task
            @endisset
                Add Task
        </button>
    </div>
</form>

@endsection
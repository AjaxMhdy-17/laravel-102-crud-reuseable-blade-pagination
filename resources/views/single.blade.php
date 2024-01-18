<!-- inherite app template -->

@extends('layouts.app')

<!-- setting title  -->
@section('title',$task->title)


<!-- setting content  -->
@section('content')

<h3 class="my-5">
    <form action="{{route('tasks.index')}}" method="get">
        <button type="submit">
            go to home page
        </button>
    </form>
</h3>

<h1>
    {{$task->title}}
</h1>
<p>
    {{$task->description}}
</p>

@if($task->long_description)
<div>{{$task->long_description}}</div>
@endif

<p>
    created at {{$task->created_at}}
</p>

<p>
    created at {{$task->updated_at}}
</p>
<div>

    <form action="{{route('tasks.edit',['id' => $task->id])}}" method="get">
        <button type="submit">Edit</button>
    </form>

    <form action="{{route('task.destroy',['task' => $task->id])}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection
<!-- end of content section  -->
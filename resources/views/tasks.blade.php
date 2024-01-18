@extends('layouts.app')


@section('title' , "This is Tasks List")

@section('content')
<div class="px-8 py-16">
    <h1 class="text-red-900">
        hey this is tasks
    </h1>
    <div>
        @if(count($tasks) > 0)
        <div>there is tasks</div>
        @foreach($tasks as $task)
        <div>{{$task->id}}</div>
        <div>
            <a href="{{route('tasks.show',['id' => $task->id])}}">
                {{$task->title}}
            </a>
        </div>
        <div>{{$task->description}}</div>
        @endforeach
        @else
        <div>Tasks is empty</div>
        @endif

        @if($tasks->count())
            {{$tasks->links()}}
        @endif 

    </div>
</div>
@endsection

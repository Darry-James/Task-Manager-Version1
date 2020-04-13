@extends('layout.app')


@section('title')

Todos List

@endsection

@section('content')



<h1 class="text-center my-5">Todos</h1> 

<div class="row justify-content-center">
<div class="col -md-8">



<div class="card card-default">

<div class="card-header">


<ul class="list-group">

@foreach ($showtodo as $todo)

<li class="list-group-item">

{{$todo->name}}


@if(!$todo->completed)

<a href="/todos/{{$todo->id}}/complete" style="color:white;" class="btn btn-warning btn-sm float-right">Mark this as complete </a>

@else
<span style="color:white;" class="btn btn-success btn-sm float-right">Great! Todo Completed </span>

@endif

<a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right mr-2">View </a>



</li>
@endforeach

</ul>
</div>
</div>
</div>
</div>




@endsection
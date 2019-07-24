@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
        <div class="col-sm-8">

                @if (count($tasks) > 0)
                        @include('tasks.tasks', ['tasks' => $tasks])
                @else
                        {!! Form::model($tasks, ["route" => "tasks.store"]) !!}
                
                    <div class="form-group">
                        {!! Form::label("content", "タスク：") !!}
                        {!! Form::text("content", null, ["class" => "form-control"]) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label("status", "ステータス：") !!}
                        {!! Form::text("status", null, ["class" => "form-control"]) !!}
                    </div>
                    
                    {!! Form::submit("追加", ["class" => "btn btn-primary"]) !!}
                    
                {!! Form::close() !!}
                
                @endif

        </div>
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to Tasklist</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection
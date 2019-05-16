@extends('layouts.apptask')

@section('content')

    <h1>{{ $task->date }}のタスク編集</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ["route" => ["tasks.update", $task->id], "method" => "put"]) !!}
            
                <div class="form-group">
                    {!! Form::label("date", "日付") !!}
                    {!! Form::text("date", null, ["class" => "form-control"]) !!}
                    {!! Form::label("content", "内容") !!}
                    {!! Form::text("content", null, ["class" => "form-control"]) !!}
                    {!! Form::label("status", "状態") !!}
                    {!! Form::text("status", null, ["class" => "form-control"]) !!}
                </div>
                
                {!! Form::submit("更新", ["class" => "btn btn-light"]) !!}
            
            {!! Form::close() !!}
            
        </div>
    </div>

@endsection
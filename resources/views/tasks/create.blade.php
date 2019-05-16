@extends('layouts.apptask')

@section('content')
        
    <div class="row">
        <div class="col-6">    
            {!! Form::model($task, ["route" => "tasks.store"]) !!}
            
                <div class="form-group">
                    {!! Form::label("date", "日時") !!}
                    {!! Form::text("date", null, ["class" => "form-control"]) !!}
                    {!! Form::label("content", "内容") !!}
                    {!! Form::text("content", null, ["class" => "form-control"]) !!}
                    {!! Form::label("status", "状態") !!}
                    {!! Form::text("status", null, ["class" => "form-control"]) !!}
                </div>
        
                {!! Form::submit("投稿", ["class" => "btn btn-primary"]) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection
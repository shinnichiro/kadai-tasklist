@extends('layouts.app')

@section('content')

    <h1>{{ $task->date }}のタスク詳細</h1>
    
    <table class="table">
        <tr>
            <th>日付</th>
            <td>{{ $task->date }}</td>
        </tr>
        <tr>
            <th>内容</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    
    {!! link_to_route("tasks.edit", "編集する", ["id" => $task->id], ["class" => "btn btn-light"]) !!}
    
    {!! Form::model($task, ["route" => ["tasks.destroy", $task->id], "method" => "delete"]) !!}
        {!! Form::submit("削除", ["class" => "btn btn-danger"]) !!}
    {!! Form::close() !!}

@endsection
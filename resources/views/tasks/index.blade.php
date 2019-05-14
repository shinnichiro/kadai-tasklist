@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
    
    @if (count($tasks) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>内容</th>
                    <th>状態</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{!! link_to_route("tasks.show", $task->date, ["id" => $task->id]) !!}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {!! link_to_route("tasks.create", "タスクの追加", null, ["class" => "btn btn-primary"]) !!}

@endsection
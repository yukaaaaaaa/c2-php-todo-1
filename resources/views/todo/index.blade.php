@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2 class="text-muted py-3 float-left">やること一覧</h2>
            <div class="float-right my-3">
                <a href="/todo/create/" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>新規作成</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>タイトル</th>
                    <th>期限</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($todo_list as $todo)
                    <tr>
                        <td>
                            <a href="/todo/{{ $todo->id }}">
                                {{ $todo->title }}
                            </a>
                        </td>
                        <td>{{ $todo->due_date }}</td>
                        <td>{{ $todo->status }}</td>
                        <td>
                            <a href="/todo/{{ $todo->id }}/edit" class="btn btn-success"><i class="fas fa-edit mr-2"></i>編集</a>
                        </td>
                        <td>
                        <form action="/todo/{{ $todo->id }}edit"method="POST">
                        @method('DELETE')
                        @csrf
                            <button class="btn btn-danger" type="submit">
                            <i class="fas fa-trash-alt mr-2"></i>削除</a>
                            </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $todo_list->links() }}
        </div>
    </div>
@endsection
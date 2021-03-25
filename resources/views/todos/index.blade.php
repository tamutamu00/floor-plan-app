@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                一覧画面
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <a href="{{ route('floors.todos.create', ['floor' => $floor_id]) }}" class="btn btn-success mb-3">登録</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>content</th>
                            <th>description</th>
                            {{-- <th>user_id</th> --}}
                            <th>floor_id（間取り）</th>
                            <th>expired_at（期限）</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->content }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>{{ $todo->floor->name }}</td> 

                            {{-- <td>{{ $todo->user_id }}</td> --}}
                            {{-- <td>{{ $todo->floor_id }}</td> --}}
                            <td>{{ $todo->expired_at }}</td>
                            {{-- <td><a href="{{ url('todos/' . $todo->id) }}" class="btn btn-info">詳細</a></td> --}}
                            <td><a href="{{ route('floors.todos.edit', ['floor' => $floor_id, 'todo' => $todo]) }}" class="btn btn-primary">編集</a></td>
                            <td>
                                <form method="POST" action="
                                {{ route('floors.todos.destroy', ['floor' => $floor_id, 'todo' => $todo]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">削除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

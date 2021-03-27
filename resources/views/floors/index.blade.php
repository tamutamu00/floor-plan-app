@extends("layouts.app")
@section('content')
<div class="row">
    <div class="col">
        <p>floor面</p>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                一覧表示
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <a href="{{ url('floors/create') }}" class="btn btn-success mb-3">登録</a>
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>id</th> --}}
                            <th>場所</th>
                            {{-- <th>user_id</th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($floors as $floor)
                        <tr>
                            @csrf
                            {{-- <td>{{ $floor->id }}</td> --}}
                            <td>{{ $floor->name }}</td>
                            {{-- <td>{{ $floor->user_id }}</td> --}}
                            <td><a href="{{ route('floors.todos.index',['floor' => $floor->id]) }}" class="btn btn-info">タスク</a></td>
                            <td><a href="{{ url('floors/' . $floor->id . '/edit') }}" class="btn btn-primary">編集</a></td>

                            <td>
                                <form method="POST" action="/floors/{{ $floor->id }}">
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

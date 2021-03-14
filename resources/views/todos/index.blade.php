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
                <a href="{{ url('todos/create') }}" class="btn btn-success mb-3">登録</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>content</th>
                            <th>description</th>
                            <th>user_id</th>
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
                            <td>{{ $todo->user_id }}</td>
                            <td>{{ $todo->floor_id }}</td>
                            <td>{{ $todo->expired_at }}</td>
                            <td><a href="{{ url('todos/' . $todo->id) }}" class="btn btn-info">詳細</a></td>
                            <td><a href="{{ url('todos/' . $todo->id . '/edit') }}" class="btn btn-primary">編集</a></td>
                            <td>
                                <form method="POST" action="/todos/{{ $todo->id }}">
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


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                登録画面
            </div>
            <div class="card-body">
                <form method="POST" action="/todos">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="control-label">content</label>
                        <input class="form-control" name="content" type="text">

                        <label for="title" class="control-label">description</label>
                        <input class="form-control" name="description" type="text">

                        <label for="title" class="control-label">user_id</label>
                        <input class="form-control" name="user_id" type="text">

                        <label for="title" class="control-label">floor_id</label>
                        <div>
                            {{-- {{Form::select('name', $floors)}} --}}
                            <select name="floor_id" id="">
                                <option value="" selected="selected" disabled >選択してください</option>
                                @foreach ($floors as $floor)
                                    <option value="{{$floor->name}}">{{$floor->name}}</option>
                                @endforeach
                            </select>　
                        </div>
                        // {{-- <div class="dropdown">
                        //     <select name="se1" id="#">
                        //         <option value=""></option>
                        //     </select>
                        // </div> --}}
                        {{-- <input class="form-control" name="floor_id" type="text"> --}}

                        <label for="title" class="control-label">expired_at</label>
                        <input class="form-control" name="expired_at" type="date">

                    </div>
                    <button class="btn btn-primary" type="submit">登録</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                編集画面
            </div>
            <div class="card-body">
                <form method="POST" action="/floors/{{ $floor->id }}" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id" class="control-label">ID</label>
                        <div>{{ $floor ->id }}</div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="title" class="control-label">場所</label>
                        <input class="form-control" name="name" type="text" value="{{ $floor->name }}">
                    </div>
                    <hr>
                    <button class="btn btn-primary" type="submit">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

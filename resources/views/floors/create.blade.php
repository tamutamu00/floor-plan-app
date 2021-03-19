@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                登録画面
            </div>
            <div class="card-body">
                <form method="POST" action="/floors">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label">場所</label>
                        <input class="form-control" name="name" type="text">

                        
                    </div>
                    <button class="btn btn-primary" type="submit">登録</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends("layouts.app")
@section("content")
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

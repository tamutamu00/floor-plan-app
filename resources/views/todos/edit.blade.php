@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                編集画面
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('floors.todos.update', ['floor' => $floor_id, 'todo' => $todo]) }}" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id" class="control-label">ID</label>
                        <div>{{ $todo->id }}</div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="title" class="control-label">content</label>
                        <input class="form-control" name="content" type="text" value="{{ $todo->content }}">

                        <label for="title" class="control-label">description</label>
                        <input class="form-control" name="description" type="text" value="{{ $todo->description }}">

                        {{-- <label for="title" class="control-label">floor_id(間取り）</label> --}}


                        {{-- <div>
                            <select name="floor_id" id="">
                                @foreach ($floors as $floor)
                                    @if($todo->floor_id == $floor->name))
                                    <option value="{{ $floor->name}}" selected>{{$floor->name}}</option>
                                    @else
                                    <option value="{{$floor->name}}">{{$floor->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <input class="form-control" name="floor_id" type="text" value="{{ $todo->floor_id }}"> --}}

                        <label for="title" class="control-label">expired_at(
                            期限）
                        </label>
                        <input class="form-control" name="expired_at" type="date" value="
                        {{ $todo->expired_at }}">

                    </div>
                    <hr>
                    <button class="btn btn-primary" type="submit">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

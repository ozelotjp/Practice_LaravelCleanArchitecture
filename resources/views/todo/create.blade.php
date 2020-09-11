@extends("layouts.app")

@section("content")
    <nav class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("todo.index") }}">Todo</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
    <h1 class="mt-3">Create</h1>
    <form action="{{ route("todo.store") }}" method="post">
        @csrf
        <div class="mt-3">
            <label class="form-label">
                Text:
                <input class="form-control" type="text" name="text" value="">
            </label>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Todoを追加</button>
        </div>
    </form>
@endsection

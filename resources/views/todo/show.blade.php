@extends("layouts.app")

@php /** @var \Package\Presenters\ViewModel\TodoViewModel $todo */ @endphp

@section("content")
    <nav class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("todo.index") }}">Todo</a></li>
            <li class="breadcrumb-item active">#{{ $todo->id }}</li>
        </ol>
    </nav>
    <h1 class="mt-3">{{ $todo->text }}</h1>
    <div class="mt-3">
        <label class="form-label">
            ID:
            <input type="text" class="form-control-plaintext" value="{{ $todo->id }}" readonly>
        </label>
        <label class="form-label">
            Text:
            <input type="text" class="form-control-plaintext" value="{{ $todo->text }}" readonly>
        </label>
        <label class="form-label">
            Done at:
            <input type="text" class="form-control-plaintext" value="{{ $todo->doneAt !== null ? $todo->doneAt->format("Y/m/d H:i:s") : "NULL" }}" readonly>
        </label>
        <label class="form-label">
            Created at:
            <input type="text" class="form-control-plaintext" value="{{ $todo->createdAt->format("Y/m/d H:i:s") }}" readonly>
        </label>
        <label class="form-label">
            Updated at:
            <input type="text" class="form-control-plaintext" value="{{ $todo->updatedAt->format("Y/m/d H:i:s") }}" readonly>
        </label>
    </div>
    <div class="mt-3">
        <form method="post" action="{{ route("todo.toggleDone", ["id" => $todo->id]) }}">
            @csrf
            @method("PUT")
            @if($todo->doneAt === null)
                <button type="submit" class="btn btn-primary">Todoを完了済にする</button>
            @else
                <button type="submit" class="btn btn-secondary">Todoを未完了にする</button>
            @endif
        </form>
    </div>
@endsection

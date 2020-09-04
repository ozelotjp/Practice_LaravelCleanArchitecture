@extends("layouts.app")

@php /** @var \Package\Adapters\Models\Todo\TodoViewModel[] $todos */ @endphp

@section("content")
    <nav class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Todo</li>
        </ol>
    </nav>
    <div class="list-group">
        @foreach($todos as $todo)
            <a href="{{ route("todo.show", ["id" => $todo->id]) }}" class="list-group-item list-group-item-action">
                {{ $todo->done_at === null ? "⬜" : "✅" }}
                {{ $todo->text }}
            </a>
        @endforeach
    </div>
@endsection

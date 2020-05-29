@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <textarea rows="5" cols="50" name="content">{{ $comment->content }}</textarea>
                    <input class="btn btn-primary" type="submit">
                </form>
            </div>
        </div>
    </div>
@endsection

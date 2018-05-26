@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<h2>Comments</h2>--}}
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <img src="img\content\comments.jpg" class="rounded" width="100%">
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-light"><b>Leave your comment about us:</b></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('comments') }}">
                            <div class="form-group">
                                <label for="name">Your name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                       placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail:</label>
                                <input type="email" class="form-control" id="email" value="{{ old('email') }}"
                                       name="email"
                                       placeholder="Enter your E-Mail">
                            </div>
                            <div class="form-group">
                                <label for="text">Comment (Max length is 128 characters):</label>
                                <textarea class="form-control" id="text" name="comment"
                                          rows="3" maxlength="128">{{ old('comment') }}</textarea>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Send</button>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="pagination justify-content-center mt-3">
                            {!! $comments->links() !!}
                        </ul>

                        @forelse ($comments as $comment)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h4 class="card-title text-info">Name: {{ $comment->name }}</h4>
                                    <p class="card-text">{{ $comment->comment }}</p>
                                    <p class="card-text text-info">Date: {{ $comment->updated_at }}</p>
                                </div>
                            </div>
                        @empty
                            <hr>
                            <h3>No comments yet!</h3>
                        @endforelse

                        <ul class="pagination justify-content-center mt-3">
                            {!! $comments->links() !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection
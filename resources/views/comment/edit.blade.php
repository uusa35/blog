@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @auth
                <div class="col-lg-12">
                    <div class="card">
                        <h5 class="card-header">{{ __('general.comment') }}</h5>
                        <div class="card-body">
                            <form action="{{ route('comment.update', $element->id) }}" role="form" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('general.write_content_here') }}</label>
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="post_id" value="{{ $element->post_id }}"/>
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}"/>
                                    <input type="text" class="form-control" name="content"
                                           value="{{ $element->content }}"/>
                                    <small id="emailHelp" class="form-text text-muted">Please Add your comment.
                                    </small>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('general.submit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
@endsection

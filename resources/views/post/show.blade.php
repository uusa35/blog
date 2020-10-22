@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3" style="width: 80rem;">
                <img src="{{ $element->image }}" class="card-img-top" alt="{{ $element->title }}"
                     style="max-height: 500px">
                <div class="card-body">
                    <h5 class="card-title">
                        <img src="https://ui-avatars.com/api/name={{ $element->user->name }}&background=0D8ABC&color=fff"
                             alt="">
                        {{ $element->title }}</h5>
                    <div class="card-text row">
                        <div class="col-3 text-left">
                            <small class="text-muted">{{ __('general.posted_by') .' : ' .str_limit($element->user->name,'50') }}</small>
                        </div>
                        <div class="col-3 text-left">
                            <small class="text-muted">{{ $element->created_at->format('Y-m-d h:i A') }}</small>
                        </div>
                        <div class="col-6 text-right">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                <path fill-rule="evenodd"
                                      d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                            <small class="text-muted">{{ $element->viewsCount }}</small>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text text-justify">{{ $element->content }}</p>

                </div>
            </div>
            @if($element->comments->isNotEmpty())
                @foreach($element->comments as $comment)
                    <div class="card mb-3 col-lg-12">
                        <div class="card-body">
                            <h5 class="card-title">
                                <img src="https://ui-avatars.com/api/name={{ $comment->user->name }}&background=0D8ABC&color=fff"
                                     alt=""/>
                                {{ $comment->content }}
                            </h5>
                            <p class="card-text  text-right">
                                <small class="text-muted">{{ $element->created_at->format('Y-m-d h:iA') }}</small>
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
            @auth
                <div class="col-lg-12">
                    <div class="card">
                        <h5 class="card-header">{{ __('general.comment') }}</h5>
                        <div class="card-body">
                            <form action="{{ route('comment.store') }}" role="form" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('general.write_content_here') }}</label>
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $element->id }}"/>
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}"/>
                                    <input type="text" class="form-control" name="content"/>
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row mb-2">
                <div class="col-md-12">
                    @if(isset($elements) && $elements->isNotEmpty())
                        @foreach($elements as $element)
                            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h3 class="mb-0">
                                        {{ str_limit($element->title,60,'..') }}
                                    </h3>
                                    <div class="row border-bottom mb-3">
                                        <div class="col-6 mb-1 text-muted text-left">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-alarm-fill"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                                            </svg>
                                            {{ $element->created_at->format('Y-m-d h:i A') }}</div>
                                        <div class="col-6 mb-1 text-muted text-right">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye"
                                                 fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                                <path fill-rule="evenodd"
                                                      d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                            {{ $element->viewsCount }}</div>
                                    </div>
                                    <p class="card-text mb-auto">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-text-left"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                        {{ str_limit($element->content,250,'...') }}</p>
                                    <a href="{{ route('post.show', $element->id) }}"
                                       class="stretched-link">{{ __('general.continue_reading') }}</a>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="{{ $element->image }}" class="img-thumbnail"/>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            {{ $elements->render() }}
                        </div>
                    @else
                        <div class="jumbotron p-4 p-md-5 text-white rounded bg-danger">
                            <div class="col-md-6 px-0">
                                <h1 class="display-4 font-italic">{{ __('general.no_posts') }}</h1>
                                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers
                                    quickly and efficiently about what’s most interesting in this post’s contents.</p>
                                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue
                                        reading...</a></p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

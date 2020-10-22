@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center row">
                <div class="col-lg-6 text-center mb-5">
                    <a class="btn btn-info" href="{{ route('dashboard') }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-dots text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        <h6 class="text-light">{{ __('general.posts') }}</h6></a>
                </div>
                <div class="col-lg-6 text-center mb-5">
                    <a class="btn btn-info" href="{{ route('comment.index') }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-dots text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        <h6 class="text-light">{{ __('general.comments') }}</h6></a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12">
                    @if(isset($elements) && $elements->isNotEmpty())
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('general.title') }}</th>
                                <th scope="col">{{ __('general.content') }}</th>
                                <th scope="col">{{ __('general.image') }}</th>
                                <th scope="col">{{ __('general.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($elements as $element)
                                <tr>
                                    <th scope="row">{{ $element->id }}</th>
                                    <td>{{ str_limit($element->title,25) }}</td>
                                    <td>{{ str_limit($element->content,120,'...') }}</td>
                                    <td><img src="{{ $element->image }}" class="img-responsive" style="width: 50px;"/>
                                    </td>
                                    <td>
                                        <a href="{{ route('post.show', $element->id) }}">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $elements->render() }}
                    @else
                        <div class="jumbotron p-4 p-md-5 text-white rounded bg-danger">
                            <div class="col-md-6 px-0">
                                <h1 class="display-4 font-italic">{{ __('general.no_posts') }}</h1>
                                <p class="lead my-3">No Posts can be displayed for now.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

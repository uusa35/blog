@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('nav_backend')
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
                                <th scope="col" class="text-center"><small class="text-center">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </small>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($elements as $element)
                                <tr>
                                    <th scope="row">{{ $element->id }}</th>
                                    <td><a href="{{ route('post.show', $element->id) }}">{{ str_limit($element->title,25) }}</a></td>
                                    <td>{{ str_limit($element->content,120,'...') }}</td>
                                    <td><img src="{{ $element->image }}" class="img-responsive" style="width: 50px;"/>
                                    </td>
                                    <td>{{ $element->viewsCount }} </td>
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

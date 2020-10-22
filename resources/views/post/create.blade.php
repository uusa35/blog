@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="d-flex flex-column" style="width: 100rem">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <form class="horizontal-form " role="form" method="POST"
                              action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('general.title') }}</label>
                                <input type="text" name="title" class="form-control col-12"
                                       placeholder="{{ __('general.title') }}" required>
                                <small id="emailHelp" class="form-text text-muted">{{ __('general.title') }}</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">{{ __('general.post_image') }}</label>
                                <input type="file" class="form-control-file" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ __('general.content') }}</label>
                                <textarea class="form-control" name="content" rows="3" required></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-12" style="width: 100%">
            @if(session()->has('error'))
                <div class="card bg-danger">
                    <div class="card-body">
                        <h5 class="card-title align-content-center text-light">
                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                 class="text-light bi bi-exclamation-diamond"
                                 fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            {{ __('general.sys_message') }}</h5>
                        <p class="card-text text-light">
                        @if(is_array(session('error')))
                            @foreach (session('error') as $m)
                                <h3 class="text-align">{{ $m }}</h3>
                            @endforeach
                        @else
                            <h6 class="text-light">{{ session('error') }}</h6>
                            @endif
                            </p>
                    </div>
                </div>
            @elseif(session()->has('success'))
                <div class="card bg-success">
                    <div class="card-body">
                        <h5 class="card-title align-content-center text-light">
                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                 class="text-light bi bi-exclamation-diamond"
                                 fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            {{ __('general.sys_message') }}</h5>
                        <p class="card-text text-light">
                        @if(is_array(session('success')))
                            @foreach (session('success') as $m)
                                <h3 class="text-align">{{ $m }}</h3>
                            @endforeach
                        @else
                            <h6 class="text-light">{{ session('success') }}</h6>
                            @endif
                            </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

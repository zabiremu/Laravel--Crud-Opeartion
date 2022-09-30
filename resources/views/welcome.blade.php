@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">

            @forelse ($post as $post)
                @if ($post->status == true)
                    <div class="col-lg-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('post.details', $post->slug) }}">
                                    {{ $post->titles }} <span
                                        class="text-white badge bg-primary float-end">{{ $post->view }}
                                    </span>
                                </a>
                            </div>
                            <div class="card-body">
                                {{ $post->details }} <span class="text-white badge bg-primary float-end">{{ $post->view }}
                            </div>
                            <div class="card-footer">
                                {{ $post->user }} <span class="text-white badge bg-primary float-end">{{ $post->view }}
                            </div>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
    </div>
@endsection

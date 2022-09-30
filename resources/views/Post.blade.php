@extends('layouts.app')


@section('content')
        <div class="card col-lg-8 mx-auto">
            <div class="card-header">
                {{ $post->titles }}<span
                class="text-white badge bg-primary float-end">{{ $post->view }}
            </span>
            </div>
            <div class="card-body">
                {{ $post->details }}
            </div>
            <div class="card-header">
                {{ $post->user }}
            </div>
        </div>
@endsection
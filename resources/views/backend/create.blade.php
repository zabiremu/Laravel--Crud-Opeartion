@extends('layouts.app')

@section('content')
    <card class="card col-lg-5 mx-auto mt-5">
        <div class="card-header mt-3">
            <h4>Create Post</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <input type="text" name="title" class="form-control my-2" placeholder="Enter title" value="{{ old('title') }}">
                @error('title')
                    <span class="text-danger d-block my-2">{{ $message }}</span> 
                @enderror
                <textarea name="detail" placeholder="Enter Detail" class="form-control my-2" cols="30" rows="10">{{ old('detail')}}</textarea>
                @error('detail')
                    <span class="text-danger d-block my-2">{{ $message }}</span> 
                @enderror
                <button name="submit" class="btn btn-primary mb-2">Create Post</button>
            </form>
        </div>
    </card>
@endsection
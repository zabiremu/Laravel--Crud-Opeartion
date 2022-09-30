@extends('layouts.app')
@section('content')
    <div class="card col-lg-8 mx-auto mt-5">
        <table class="table table-responsive">
            <tr class="bg-primary text-white">
                <td>#</td>
                <td>Titles</td>
                <td>Details</td>
                <td>User</td>
                <td>View</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
            @forelse ($posts as $key => $post)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $post->titles }}</td>
                    <td>{{ Str::limit($post->details, 50, '...') }}</td>
                    <td>{{ $post->user }}</td>
                    <td>{{ $post->view }}</td>
                    <td><span
                            class="badge btn btn-sm {{ $post->status == 1 ? 'bg-success' : 'bg-danger' }}">{{ $post->status == 1 ? 'Active' : 'Deactive' }}</span>
                    </td>
                    <td>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('post.status', $post->id) }}" class="btn btn-info btn-sm text-white">Status</a>
                        <button type="submit" class="btn btn-danger btn-sm button">Danger</button>
                        <form action="{{ route('post.destroy', $post->id) }}" method="Post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        No Post here
                    </td>
                </tr>
            @endforelse
        </table>
    </div>

    @push('customJs')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            let button = $('.button')
            button.click(function() {
                let form = $(this).next('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        form.submit();
                    }
                })
            })
        </script>
    @endpush
@endsection

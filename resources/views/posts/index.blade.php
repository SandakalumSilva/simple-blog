<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3.0.0/notyf.min.css">

</head>
<body>

<div class="container mt-4">

    <h1>Blog Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>


    <div class="list-group">
        @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post->id) }}" class="list-group-item list-group-item-action">
                <h5>{{ $post->title }}</h5>
                <p>{{ Str::limit($post->body, 150) }}</p>
            </a>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3.0.0/notyf.min.js"></script>

@if(session()->has('flasher_notification'))
    <script>
        window.onload = function() {
            let notification = @json(session('flasher_notification'));
            const notyf = new Notyf();
            notyf[notification.type](notification.message);
        };
    </script>
@endif


</body>
</html>

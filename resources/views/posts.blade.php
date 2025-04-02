

    <div class="container">
        <h1>Berichten</h1>

        @if($posts->count() > 0)
            <div class="posts-container">
                @foreach($posts as $post)
                    <div class="post-card">
                        <h2>{{ $post->title }}</h2>
                        <div class="post-content">
                            <p>{{ Str::limit($post->body, 150) }}</p>
                        </div>
                        <div class="post-meta">
                        </div>
                        <a href="" class="btn btn-primary">Lees meer</a>
                    </div>
                @endforeach
            </div>

            {{ $posts->links() }}
        @else
            <p>Er zijn geen berichten beschikbaar.</p>
        @endif
    </div>

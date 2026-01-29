<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All Blog Posts - Art.Design</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('blog.css') }}">
</head>

<body>

  <header>
    <nav class="navbar">
      <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">Art.Design</a>
        <div class="navbar-nav">
          <a href="{{ url('/') }}">Home</a>
          <a href="{{ url('/blog') }}">Blog</a>
          <a href="{{ url('admin') }}">Admin</a>
          <a href="{{ url('user') }}">User Login</a>
          <a href="{{ url('manager') }}">Manager</a>
        </div>
      </div>
    </nav>
    <div class="banner">
      <div class="container">
        <h1 class="banner-title"><span>All</span> Blog Posts</h1>
        <p>Dynamic posts from our community</p>
      </div>
    </div>
  </header>

  <section class="blog" id="blog">
    <div class="container">
      <div class="title">
        <h2>Latest Blog</h2>
        <p>{{ $posts->total() }} post(s) total</p>
      </div>
      <div class="blog-content">
        @forelse($posts as $post)
        <div class="blog-item">
          <div class="blog-img">
            @if(!empty($post->file))
            @if(pathinfo($post->file, PATHINFO_EXTENSION) == 'mp4')
            <video src="{{ asset('uploads/' . $post->file) }}" style="width:100%;height:220px;object-fit:cover;" muted></video>
            @else
            <img src="{{ asset('uploads/' . $post->file) }}" alt="{{ $post->title }}">
            @endif
            @else
            <img src="{{ asset('blogs/blog-p-1.jpg') }}" alt="{{ $post->title }}">
            @endif
            <span><i class="far fa-heart"></i></span>
          </div>
          <div class="blog-text">
            <span>{{ $post->created_at ? $post->created_at->format('d F, Y') : '' }} @if($post->author_name) · {{ $post->author_name }} @endif</span>
            <h2>{{ Str::limit($post->title, 50) }}</h2>
            <p>{{ Str::limit($post->description, 120) }}</p>
            <a href="{{ route('blog.show', $post->id) }}">Read More</a>
          </div>
        </div>
        @empty
        <div class="blog-item" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
          <p>No blog posts yet. Posts will appear here when users add events.</p>
          <a href="{{ url('/') }}">Back to Home</a>
        </div>
        @endforelse
      </div>
      @if($posts->hasPages())
      <div class="pagination-wrap" style="margin-top: 2rem; text-align: center;">
        {{ $posts->links('pagination::bootstrap-4') }}
      </div>
      @endif
    </div>
  </section>

  <footer>
    <div class="social-links">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-pinterest"></i></a>
    </div>
    <span>Art.Design Blog</span>
  </footer>

</body>

</html>
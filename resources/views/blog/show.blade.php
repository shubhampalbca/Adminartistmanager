<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $post->title }} - Art.Design Blog</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('blog.css') }}">
  <style>
    .single-post {
      max-width: 900px;
      margin: 0 auto 3rem;
    }

    .single-post .blog-img {
      margin-bottom: 1.5rem;
      border-radius: 8px;
      overflow: hidden;
    }

    .single-post .blog-text h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .single-post .blog-text p {
      font-size: 1.1rem;
      line-height: 1.8;
      margin-bottom: 1rem;
    }

    .single-post .meta {
      color: #666;
      margin-bottom: 1rem;
    }

    .related-title {
      margin: 2rem 0 1rem;
      font-size: 1.5rem;
    }
  </style>
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
        <h1 class="banner-title"><span>{{ Str::limit($post->title, 20) }}</span></h1>
        <p>{{ $post->created_at ? $post->created_at->format('d F, Y') : '' }} @if($post->author_name) · {{ $post->author_name }} @endif</p>
      </div>
    </div>
  </header>

  <section class="blog">
    <div class="container">
      <div class="single-post">
        <div class="blog-img">
          @if(!empty($post->file))
          @if(pathinfo($post->file, PATHINFO_EXTENSION) == 'mp4')
          <video src="{{ asset('uploads/' . $post->file) }}" controls style="width:100%; max-height:400px;"></video>
          @else
          <img src="{{ asset('uploads/' . $post->file) }}" alt="{{ $post->title }}">
          @endif
          @else
          <img src="{{ asset('blogs/blog-p-1.jpg') }}" alt="{{ $post->title }}">
          @endif
        </div>
        <div class="blog-text">
          <p class="meta">{{ $post->created_at ? $post->created_at->format('d F, Y') : '' }} @if($post->author_name) · By {{ $post->author_name }} @endif</p>
          <h2>{{ $post->title }}</h2>
          <p>{!! nl2br(e($post->description ?? '')) !!}</p>
        </div>
      </div>

      @if($related->isNotEmpty())
      <h3 class="related-title">Related Posts</h3>
      <div class="blog-content">
        @foreach($related as $item)
        <div class="blog-item">
          <div class="blog-img">
            @if(!empty($item->file) && pathinfo($item->file, PATHINFO_EXTENSION) != 'mp4')
            <img src="{{ asset('uploads/' . $item->file) }}" alt="{{ $item->title }}">
            @else
            <img src="{{ asset('blogs/blog-p-1.jpg') }}" alt="{{ $item->title }}">
            @endif
            <span><i class="far fa-heart"></i></span>
          </div>
          <div class="blog-text">
            <span>{{ $item->created_at ? $item->created_at->format('d M, Y') : '' }}</span>
            <h2>{{ Str::limit($item->title, 40) }}</h2>
            <a href="{{ route('blog.show', $item->id) }}">Read More</a>
          </div>
        </div>
        @endforeach
      </div>
      @endif

      <p style="margin-top: 2rem; text-align: center;">
        <a href="{{ route('blog.index') }}" style="display: inline-block; padding: 0.6rem 1.5rem; background: #3c393d; color: #fff; text-decoration: none; border-radius: 4px;">All Blog Posts</a>
      </p>
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
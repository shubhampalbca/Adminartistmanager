<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Art.Design Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="blog.css">
</head>

<body>

  <!-- header -->
  <header>
    <nav class="navbar">
      <div class="container">
        <a href="<?php echo e(url('/')); ?>" class="navbar-brand">Art.Design</a>
        <div class="navbar-nav">
          <a href="<?php echo e(url('/')); ?>">Home</a>
          <a href="<?php echo e(url('/blog')); ?>">Blog</a>
          <a href="<?php echo e(url('admin')); ?>">Admin</a>
          <a href="<?php echo e(url('user')); ?>">User Login</a>
          <a href="<?php echo e(url('manager')); ?>">Manager</a>
        </div>
      </div>
    </nav>
    <div class="banner">
      <div class="container">
        <h1 class="banner-title">
          <span>Art.</span> Design Blog
        </h1>
        <p>everything that you want to know about art & design</p>
        <form>
          <input type="text" class="search-input" placeholder="find your food . . .">
          <button type="submit" class="search-btn">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
  </header>
  <!-- end of header -->

  <!-- design -->
  <section class="design" id="design">
    <div class="container">
      <div class="title">
        <h2>Recent Arts & Designs</h2>
        <p>recent arts & designs on the blog</p>
      </div>

      <div class="design-content">
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="design-item">
          <div class="design-img">
            <?php if(!empty($item->categoryimage)): ?>
            <img src="<?php echo e(asset('uploads/catagories/' . $item->categoryimage)); ?>" alt="<?php echo e($item->categoryname); ?>">
            <?php else: ?>
            <img src="blogs/art-design-1.jpg" alt="<?php echo e($item->categoryname); ?>">
            <?php endif; ?>
            <span><?php echo e($item->categoryname); ?></span>
          </div>
          <div class="design-title">
            <a href="#"><?php echo e($item->categoryname); ?></a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="design-item">
          <div class="design-img">
            <img src="blogs/art-design-1.jpg" alt="">
            <span>Art & Design</span>
          </div>
          <div class="design-title">
            <a href="#">No categories yet</a>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- end of design -->


  <!-- blog -->
  <section class="blog" id="blog">
    <div class="container">
      <div class="title">
        <h2>Latest Blog</h2>
        <p>recent blogs about art & design</p>
      </div>
      <div class="blog-content">
        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="blog-item">
          <div class="blog-img">
            <?php if(!empty($event->file)): ?>
            <?php if(pathinfo($event->file, PATHINFO_EXTENSION) == 'mp4'): ?>
            <video src="<?php echo e(asset('uploads/' . $event->file)); ?>" style="width:100%;height:200px;object-fit:cover;" muted></video>
            <?php else: ?>
            <img src="<?php echo e(asset('uploads/' . $event->file)); ?>" alt="<?php echo e($event->title); ?>">
            <?php endif; ?>
            <?php else: ?>
            <img src="blogs/blog-p-1.jpg" alt="<?php echo e($event->title); ?>">
            <?php endif; ?>
            <span><i class="far fa-heart"></i></span>
          </div>
          <div class="blog-text">
            <span><?php echo e($event->created_at ? $event->created_at->format('d F, Y') : ''); ?> <?php if($event->author_name): ?> · <?php echo e($event->author_name); ?> <?php endif; ?></span>
            <h2><?php echo e(Str::limit($event->title, 50)); ?></h2>
            <p><?php echo e(Str::limit($event->description, 100)); ?></p>
            <a href="<?php echo e(route('blog.show', $event->id)); ?>">Read More</a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="blog-item">
          <div class="blog-img">
            <img src="blogs/blog-p-1.jpg" alt="">
            <span><i class="far fa-heart"></i></span>
          </div>
          <div class="blog-text">
            <span>No events yet</span>
            <h2>Latest events will appear here</h2>
            <p>Events added by users will be shown in this section.</p>
            <a href="<?php echo e(url('user')); ?>">Login as User</a>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <p style="text-align: center; margin-top: 2rem;">
        <a href="<?php echo e(url('/blog')); ?>" style="display: inline-block; padding: 0.6rem 1.5rem; background: var(--dark, #3c393d); color: #fff; text-decoration: none; border-radius: 4px;">View All Blog Posts</a>
      </p>
    </div>
  </section>
  <!-- end of blog -->

  <!-- about -->
  <section class="about" id="about">
    <div class="container">
      <div class="about-content">
        <div>
          <img src="blogs/about-bg.jpg" alt="">
        </div>
        <div class="about-text">
          <div class="title">
            <h2>Catherine Doe</h2>
            <p>art & design is my passion</p>
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id totam voluptatem saepe eius ipsum nam provident sapiente, natus et vel eligendi laboriosam odit eos temporibus impedit veritatis ut, illo deserunt illum voluptate quis beatae quod. Necessitatibus provident dicta consectetur labore!</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam corrupti natus, eos quia recusandae voluptatem veniam modi officiis minima provident rem sint porro fuga quos tempora ea suscipit vero velit sed laudantium eaque necessitatibus maxime!</p>
        </div>
      </div>
    </div>
  </section>
  <!-- end of about -->

  <!-- footer -->
  <footer>
    <div class="social-links">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-pinterest"></i></a>
    </div>
    <span>Art.Design Blog Page</span>
  </footer>
  <!-- end of footer -->


</body>

</html><?php /**PATH C:\wamp64\www\adminartimanager\resources\views/welcome.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php echo $__env->make('Artist/include/headerlink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <title>Profile Details </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   </head>
   <body>
      <?php echo $__env->make('Artist/include/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('Artist/include/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <main id="main" class="main">
         <div class="jumbotron">
            <h1 style="text-align:center;">Artist Profile Details</h1>
         </div>
         <div class="container profile-container">
            <div class="row">
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                        <div class="centered-image-container">
                           <img src="<?php echo e(asset('uploads/profile/' . $adminData->profile)); ?>" class="main-profile-img" width="150" height="150">
                        </div>
                        <h4 class="card-title" style="text-align: center;"><?php echo e($adminData->name); ?></h4>
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item" style="text-align: center;"><?php echo e($adminData->email); ?></li>
                           <li class="list-group-item" style="text-align: center;"><?php echo e($adminData->mobile); ?></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card">
                     <div class="card-body">
                        <form action="<?php echo e(url('update_artist/'.$adminData->id)); ?>" method="post" enctype="multipart/form-data">
                           <?php echo csrf_field(); ?>
                           <?php echo method_field('PUT'); ?>
                           <input type="hidden" name="id" value="<?php echo e($adminData->id); ?>">
                           <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" class="form-control" name="name" value="<?php echo e($adminData->name); ?>">
                           </div>
                           <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" value="<?php echo e($adminData->email); ?>">
                           </div>
                           <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="text" class="form-control" name="mobile" value="<?php echo e($adminData->mobile); ?>">
                           </div>
                           <div class="mb-3">
                              <label class="form-label">profile</label>
                              <input class="form-control"  name="profile" type="file">
                              <img src="<?php echo e(asset('uploads/profile/' . $adminData->profile)); ?>"  alt="" width="70px" height="70px" alt="image" >
                           </div>
                           <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <!-- ======= Footer ======= -->
      <?php echo $__env->make('Artist/include/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- ======= Footer ======= -->
   </body>
</html>
<script>
   $(document).ready(function () {
       <?php if(session('success')): ?>
       Swal.fire({
           icon: 'success',
           title: 'Success!',
           text: '<?php echo e(session('success')); ?>',
       });
       <?php endif; ?>
   });
</script><?php /**PATH C:\wamp64\www\adminartimanager\resources\views/Artist/profile.blade.php ENDPATH**/ ?>
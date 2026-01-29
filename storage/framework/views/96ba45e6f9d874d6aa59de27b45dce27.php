<!DOCTYPE html>
<html lang="en">

<head>
   <?php echo $__env->make('admin/include/headerlink', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <title>User List </title>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <style>
      
      </style> -->
</head>

<body>
   <?php echo $__env->make('admin/include/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <?php echo $__env->make('admin/include/sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <main id="main" class="main">

      <!-- End Page Title -->
      <section class="section dashboard">
         <div class="row">
            <div class="container-fluid px-4">
               <!-- <h1 class="mt-4">User List</h1> -->
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-table me-1"></i>User List
                  </div>
                  <div class="card-body">
                     <table>
                        <thead>
                           <tr>
                              <th class="name th-bg-color">Id</th>
                              <th class="name th-bg-color">Name</th>
                              <th class="name th-bg-color">Email</th>
                              <th class="name th-bg-color">Mobile</th>
                              <th class="name th-bg-color">Profile</th>
                              <th class="name th-bg-color">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td class="name"><?php echo e($item->id); ?></td>
                              <td class="name"><?php echo e($item->name); ?></td>
                              <td class="name"><?php echo e($item->email); ?></td>
                              <td class="name"><?php echo e($item->mobile); ?></td>
                              <td class="productlist name">
                                 <div class="product-box">
                                    <?php if(!empty($item->profile)): ?>
                                    <img src="<?php echo e(asset('uploads/profile/' . $item->profile)); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" alt="Profile">
                                    <?php else: ?>
                                    <span class="text-muted small">No image</span>
                                    <?php endif; ?>
                                 </div>
                              </td>
                              <td class="name">
                                 <a href="<?php echo e(url('edit-user/'.$item->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                              </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                     <br>
                     <?php echo e($users->links('pagination::bootstrap-4')); ?>

                  </div>
               </div>
            </div>
      </section>
   </main>
   <?php echo $__env->make('admin/include/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php if(session('success')): ?>
<div class="modal fade custom-modal" id="successModal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header bg-success text-white">
            <h4 class="modal-title" style="text-align:center;"><?php echo e(session('success')); ?></h4>
         </div>
         <div class="modal-body">
            <p>You Are Logged In To Admin Dashboard!</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
      $("#successModal").modal('show');
      $("#successModal button[data-dismiss='modal']").on('click', function() {
         $("#successModal").modal('hide');
      });
   });
</script>
<?php endif; ?><?php /**PATH C:\wamp64\www\adminartimanager\resources\views/admin/userslist.blade.php ENDPATH**/ ?>
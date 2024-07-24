<!DOCTYPE html>
<html lang="en">
   <head>
      <?php echo $__env->make('admin/include/headerlink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <title>User List </title>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <style>
      
      </style> -->
   </head>
   <body>
      <?php echo $__env->make('admin/include/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('admin/include/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <main id="main" class="main">
        
         <!-- End Page Title -->
         <section class="section dashboard">
            <div class="row">
            <div class="container-fluid px-4">
               <!-- <h1 class="mt-4">User List</h1> -->
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-table me-1"></i>Manager List
                  </div>
                  <div class="card-body">
                     <table>
                        <thead>
                           <tr>
                              <th class="name th-bg-color">Id</th>
                              <th class="name th-bg-color">Name</th>
                              <th class="name th-bg-color">User Name</th>
                              <th class="name th-bg-color">Email</th>
                              <th class="name th-bg-color">Mobile</th>
                              <th class="name th-bg-color">Gender</th>
                              <th class="name th-bg-color">Profile</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td class="name"><?php echo e($item->id); ?></td>
                              <td class="name"><?php echo e($item->name); ?></td>
                              <td class="name"><?php echo e($item->username); ?></td>
                              <td class="name"><?php echo e($item->email); ?></td>
                              <td class="name"><?php echo e($item->mobile); ?></td>
                              <td class="name"><?php echo e($item->gender); ?></td>
                              <td class="productlist name">
                              <div class="product-box">
                                 <img src="<?php echo e(asset('uploads/user_profile/' . $item->user_profile)); ?>"  style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" alt="vdf">
                               </div>
                              
                              </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                     <br>
                     <?php echo e($manager->links('pagination::bootstrap-4')); ?>

                  </div>
               </div>
            </div>
         </section>
      </main>
      <?php echo $__env->make('admin/include/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
   $(document).ready(function () {
       $("#successModal").modal('show');
       $("#successModal button[data-dismiss='modal']").on('click', function () {
           $("#successModal").modal('hide');
       });
   });
</script>
<?php endif; ?><?php /**PATH C:\wamp64\www\adminartimanager\resources\views/admin/managerlist.blade.php ENDPATH**/ ?>
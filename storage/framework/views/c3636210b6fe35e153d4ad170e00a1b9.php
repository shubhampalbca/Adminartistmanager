<!DOCTYPE html>
<html lang="en">
   <head>
      <?php echo $__env->make('admin/include/headerlink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <title>Artists Events </title>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
   </head>
   <body>
      <?php echo $__env->make('admin/include/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('admin/include/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <main id="main" class="main">
         <!-- End Page Title -->
         <section class="section dashboard">
            <div class="row">
            <div class="container-fluid px-4">
               <!-- <h1 class="mt-4">Artists Events</h1> -->
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-table me-1"></i>Artists Events
                  </div>
                  <div class="card-body">
                     <table>
                        <thead>
                           <tr>
                              <th class="name sidebar-bg">Id</th>
                              <th class="name sidebar-bg">Title</th>
                              <th class="name sidebar-bg">Artist Id</th>
                              <th class="name sidebar-bg">Description</th>
                              <th class="name sidebar-bg">Events</th>
                              <th class="name sidebar-bg">Created_at</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td class="name"><?php echo e($item->id); ?></td>
                              <td class="name"><?php echo e($item->title); ?></td>
                              <td class="name"><?php echo e($item->name); ?></td>
                              <td class="name max-width"><?php echo e($item->description); ?></td>
                              <td class="name name-max-width">
                                 <?php if(pathinfo($item->file, PATHINFO_EXTENSION) == 'mp4'): ?>
                                 <!-- Video -->
                                 <video width="150" height="150" controls>
                                    <source src="<?php echo e(asset('uploads/' . $item->file)); ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                 </video>
                                 <?php else: ?>
                                 <!-- Photo -->
                                 <img src="<?php echo e(asset('uploads/' . $item->file)); ?>" alt="Photo" width="100" height="100">
                                 <?php endif; ?>
                              </td>
                              <td class="name"><?php echo e($item->created_at); ?></td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                     <br>
                     <?php echo e($events->links('pagination::bootstrap-4')); ?>

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
<?php endif; ?><?php /**PATH C:\wamp64\www\adminartimanager\resources\views/admin/artistevents.blade.php ENDPATH**/ ?>
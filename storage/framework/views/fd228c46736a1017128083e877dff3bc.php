<!DOCTYPE html>
<html lang="en">

<head>
   <?php echo $__env->make('Artist/include/headerlink', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <title>Dashboard-Artist </title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

   <?php echo $__env->make('Artist/include/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <?php echo $__env->make('Artist/include/sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Dashboard</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
         </nav>
      </div>
      <!-- End Page Title -->
      <section class="section dashboard">
         <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
               <div class="row">
                  <!-- Sales Card -->
                  <div class="col-xxl-4 col-md-4">
                     <div class="card info-card sales-card  bg-c-blue">
                        <div class="filter">
                           <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                           <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                 <h6>Filter</h6>
                              </li>
                              <li><a class="dropdown-item" href="#">Today</a></li>
                              <li><a class="dropdown-item" href="#">This Month</a></li>
                              <li><a class="dropdown-item" href="#">This Year</a></li>
                           </ul>
                        </div>
                        <div class="card-body">
                           <h5 class="card-title">My Events <span>| Total</span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                 <i class="bi bi-calendar-event"></i>
                              </div>
                              <div class="ps-3">
                                 <h6><?php echo e($eventCount ?? 0); ?></h6>
                                 <span class="text-muted small pt-2 ps-1">events created</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-md-4">
                     <div class="card info-card sales-card bg-c-green">
                        <div class="card-body">
                           <h5 class="card-title">Quick Link <span>| Events</span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                 <i class="bi bi-plus-circle"></i>
                              </div>
                              <div class="ps-3">
                                 <a href="<?php echo e(url('events')); ?>" class="btn btn-sm btn-success">Add Event</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-md-4">
                     <div class="card info-card sales-card bg-c-pink">
                        <div class="card-body">
                           <h5 class="card-title">Profile <span>| Account</span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                 <i class="bi bi-person"></i>
                              </div>
                              <div class="ps-3">
                                 <a href="<?php echo e(url('userprofile')); ?>" class="btn btn-sm btn-primary">View Profile</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
   <!-- End #main -->
   <!-- ======= Footer ======= -->
   <?php echo $__env->make('Artist/include/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <!-- ======= Footer ======= -->
</body>

</html>



<?php if(session('success')): ?>
<!-- Define the Bootstrap modal for the success message -->
<div class="modal fade custom-modal" id="successModal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header bg-success text-white">
            <h4 class="modal-title" style="text-align:center;"><?php echo e(session('success')); ?></h4>
         </div>
         <div class="modal-body">
            <p>You Are Logged In To Artist Dashboard!</p>
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
<?php endif; ?><?php /**PATH C:\wamp64\www\adminartimanager\resources\views/Artist/dashboard.blade.php ENDPATH**/ ?>
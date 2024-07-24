<!DOCTYPE html>
<html lang="en">
   <head>
      <?php echo $__env->make('admin/include/headerlink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <title> Admin-Dashboard - </title>
     
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
   </head>

   <style></style>
   <body>


      <?php echo $__env->make('admin/include/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('admin/include/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
               <ol class="breadcrumb">
            
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
                        <div class="card info-card sales-card  bg-c-green-in">
                          <div class="card-body">
                           <p>Total Artist <span>| Today</span></p>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                              </div>
                              <div class="ps-3">
                                    <p><?php echo e($count); ?></p>
                              </div>
                           </div>
                        </div>




                        </div>
                     </div>
                     <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card bg-c-pink-in">
                           
                           <div class="card-body">
                              <p>Total Users <span>| Today</span></p>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                 </div>
                                 <div class="ps-3">
                                    <hp><?php echo e($usercount); ?></p>
                                  
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-md-4">
                        <div class="card info-card bg-c-blue-in sales-card ">
                           <div class="filter">
                           
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
                              <p>Sales <span>| Today</span></p>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                 </div>
                                 <div class="ps-3">
                                    <p>145<p>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
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
<?php endif; ?><?php /**PATH C:\wamp64\www\adminartimanager\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
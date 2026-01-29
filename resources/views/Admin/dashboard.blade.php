<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/include/headerlink')
   <title> Admin-Dashboard - </title>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<style></style>

<body>


   @include('admin/include/header')
   @include('admin/include/sidebar')
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
            <!-- Card 1: Total Users -->
            <div class="col-xxl-3 col-lg-3 col-md-6 mb-3 mb-lg-0">
               <div class="card info-card sales-card h-100 border-0 shadow-sm">
                  <div class="card-body d-flex align-items-center justify-content-between">
                     <div>
                        <p class="text-uppercase text-muted small mb-1">Total Users</p>
                        <h4 class="mb-0 fw-bold">{{ $usercount }}</h4>
                     </div>
                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary" style="width:56px;height:56px;">
                        <i class="bi bi-people fs-4"></i>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Card 2: Total Managers -->
            <div class="col-xxl-3 col-lg-3 col-md-6 mb-3 mb-lg-0">
               <div class="card info-card sales-card h-100 border-0 shadow-sm">
                  <div class="card-body d-flex align-items-center justify-content-between">
                     <div>
                        <p class="text-uppercase text-muted small mb-1">Total Managers</p>
                        <h4 class="mb-0 fw-bold">{{ $managercount }}</h4>
                     </div>
                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success" style="width:56px;height:56px;">
                        <i class="bi bi-person-badge fs-4"></i>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Card 3: Events This Month -->
            <div class="col-xxl-3 col-lg-3 col-md-6 mb-3 mb-lg-0">
               <div class="card info-card sales-card h-100 border-0 shadow-sm">
                  <div class="card-body d-flex align-items-center justify-content-between">
                     <div>
                        <p class="text-uppercase text-muted small mb-1">Events This Month</p>
                        <h4 class="mb-0 fw-bold">{{ $eventsthismonth }}</h4>
                        <span class="text-{{ $percentchange >= 0 ? 'success' : 'danger' }} small fw-bold">{{ $percentchange }}%</span>
                        <span class="text-muted small"> vs last month</span>
                     </div>
                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10 text-info" style="width:56px;height:56px;">
                        <i class="bi bi-calendar-event fs-4"></i>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Card 4: Total Events -->
            <div class="col-xxl-3 col-lg-3 col-md-6 mb-3 mb-lg-0">
               <div class="card info-card sales-card h-100 border-0 shadow-sm">
                  <div class="card-body d-flex align-items-center justify-content-between">
                     <div>
                        <p class="text-uppercase text-muted small mb-1">Total Events</p>
                        <h4 class="mb-0 fw-bold">{{ $eventcount }}</h4>
                     </div>
                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning" style="width:56px;height:56px;">
                        <i class="bi bi-collection fs-4"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
   @include('admin/include/footer')
</body>

</html>
@if(session('success'))
<div class="modal fade custom-modal" id="successModal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header bg-success text-white">
            <h4 class="modal-title" style="text-align:center;">{{ session('success') }}</h4>
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
@endif
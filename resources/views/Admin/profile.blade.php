<!DOCTYPE html>
<html lang="en">
   <head>
      @include('admin/include/headerlink')
      <title>Profile Details </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <!-- <style>
         table {
         font-family: Arial, Helvetica, sans-serif;
         border-collapse: collapse;
         width: 100%;
         margin-top: 20px;
         }
         th, td {
         border: 1px solid #dddddd;
         text-align: left;
         padding: 8px;
         }
         tr:nth-child(even) {
         background-color: #f2f2f2;
         }
         th {
         background-color: #4CAF50;
         color: white;
         }
         .btn-add-Admin {
         float: right;
         }
         .card-body {
         overflow-x: auto;
         width: 100%;
         }
         .product-box {
         display: flex;
         align-items: center;
         }
         .product-box img {
         max-width: 50px;
         max-height: 50px;
         }
         ul.pagination {
         justify-content: end;
         }
         .main-profile-img {
         width: 140px;
         height: 140px;
         border-radius: 50%;
         border-style: solid;
         border-color: #FFFFFF;
         box-shadow: 0 0 8px 3px #B8B8B8;
         }
         .edit-icon{
         position: relative;
         top:70px;
         left: -34px;
         }
         .centered-image-container {
         display: flex;
         justify-content: center;
         align-items: center;
         padding: 20px;
         }
      </style> -->
   </head>
   <body>
      @include('admin/include/header')
      @include('admin/include/sidebar')
      <main id="main" class="main">
         <div class="jumbotron">
            <h1 style="text-align:center;">Admin Profile Details</h1>
         </div>
         <div class="container profile-container">
            <div class="row">
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                        <div class="centered-image-container">
                           <img src="{{ asset('uploads/profile/' . $adminData->profile) }}" class="main-profile-img" width="150" height="150">
                           <a href="{{ url('edit-admin-profile/'.$adminData->id) }}"><i class="fa fa-edit edit-icon"></i></a>
                        </div>
                        <h4 class="card-title" style="text-align: center;">{{ $adminData->name }}</h4>
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item" style="text-align: center;">{{ $adminData->email }}</li>
                           <li class="list-group-item" style="text-align: center;">{{ $adminData->mobile }}</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card">
                     <div class="card-body">
                        <form action="{{ url('update_admin/'.$adminData->id) }}" method="post" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           <input type="hidden" name="id" value="{{ $adminData->id }}">
                           <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $adminData->name }}">
                           </div>
                           <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" value="{{ $adminData->email }}">
                           </div>
                           <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="tel" class="form-control" name="mobile" value="{{ $adminData->mobile }}">
                           </div>
                           <div class="mb-3">
                              <label class="form-label">profile</label>
                              <input class="form-control"  name="profile" type="file">
                              <img src="{{ asset('uploads/profile/' . $adminData->profile) }}"  alt="" width="70px" height="70px" alt="image" >
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
      @include('admin/include/footer')
      <!-- ======= Footer ======= -->
   </body>
</html>
<script>
   $(document).ready(function () {
       @if(session('success'))
       Swal.fire({
           icon: 'success',
           title: 'Success!',
           text: '{{ session('success') }}',
       });
       @endif
   });
</script>
<!DOCTYPE html>
<html lang="en">
   <head>
      @include('Artist/include/headerlink')
      <title>Profile Details </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   </head>
   <body>
      @include('Artist/include/header')
      @include('Artist/include/sidebar')
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
                           <img src="{{ asset('uploads/profile/' . $adminData->profile) }}" class="main-profile-img" width="150" height="150">
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
                        <form action="{{ url('update_artist/'.$adminData->id) }}" method="post" enctype="multipart/form-data">
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
                              <input type="text" class="form-control" name="mobile" value="{{ $adminData->mobile }}">
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
      @include('Artist/include/footer')
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
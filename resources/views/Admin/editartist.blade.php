<!DOCTYPE html>
<html lang="en">
   <head>
      @include('admin/include/headerlink')
      <title>Users </title>
   </head>
   <body>
      @include('admin/include/header')
      @include('admin/include/sidebar')
      <main id="main" class="main">
         <section class="section dashboard">
            <div class="row">
            <div class="container-fluid px-4">
               <!-- <h1 class="mt-4">Artist</h1> -->
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-table me-1"></i>Edit User
                             <form action="{{ url('update-user/'.$users->id) }}" method="post" enctype="multipart/form-data">
                             @csrf
                             @method('PUT')
                              
                              <label for="name">Name:</label>
                              <input type="text" id="name" class="form-control"  name="name" value="{{$users->name}}">
                              <label for="name">Email:</label>
                              <input type="email" id="email" class="form-control"  name="email" value="{{$users->email}}">
                              <label for="name">Mobile:</label>
                              <input type="text" id="mobile" class="form-control"  name="mobile" value="{{$users->mobile}}">
                              <label for="image">Password :</label>
                              <input type="text" class="form-control"  name="password" value="{{$users->password}}">
                              <label for="image">Profile :</label>
                              <input type="file" class="form-control" id="image" name="profile" require><br>
                              <img src="{{ asset('uploads/profile/' . $users->profile) }}"  width="50px" height="50px" alt="image" ><br><br>
                              <input type="submit" class="btn btn-success btn-primary-btn-h" value="Submit">
                           </form>
                    
                  </div>
                 
               </div>

            </div>
         </section>
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




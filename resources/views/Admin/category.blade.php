<!DOCTYPE html>
<html lang="en">
   <head>
      @include('admin/include/headerlink')
      <title>Catagories </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     
   </head>
   <body>
      @include('admin/include/header')
      @include('admin/include/sidebar')
      <main id="main" class="main">
         <section class="section dashboard">
            <div class="row">
               <div class="col-lg-12">
                  <div class="container-fluid px-4">
                     <!-- <h1 class="mt-4"> catagories</h1> -->
                     @if (session('status'))
                     <h6 class="alert alert-success">{{ session('status') }}</h6>
                     @endif
                     <div class="card mb-4">
                        <div class="card-header">
                           <!-- <i class="fas fa-table me-1"></i> -->
                           <!-- catagories -->
                           <button type="button" class="btn btn-primary btn-primary-btn-h" data-bs-toggle="modal" data-bs-target="#exampleModal">
                           add category
                           </button>
                        </div>
                        <div class="card-body">
                           <table>
                              <thead class="thead-bg">
                                 <tr>
                                    <th class="th-bg-color">#</th>
                                    <th class="th-bg-color">Category Name</th>
                                    <th class="th-bg-color">Category Image</th>
                                    <th class="th-bg-color">Create Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($Category as $item)
                                 <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->categoryname }}</td>
                                    <td class="productlist">
                                       <div class="product-box">
                                          <img src="{{ asset('uploads/catagories/' . $item->categoryimage) }}"   style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                       </div>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                           <br>
                           {{ $Category->links('pagination::bootstrap-4') }}
                        </div>
                     </div>
                     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="exampleModalLabel">Add category</h1>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{url('insertcategory')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <label for="name">Category Name:</label>
                                    <input type="text" id="name" class="form-control" name="categoryname" required><br>
                                    <label for="image">Category Image:</label>
                                    <input type="file" class="form-control" id="image" name="categoryimage" accept="image/*" required><br><br>
                                    <input type="submit" class="btn btn-success btn-primary-btn-h" value="Submit">
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
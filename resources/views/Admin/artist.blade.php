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
                     <i class="fas fa-table me-1"></i> User
                     <button type="button" class="btn btn-primary btn-add-user btn-primary-btn-h" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                     Add User
                     </button>
                  </div>
                  <div class="card-body">
                     <table>
                        <thead>
                           <tr>
                              <th class="name sidebar-bg">Id</th>
                              <th class="name sidebar-bg">Name</th>
                              <th class="name sidebar-bg">Email</th>
                              <th class="name sidebar-bg">Password</th>
                              <th class="name sidebar-bg">Mobile</th>
                              <th class="name sidebar-bg">Category</th>
                              <th class="name sidebar-bg">Status</th>
                              <th class="name sidebar-bg">Profile</th>
                              <th class="name sidebar-bg">Action</th>
                              <!-- <th>Action</th> -->
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as $item)
                           <tr>
                              <td class="name">{{ $item->id }}</td>
                              <td class="name">{{ $item->name }}</td>
                              <td class="name">{{ $item->email }}</td>
                              <td class="name">{{ $item->password }}</td>
                              <td class="name">{{ $item->mobile }}</td>
                              <td class="name">{{ $item->category }}</td>
                              <td class="name">
                                 <a href="{{ url('active-user/'.$item->id) }}" class="btn btn-sm btn-{{ $item->status ? 'success':'danger'}}">
                                 {{ $item->status ? 'active':'inactive'}}
                                 </a>
                              </td>
                              <td class="productlist">
                                 <div class="product-box">
                                    <img src="{{ asset('uploads/profile/' . $item->profile) }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" alt="fghj">
                                 </div>
                              </td>
                              <td> 
                              <a  data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}" class="btn btn-primary btn-sm">Edit</a>
                              
                              <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $item->id }}" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h1 class="modal-title fs-5 " id="exampleModalLabel-{{ $item->id }}">Edit user</h1>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('update-user/'.$item->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                          <label for="name">Name:</label>
                                          <input type="text" id="name" class="form-control" name="name" value="{{ $item->name }}">
                                          <label for="name">Email:</label>
                                          <input type="email" id="email" class="form-control" name="email" value="{{ $item->email }}">
                                          <label for="name">Mobile:</label>
                                          <input type="text" id="mobile" class="form-control" name="mobile" value="{{ $item->mobile }}">
                                          <label for="image">Password :</label>
                                          <input type="password" class="form-control" name="password" value="{{ $item->password }}"><br>

                                          <label for="category">Categories:</label>
                                         
                                          <select  id="category" name="category" class="form-control">
                                             @if(!empty($category))
                                             <option  value="Select Category">Select Category</option>
                                                @foreach ($category as $list)
                                                   @if( $list->categoryname == $item->category )
                                                   <option selected  value="{{$list->categoryname}}">{{$list->categoryname}}</option>
                                                   @else
                                                   <option  value="{{$list->categoryname}}">{{$list->categoryname}}</option>
                                                   @endif
                                                @endforeach
                                             @endif
                                          </select>
                                          
                                          <label for="image">Profile :</label>
                                          <input type="file" class="form-control" id="image" name="profile" require><br>
                                          <img src="{{ asset('uploads/profile/' . $item->profile) }}"  width="50px" height="50px" alt="image" ><br><br>
                                          <input type="submit" class="btn btn-success btn-primary-btn-h" value="Submit">
                                       </form>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                              <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                             </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <br>
                     {{ $users->links('pagination::bootstrap-4') }}
                  </div>
               </div>
        
               <!-- add the data -->
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title fs-5 " id="exampleModalLabel">Add User</h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form action="{{url('insertuser')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              @if ($errors->any())
                              <div class="alert alert-danger">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                              </div>
                              @endif
                              @if (session('message'))
                              <div class="alert alert-success">
                                 {{ session('message') }}
                              </div>
                              @endif
                              <label for="category">Categories:</label>
                              <select  id="category" name="category" class="form-control">
                                 <option>Select Category</option>
                                 @if(!empty($category))
                                 @foreach ($category as $list)
                                 <option value="{{$list->categoryname}}">{{$list->categoryname}}</option>
                                 @endforeach
                                 @endif
                              </select>
                              <label for="name">Name:</label>
                              <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                              <label for="name">Email:</label>
                              <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}">
                              <label for="name">Mobile:</label>
                              <input type="text" id="mobile" class="form-control" name="mobile" value="{{old('mobile')}}">
                              <label for="image">Password :</label>
                              <input type="password" class="form-control" id="password" name="password" ><br>
                              <label for="image">Profile :</label>
                              <input type="file" class="form-control" id="image" name="profile" require><br>
                              <input type="submit" class="btn btn-success btn-primary-btn-h" value="Submit">
                           </form>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>

           <!-- add the data end -->

        

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




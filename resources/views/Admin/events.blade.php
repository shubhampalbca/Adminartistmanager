<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/include/headerlink')
   <title>Admin Posts</title>
   <style>
      table {
         font-family: Arial, Helvetica, sans-serif;
         border-collapse: collapse;
         width: 100%;
         margin-top: 20px;
      }

      th,
      td {
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

      .btn-add-artist {
         float: right;
      }

      .card-body {
         overflow-x: auto;
         width: 100%;
      }

      video,
      img {
         max-width: 100%;
         height: auto;
      }

      .name-max-width {
         max-width: 120px;
      }

      .max-width {
         max-width: 200px;
      }
   </style>
</head>

<body>
   @include('admin/include/header')
   @include('admin/include/sidebar')

   <main id="main" class="main">
      <section class="section dashboard">
         <div class="row">
            <div class="container-fluid px-4">
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-table me-1"></i> My Posts
                     <button type="button" class="btn btn-primary btn-add-artist btn-primary-btn-h" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Post
                     </button>
                  </div>
                  <div class="card-body">
                     <table>
                        <thead>
                           <tr>
                              <th class="name">Id</th>
                              <th class="name">Title</th>
                              <th class="name">Description</th>
                              <th class="name">Photo / Video</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($events as $item)
                           <tr>
                              <td class="name">{{ $item->id }}</td>
                              <td class="name">{{ $item->title }}</td>
                              <td class="name max-width">{{ Str::limit($item->description, 80) }}</td>
                              <td class="name name-max-width">
                                 @if(!empty($item->file))
                                 @if (pathinfo($item->file, PATHINFO_EXTENSION) == 'mp4')
                                 <video width="200" height="200" controls>
                                    <source src="{{ asset('uploads/' . $item->file) }}" type="video/mp4">
                                 </video>
                                 @else
                                 <img src="{{ asset('uploads/' . $item->file) }}" alt="Post" width="100" height="100">
                                 @endif
                                 @else
                                 <span class="text-muted small">No file</span>
                                 @endif
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title fs-5" id="exampleModalLabel">Add Post</h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form action="{{ url('admin/events') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <label for="title">Title:</label>
                              <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}" required>
                              <label for="file">Photo or Video:</label>
                              <input type="file" class="form-control" id="file" name="file" accept="image/*,video/mp4">
                              <label for="description">Description:</label>
                              <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea><br>
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
         <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
         </div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
   $(document).ready(function() {
      $("#successModal").modal('show');
   });
</script>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/include/headerlink')
   <title>Users Events </title>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
</head>

<body>
   @include('admin/include/header')
   @include('admin/include/sidebar')
   <main id="main" class="main">
      <!-- End Page Title -->
      <section class="section dashboard">
         <div class="row">
            <div class="container-fluid px-4">
               <!-- <h1 class="mt-4">Artists Events</h1> -->
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-table me-1"></i>Users Events
                  </div>
                  <div class="card-body">
                     <table>
                        <thead>
                           <tr>
                              <th class="name sidebar-bg">Id</th>
                              <th class="name sidebar-bg">Title</th>
                              <th class="name sidebar-bg">User Name</th>
                              <th class="name sidebar-bg">Description</th>
                              <th class="name sidebar-bg">Events</th>
                              <th class="name sidebar-bg">Created_at</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($events as $item)
                           <tr>
                              <td class="name">{{ $item->id }}</td>
                              <td class="name">{{ $item->title }}</td>
                              <td class="name">{{ $item->author_name ?? 'N/A' }}</td>
                              <td class="name max-width">{{ $item->description }}</td>
                              <td class="name name-max-width">
                                 @if(!empty($item->file))
                                 @if (pathinfo($item->file, PATHINFO_EXTENSION) == 'mp4')
                                 <video width="150" height="150" controls>
                                    <source src="{{ asset('uploads/' . $item->file) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                 </video>
                                 @else
                                 <img src="{{ asset('uploads/' . $item->file) }}" alt="Event" width="100" height="100">
                                 @endif
                                 @else
                                 <span class="text-muted small">No file</span>
                                 @endif
                              </td>
                              <td class="name">{{ $item->created_at }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <br>
                     {{ $events->links('pagination::bootstrap-4') }}
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
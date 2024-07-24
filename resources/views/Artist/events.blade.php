<!DOCTYPE html>
<html lang="en">
   <head>
      @include('Artist/include/headerlink')
      <title>Dashboard-Artist </title>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <style>
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
         .btn-add-artist {
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
         video, img {
         max-width: 100%;
         height: auto;
         }
      </style> 
   </head>
   <body>
 
      @include('Artist/include/header')
      @include('Artist/include/sidebar')

      <main id="main" class="main">
         <section class="section dashboard">
            <div class="row">
            <div class="container-fluid px-4">
               <!-- <h1 class="mt-4">Artist Events</h1> -->
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-table me-1"></i> Artist
                     <button type="button" class="btn btn-primary btn-add-artist btn-primary-btn-h" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                     Add Events
                     </button>
                  </div>
                  <div class="card-body">
                     <table>
                        <thead>
                           <tr>
                              <th class=" name">Id</th>
                              <th class=" name">Title</th>
                              <th class=" name">Descripton</th>
                              <th class=" name">photos Or Video</th>
                              <!-- <th class="th-bg-color name">Action</th>  -->
                           </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $item)
                           <tr>
                              <td class="name">{{$item->id}}</td>
                              <td class="name">{{$item->title}}</td>
                              <td class="name max-width">{{$item->description}}</td>

                              <td class="name name-max-width" >
                                 
                                 @if (pathinfo($item->file, PATHINFO_EXTENSION) == 'mp4')
                                       <!-- Video -->
                                       <video width="200" height="200" controls>
                                          <source src="{{ asset('uploads/' . $item->file) }}" type="video/mp4">
                                          Your browser does not support the video tag.
                                       </video>
                                 @else
                                       <!-- Photo -->
                                       <img src="{{ asset('uploads/' . $item->file) }}" alt="Photo" width="100" height="100">
                                 @endif
                              </td>

                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <br>
                  
                  </div>
               </div>
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title fs-5" id="exampleModalLabel">Add Artist</h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form action="{{url('events')}}" method="post" enctype="multipart/form-data">
                              @csrf
                             
                              <label for="name">Title:</label>
                              <input type="text" id="title" class="form-control" name="title" value="{{old('title')}}">
                             
                              <label for="image">Photos or videos :</label>

                              <input type="file" class="form-control" id="image" name="file" require><br>


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
         </section>
      </main>

      <!-- ======= Footer ======= -->
      @include('Artist/include/footer')
      <!-- ======= Footer ======= -->
   </body>
</html>



<!DOCTYPE html>
<html lang="en">

<head>
   <?php echo $__env->make('admin/include/headerlink', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <title>Users </title>
</head>

<body>
   <?php echo $__env->make('admin/include/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <?php echo $__env->make('admin/include/sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
                           <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td class="name"><?php echo e($item->id); ?></td>
                              <td class="name"><?php echo e($item->name); ?></td>
                              <td class="name"><?php echo e($item->email); ?></td>
                              <td class="name"><?php echo e($item->password); ?></td>
                              <td class="name"><?php echo e($item->mobile); ?></td>
                              <td class="name"><?php echo e($item->category); ?></td>
                              <td class="name">
                                 <a href="<?php echo e(url('active-user/'.$item->id)); ?>" class="btn btn-sm btn-<?php echo e($item->status ? 'success':'danger'); ?>">
                                    <?php echo e($item->status ? 'active':'inactive'); ?>

                                 </a>
                              </td>
                              <td class="productlist">
                                 <div class="product-box">
                                    <?php if(!empty($item->profile)): ?>
                                    <img src="<?php echo e(asset('uploads/profile/' . $item->profile)); ?>" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" alt="Profile">
                                    <?php else: ?>
                                    <span class="text-muted small">No image</span>
                                    <?php endif; ?>
                                 </div>
                              </td>
                              <td>
                                 <a data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo e($item->id); ?>" class="btn btn-primary btn-sm">Edit</a>

                                 <div class="modal fade" id="exampleModal-<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel-<?php echo e($item->id); ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h1 class="modal-title fs-5 " id="exampleModalLabel-<?php echo e($item->id); ?>">Edit user</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                             <form action="<?php echo e(url('update-user/'.$item->id)); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <label for="name">Name:</label>
                                                <input type="text" id="name" class="form-control" name="name" value="<?php echo e($item->name); ?>">
                                                <label for="name">Email:</label>
                                                <input type="email" id="email" class="form-control" name="email" value="<?php echo e($item->email); ?>">
                                                <label for="name">Mobile:</label>
                                                <input type="text" id="mobile" class="form-control" name="mobile" value="<?php echo e($item->mobile); ?>">
                                                <label for="image">Password :</label>
                                                <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current"><br>

                                                <label for="category">Categories:</label>

                                                <select id="category" name="category" class="form-control">
                                                   <?php if(!empty($category)): ?>
                                                   <option value="Select Category">Select Category</option>
                                                   <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <?php if( $list->categoryname == $item->category ): ?>
                                                   <option selected value="<?php echo e($list->categoryname); ?>"><?php echo e($list->categoryname); ?></option>
                                                   <?php else: ?>
                                                   <option value="<?php echo e($list->categoryname); ?>"><?php echo e($list->categoryname); ?></option>
                                                   <?php endif; ?>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php endif; ?>
                                                </select>

                                                <label for="image">Profile :</label>
                                                <input type="file" class="form-control" id="image" name="profile"><br>
                                                <?php if(!empty($item->profile)): ?>
                                                <img src="<?php echo e(asset('uploads/profile/' . $item->profile)); ?>" width="50px" height="50px" alt="Profile"><br><br>
                                                <?php endif; ?>
                                                <input type="submit" class="btn btn-success btn-primary-btn-h" value="Submit">
                                             </form>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <a href="<?php echo e(url('edit-user/'.$item->id)); ?>" class="btn btn-info btn-sm">View / Edit Page</a>
                              </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                     <br>
                     <?php echo e($users->links('pagination::bootstrap-4')); ?>

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
                           <form action="<?php echo e(url('insertuser')); ?>" method="post" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <?php if($errors->any()): ?>
                              <div class="alert alert-danger">
                                 <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </ul>
                              </div>
                              <?php endif; ?>
                              <?php if(session('message')): ?>
                              <div class="alert alert-success">
                                 <?php echo e(session('message')); ?>

                              </div>
                              <?php endif; ?>
                              <label for="category">Categories:</label>
                              <select id="category" name="category" class="form-control">
                                 <option>Select Category</option>
                                 <?php if(!empty($category)): ?>
                                 <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($list->categoryname); ?>"><?php echo e($list->categoryname); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </select>
                              <label for="name">Name:</label>
                              <input type="text" id="name" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                              <label for="name">Email:</label>
                              <input type="email" id="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                              <label for="name">Mobile:</label>
                              <input type="text" id="mobile" class="form-control" name="mobile" value="<?php echo e(old('mobile')); ?>">
                              <label for="image">Password :</label>
                              <input type="password" class="form-control" id="password" name="password"><br>
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
   <?php echo $__env->make('admin/include/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <!-- ======= Footer ======= -->
</body>

</html>
<script>
   $(document).ready(function() {
      <?php if(session('success')): ?>
      Swal.fire({
         icon: 'success',
         title: 'Success!',
         text: '<?php echo e(session('
         success ')); ?>',
      });
      <?php endif; ?>
   });
</script><?php /**PATH C:\wamp64\www\adminartimanager\resources\views/admin/user.blade.php ENDPATH**/ ?>
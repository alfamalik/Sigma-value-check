 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
         <div class="sidebar-brand-text mx-3">Sigma Value Check</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <?php if ($this->uri->segment(1) == 'admin') : ?>
         <li class="nav-item active">
         <?php else : ?>
         <li class="nav-item">
         <?php endif; ?>
         <a class="nav-link" href="<?= base_url('admin') ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             By Products
         </div>

         <!-- Nav Item - Collapse Menu -->
         <?php if ($this->uri->segment(1) == 'reject') : ?>
             <li class="nav-item active">
             <?php else : ?>
             <li class="nav-item">
             <?php endif; ?>
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                 <i class="fas fa-fw fa-chart-bar"></i>
                 <span>Reject</span>
             </a>
             <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">By Flavour : </h6>
                     <a class="collapse-item" href="<?= base_url('reject/reject_plain') ?>">Plain</a>
                     <a class="collapse-item" href="<?= base_url('reject/reject_chocolate') ?>">Chocolate</a>
                     <a class="collapse-item" href="<?= base_url('reject/reject_nonfat') ?>">Plain Non Fat</a>
                 </div>
             </div>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">


             <!-- Nav Item - Collapse Menu -->
             <?php if ($this->uri->segment(1) == 'datamaster') : ?>
                 <li class="nav-item active">
                 <?php else : ?>
                 <li class="nav-item">
                 <?php endif; ?>
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                     <i class="fas fa-fw fa-folder"></i>
                     <span>Datamaster</span>
                 </a>
                 <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header">By Flavour : </h6>
                         <a class="collapse-item" href="<?= base_url('datamaster/susu_plain') ?>">Plain</a>
                         <a class="collapse-item" href="<?= base_url('datamaster/susu_chocolate') ?>">Chocolate</a>
                         <a class="collapse-item" href="<?= base_url('datamaster/susu_nonfat') ?>">Plain Non Fat</a>
                         <a class="collapse-item" href="<?= base_url('datamaster/susu_all') ?>">All Susu</a>
                     </div>
                 </div>
                 </li>

                 <!-- Divider -->
                 <hr class="sidebar-divider d-none d-md-block">

                 <!-- Heading -->
                 <div class="sidebar-heading">
                     User
                 </div>

                 <!-- Nav Item -->
                 <?php if ($this->uri->uri_string() === 'user') : ?>
                     <li class="nav-item active">
                     <?php else : ?>
                     <li class="nav-item">
                     <?php endif; ?>
                     <a class="nav-link" href="<?= base_url('user') ?>">
                         <i class="fas fa-fw fa-user"></i>
                         <span>My Profile</span></a>
                     </li>

                     <!-- Nav Item -->
                     <?php if ($this->uri->uri_string() === 'user/edit_profile') : ?>
                         <li class="nav-item active">
                         <?php else : ?>
                         <li class="nav-item">
                         <?php endif; ?>
                         <a class="nav-link" href="<?= base_url('user/edit_profile') ?>">
                             <i class="fas fa-fw fa-user-edit"></i>
                             <span>Edit Profile</span>
                         </a>
                         </li>

                         <!-- Divider -->
                         <hr class="sidebar-divider d-none d-md-block">

                         <!-- Sidebar Toggler (Sidebar) -->
                         <div class="text-center d-none d-md-inline">
                             <button class="rounded-circle border-0" id="sidebarToggle"></button>
                         </div>

 </ul>
 <!-- End of Sidebar -->
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">TKN Pembina Mataram</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">
     <!-- Query Menu -->
     <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `tknpm_menu`.`id`, `menu`
                        FROM `tknpm_menu` JOIN `tknpm_access_menu` 
                        ON `tknpm_menu`.`id` = `tknpm_access_menu`.`menu_id`
                        WHERE `tknpm_access_menu`.`role_id` = $role_id 
                        ORDER BY `tknpm_access_menu`.`menu_id` ASC
                        ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>
     <!-- Looping Menu -->
     <?php foreach ($menu as $m) : ?>
         <div class="sidebar-heading">
             <?= $m['menu']; ?>
         </div>
         <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT * FROM `tknpm_sub_menu` 
                            WHERE `menu_id` = $menuId 
                            AND `is_active` = 1
                            ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>
         <?php foreach ($subMenu as $sm) : ?>
             <?php if ($title == $sm['title']) : ?>
                 <li class="nav-item active">

                 <?php else : ?>
                 <li class="nav-item">
                 <?php endif; ?>
                 <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                     <i class="<?= $sm['icon']; ?>"></i>
                     <span><?= $sm['title']; ?></span></a>
             </li>
         <?php endforeach; ?>
         <hr class="sidebar-divider">
     <?php endforeach; ?>
     <!-- SubMenu -->


     <!-- Heading -->
     <div class="sidebar-heading">
         Logout
     </div>



     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->
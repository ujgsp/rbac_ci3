<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link text-center">
        <span class="brand-text font-weight-light">RBAC CI3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->


                <!-- query menu -->
                <?php
                $role_id = $this->session->userdata('role_id');

                $this->db->select('user_menu.id, user_menu.menu');
                $this->db->join('user_access_menu', 'user_menu.id=user_access_menu.menu_id');
                $this->db->from('user_menu');
                $this->db->where('user_access_menu.role_id', $role_id);
                $this->db->order_by('user_access_menu.menu_id', 'ASC');
                $menu = $this->db->get()->result_array();
                // var_dump($menu);
                ?>

                <!-- looping menu -->
                <?php foreach ($menu as $menu_item) : ?>
                    <li class="nav-header"><?= strtoupper($menu_item['menu']); ?></li>

                    <!-- siapkan submenu sesuai menu -->
                    <?php
                    $menu_id = $menu_item['id'];

                    $sub_menu = $this->db->get_where('user_sub_menu', array('menu_id' => $menu_id, 'is_active' => 1))->result_array();
                    ?>

                    <!-- looping submenu berdasarkan menu_id -->
                    <?php foreach ($sub_menu as $sub_menu_item) : ?>
                        <!-- set class menu active by title-->
                        <?php if ($title == $sub_menu_item['title']) {
                            $class_active = 'nav-link active';
                        } else {
                            $class_active = 'nav-link';
                        } ?>

                        <li class="nav-item">
                            <a href="<?= base_url($sub_menu_item['url']); ?>" class="<?= $class_active; ?>">
                                <i class="<?= $sub_menu_item['icon']; ?>"></i>
                                <p>
                                    <?= $sub_menu_item['title']; ?>
                                </p>
                            </a>
                        </li>
                    <?php endforeach; ?>

                <?php endforeach; ?>


                <li class="nav-header">LOGOUT</li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
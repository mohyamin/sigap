    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">

        
        <div class="logo-wrapper green" style="font-weight: bold; font-family: san-serif;">
            <a class="brand-logo darken-1" href="index-2.html">
                <img class="hide-on-med-and-down logo1" src="<?= base_url('assets/image/logo/kabbogor.png'); ?>" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down green-text"><img src="<?= base_url('assets/image/logo/sidebar.png');?>" alt="">
                </span>
            </a>
            <a class="navbar-toggler" href="#">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </div>
      </div>
        <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
            <!-- QUERY MENU -->
           
                <li class="navigation-header"><a class="navigation-header-text"></a><i class="navigation-header-icon material-icons">more_horiz</i>
                </li>


                <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                <?php if($this->session->userdata('level') == "Admin")  : ?>

                        <?php if(current_url() == base_url('Admin/Dashboard')) :  ?>
                            <li class=" bold"><a href="<?= base_url('Admin/Dashboard'); ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=" bold"><a href="<?= base_url('Admin/Dashboard') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                            dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                            </li>

                            <?php if(current_url() == base_url('Admin/AsalSurat')) :  ?>
                            <li class=" bold"><a href="<?= base_url('Admin/AsalSurat'); ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=" bold"><a href="<?= base_url('Admin/AsalSurat') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                                view_list</i><span class="menu-title" data-i18n="Dashboard">Asal Surat</span></a>
                            </li>

                            <?php if(current_url() == base_url('Admin/Klasifikasi')) :  ?>
                            <li class=" bold"><a href="<?= base_url('Admin/Klasifikasi'); ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=" bold"><a href="<?= base_url('Admin/Klasifikasi') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                                view_list</i><span class="menu-title" data-i18n="Dashboard">Klasifikasi</span></a>
                            </li>

                        <?php if(current_url() == base_url('Admin/SuratMasuk')) :  ?>
                             <li class=""><a href="<?= base_url('Admin/SuratMasuk') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                             <li class=""><a href="<?= base_url('Admin/SuratMasuk') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                            local_post_office</i><span class="menu-title" data-i18n="Dashboard"> Surat Masuk</span></a>
                        </li>

                        <?php if(current_url() == base_url('Admin/SuratKeluar')) :  ?>
                            <li class=""><a href="<?= base_url('Admin/SuratKeluar') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=""><a href="<?= base_url('Admin/SuratKeluar') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                                drafts</i><span class="menu-title" data-i18n="Dashboard">Surat Keluar</span></a>
                        </li>
                        
                        <?php if(current_url() == base_url('Admin/ManagementUser')) :  ?>
                            <li class=""><a href="<?= base_url('Admin/ManagementUser') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=""><a href="<?= base_url('Admin/ManagementUser') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                                groups</i><span class="menu-title" data-i18n="Dashboard">Management User</span></a>
                        </li>
                <?php elseif($this->session->userdata('level') == "Camat")  :  ?>
                     <?php if(current_url() == base_url('Camat/Dashboard')) :  ?>
                            <li class=" bold"><a href="<?= base_url('Camat/Dashboard'); ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=" bold"><a href="<?= base_url('Camat/Dashboard') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                                dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                        </li>

                     <?php if(current_url() == base_url('Camat/SuratMasuk')) :  ?>
                             <li class=""><a href="<?= base_url('Camat/SuratMasuk') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                             <li class=""><a href="<?= base_url('Camat/SuratMasuk') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                            local_post_office</i><span class="menu-title" data-i18n="Dashboard"> Surat Masuk</span></a>
                        </li>

                        <?php if(current_url() == base_url('Camat/SuratKeluar')) :  ?>
                            <li class=""><a href="<?= base_url('Camat/SuratKeluar') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=""><a href="<?= base_url('Camat/SuratKeluar') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                                drafts</i><span class="menu-title" data-i18n="Dashboard">Surat Keluar</span></a>
                        </li>
                <?php elseif($this->session->userdata('level') == "Sekcam")  :  ?>
                     <?php if(current_url() == base_url('Sekcam/Dashboard')) :  ?>
                            <li class=" bold"><a href="<?= base_url('Sekcam/Dashboard'); ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=" bold"><a href="<?= base_url('Sekcam/Dashboard') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                        dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                            </li>


                    <?php if(current_url() == base_url('Sekcam/SuratMasuk')) :  ?>
                             <li class=""><a href="<?= base_url('Sekcam/SuratMasuk') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                             <li class=""><a href="<?= base_url('Sekcam/SuratMasuk') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                            local_post_office</i><span class="menu-title" data-i18n="Dashboard"> Surat Masuk</span></a>
                        </li>

                        <?php if(current_url() == base_url('Sekcam/SuratKeluar')) :  ?>
                            <li class=""><a href="<?= base_url('Sekcam/SuratKeluar') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=""><a href="<?= base_url('Sekcam/SuratKeluar') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                                drafts</i><span class="menu-title" data-i18n="Dashboard">Surat Keluar</span></a>
                        </li>
                    <?php elseif($this->session->userdata('level') == "User")  :  ?>
                         <?php if(current_url() == base_url('User/Dashboard')) :  ?>
                            <li class=" bold"><a href="<?= base_url('User/Dashboard'); ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=" bold"><a href="<?= base_url('User/Dashboard') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                        dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                            </li>

                      <?php if(current_url() == base_url('User/SuratMasuk')) :  ?>
                             <li class=""><a href="<?= base_url('User/SuratMasuk') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                             <li class=""><a href="<?= base_url('User/SuratMasuk') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                            local_post_office</i><span class="menu-title" data-i18n="Dashboard"> Surat Masuk</span></a>
                        </li>

                        <?php if(current_url() == base_url('User/SuratKeluar')) :  ?>
                            <li class=""><a href="<?= base_url('User/SuratKeluar') ?>" class="green white-text"> <i class="material-icons white-text">
                        <?php else :  ?>
                            <li class=""><a href="<?= base_url('User/SuratKeluar') ?>" class=" dark-text"> <i class="material-icons dark-text">
                        <?php endif;  ?>
                                drafts</i><span class="menu-title" data-i18n="Dashboard">Surat Keluar</span></a>
                        </li>
                <?php endif; ?>
                
        </ul>
                <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light yellow hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
    <div class="error-data" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>

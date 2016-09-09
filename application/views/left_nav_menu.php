<!--start of Vertical Menu-->
<div style="display:none;" class="navbar-default sidebar" id='menuContainer' role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="sidebar-menu-item">
                <a href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
            </li>

            <!--start menu Items-->
            <?php
            foreach ($data_get_cat as $rows_menuC) {

                $MenuCategory = $rows_menuC->MenuCategory;

                $mnu_Cat_fa = $rows_menuC->font_awesome_icon;

                $mdata = '<li class="sidebar-menu-item">';
                $mdata .= '<a href="#">';
                $mdata .= '<i class="' . $mnu_Cat_fa . '"></i>';
                $mdata .= '&nbsp;' . $MenuCategory . '<span class="fa arrow"></span></a>';

                $mdataSub = '<ul class="nav nav-second-level sidebar-child">';

                foreach ($data_get_subCat as $rows_menuSubC) {
                    $a = $rows_menuSubC->MenuItem;
                    $b = $rows_menuSubC->category;
                    $page = $rows_menuSubC->page;
                    $linkvar = $rows_menuSubC->LinkvalCode;
                    $action = $rows_menuSubC->action;


                    $MenuItem = ($MenuCategory == $b) ? $a : '';
                    /*start submenu item*/
                    if ($MenuItem != '') {
                        $mdataSub .= '<li>';
                        $mdataSub .= '<a href="' . prep_url(oldsite_url) . '' . $page . '?linkvar=' . $linkvar . '&action=' . $action . '&u_id='.$this->session->userdata['user_id'].'"  target="_blank">&nbsp;<i class="fa fa-hand-o-right"></i>
 ' . $MenuItem . '</a>';
                        $mdataSub .= '</li>';
                    } else {
                        $mdataSub .= '';
                    }
                    /*End submenu item*/
                }

                $mdataSub .= '</ul>';

                $mdata .= $mdataSub;

                $mdata .= '<!-- /.nav-second-level -->';
                $mdata .= '</li>';

                echo $mdata;

            }
            ?>
            <!--end menu items-->

        </ul>
    </div>
    <!-- /.sidebar-collapse -->

</div>

<!-- /.navbar-static-side -->
<!--End of Vertical Menu-->

</nav>

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar font-kanit">
            <!-- User Info -->
            <?php 
                echo '
            <div class="user-info">
                <div class="image">
                    <img src="'.$_SESSION['image'].'" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['name']." ".$_SESSION['st_type'].'</div>
                    <div class="email">'.$_SESSION['email'].'</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="/repair-all/pages/member/profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            
                            <li><a href="/repair-all/pages/auth/sign_out.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                ';
            ?>
            
            <!-- #User Info -->
            
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="/repair-all/index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">build</i>
                            <span>แจ้งซ่อม</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/repair-all/pages/repair/computer.php">เครื่องคอมพิวเตอร์เจ้าหน้าที่</a>
                            </li>
                            <li>
                                <a href="/repair-all/pages/repair/computer-classroom.php">เครื่องคอมพิวเตอร์ห้องเรียน</a>
                            </li>
                            <li>
                                <a href="/repair-all/pages/repair/electricity.php">ไฟฟ้าและประปา</a>
                            </li>
                            <li>
                                <a href="/repair-all/pages/repair/air.php">เครื่องปรับอากาศ</a>
                            </li>
                            <li>
                                <a href="/repair-all/pages/repair/test.php">test</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        if($_SESSION['st_status']=='staff' OR $_SESSION['st_status']=='administrator'){
                            
                            $dataMenu = $menuObj->getMenuByStId($_SESSION['st_id']);
                            echo "
                                <li class='header'>MENU STAFF</li>
                            ";
                            foreach($dataMenu as $menu){
                                echo "
                                    <li>
                                        <a href='{$menu['m_link']}'>
                                            <i class='material-icons'>{$menu['m_icon']}</i>
                                            <span>{$menu['m_name']}</span>
                                        </a>
                                    </li>
                                ";
                            }
                            ?>
                            <li>
                                <a href="/repair-all/pages/manage/report.php">
                                    <i class="material-icons">library_books</i>
                                    <span>รายงาน</span>
                                </a>
                            </li>
                            <?php
                        }
                        if($_SESSION['st_status']=='administrator'){
                            ?>
                            <li class="header">MENU ADMIN</li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">swap_calls</i>
                                    <span>Users</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="/repair-all/pages/admin/all-users.php">All</a>
                                    </li>
                                    <li>
                                        <a href="/repair-all/pages/admin/reset-password.php">Reset Password</a>
                                    </li>                               
                                </ul>
                            </li>
                            <li>
                                <a href="/repair-all/pages/admin/menu.php">
                                    <i class="material-icons">list</i>
                                    <span>Menu</span>
                                </a>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
           
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2023 <a href="javascript:void(0);">IT-Science@KMITL by Jamorn Pengsuay</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
       
    </section>
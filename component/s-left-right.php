<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar font-kanit">
            <!-- User Info -->
            <?php 
            if($_SESSION['s_images']==""){
                $image = "user.png";
            }else{
                $image = $_SESSION['s_images'];
            }
                echo '
            <div class="user-info">
                <div class="image">
                    <img src="/repair-sci/images/staff/'.$image.'" width="48" height="48" alt="User" />
                    
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['s_name'].'</div>
                    <div class="email">'.$_SESSION['email'].'</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="/repair-sci/pages/member/profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            
                            <li><a href="/repair-sci/pages/auth/sign_out.php"><i class="material-icons">input</i>Sign Out</a></li>
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
                        <a href="/repair-sci/index.php">
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
                            <?php
                                $dataMenu = $menuObj->getAllMenuShow();
                                foreach($dataMenu as $menu){
                                    if($menu['m_id']==3){
                                        if($_SESSION['d_id']==3 OR $_SESSION['d_id']==4){

                                        }else{
                                            echo "
                                                <li>
                                                    <a href='{$menu['m_link_repair']}'><i class='material-icons fs-12'>{$menu['m_icon']}</i><span class='fs-13'> {$menu['m_name']}</span></a>
                                                </li>
                                            ";
                                        }
                                    }else{
                                        echo "
                                                <li>
                                                    <a href='{$menu['m_link_repair']}'><i class='material-icons fs-12'>{$menu['m_icon']}</i><span class='fs-13'> {$menu['m_name']}</span></a>
                                                </li>
                                            ";
                                    }
                                }
                            ?>
                        </ul>
                    </li>
                    <?php
                        $staffMenu = $menuObj->getMenuByStaff($_SESSION['s_id']);
                        $a = count($staffMenu);
                        if($a>0){
                            echo "
                            <li class='header'>MENU STAFF</li>
                            ";
                            foreach($staffMenu as $smenu){
                                echo "
                                    <li>
                                        <a href='{$smenu['m_link_m_repair']}'>
                                            <i class='material-icons'>{$smenu['m_icon']}</i>
                                            <span>{$smenu['m_name']}</span>
                                        </a>
                                    </li>
                                ";
                            }
                        }
                        
                        $dataReport = $menuObj->getMenuByReportStaff($_SESSION['s_id']);
                        $b = count($dataReport);
                        if($b>0){
                            echo "
                                <li>
                                    <a href='javascript:void(0);' class='menu-toggle'>
                                        <i class='material-icons'>assignment</i>
                                        <span>รายงาน</span>
                                    </a>
                                    <ul class='ml-menu'>
                            ";
                            foreach($dataReport as $smenu){
                                echo "
                                        <li>
                                            <a href='{$smenu['m_link_m_repair']}'>
                                                <i class='material-icons fs-12'>{$smenu['m_icon']}</i>
                                                <span class='fs-12'>{$smenu['m_name']}</span>
                                            </a>
                                        </li>
                                ";
                            }
                            echo "
                                    </ul>
                                </li>
                            ";
                        }
                        
                        if($_SESSION['sts_name']=='Administrator'){
                            echo "
                                <li class='header'>MENU ADMIN</li>
                                <li>
                                    <a href='javascript:void(0);' class='menu-toggle'>
                                        <i class='material-icons'>swap_calls</i>
                                        <span>Users</span>
                                    </a>
                                    <ul class='ml-menu'>
                                        <li>
                                            <a href='/repair-sci/pages/admin/all-users.php'>All</a>
                                        </li>
                                        <li>
                                            <a href='/repair-sci/pages/admin/reset-password.php'>Reset Password</a>
                                        </li>                               
                                    </ul>
                                </li>
                                <li>
                                    <a href='/repair-sci/pages/admin/menu.php'>
                                        <i class='material-icons'>list</i>
                                        <span>Menu</span>
                                    </a>
                                </li>
                            ";
                        }
                    ?>
                    
                    <li class="header">ข้อมูลส่วนตัว</li>
                    <li>
                        <a href='/repair-sci/pages/member/profile.php'>
                            <i class='material-icons'>person</i>
                            <span>ข้อมูลส่วนตัว</span>
                        </a>
                    </li>
                    <li>
                        <a href="/repair-sci/pages/auth/sign_out.php">
                            <i class="material-icons">input</i>
                            <span>ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
            </div>
           
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2023 <a href="javascript:void(0);">IT-Science@KMITL by Jamorn Pengsuay</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.1
                </div>
                <div id="css_time_run">
                
                </div>
            </div>
            <!-- #Footer -->
        </aside>
       
    </section>
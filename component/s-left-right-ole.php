
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
                        
                    ?>
                    <?php
                        if($_SESSION['st_status']=='staff' OR $_SESSION['st_status']=='administrator'){
                            echo "
                                <li class='header'>MENU STAFF</li>
                            ";
                            if($_SESSION['st_type']=='electricity' OR $_SESSION['st_status']=='administrator' OR $_SESSION['st_type']=='building'){
                                ?>
                                <li>
                                    <a href="/repair-all/pages/manage/m_electricity.php">
                                        <i class="material-icons">layers</i>
                                        <span>ไฟฟ้าและประปา</span>
                                    </a>
                                </li>
                                <?php
                            }
                            if($_SESSION['st_type']=='computer' OR $_SESSION['st_status']=='administrator'){
                                ?>
                                <li>
                                    <a href="/repair-all/pages/manage/m_electricity.php">
                                        <i class="material-icons">layers</i>
                                        <span>คอมพิวเตอร์เจ้าหน้าที่</span>
                                    </a>
                                </li>
                                <?php
                            }
                            if($_SESSION['st_type']=='classroom' OR $_SESSION['st_status']=='administrator'){
                                ?>
                                <li>
                                    <a href="/repair-all/pages/manage/m_electricity.php">
                                        <i class="material-icons">layers</i>
                                        <span>คอมพิวเตอร์ห้องเรียน</span>
                                    </a>
                                </li>
                                <?php
                            }
                            if($_SESSION['st_type']=='air' OR $_SESSION['st_status']=='administrator' OR $_SESSION['st_type']=='building'){
                                ?>
                                <li>
                                    <a href="/repair-all/pages/manage/m_electricity.php">
                                        <i class="material-icons">layers</i>
                                        <span>เครื่องปรับอากาศ</span>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                    ?>
                                <li>
                                    <a href="/repair-all/pages/manage/report.php">
                                        <i class="material-icons">library_books</i>
                                        <span>รายงาน</span>
                                    </a>
                                </li>
                    <?php
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
                                    <li>
                                        <a href="/repair-all/pages/admin/menu.php">Menu</a>
                                    </li>
                                    <li>
                                        <a href="/repair-all/pages/admin/manage.php">Manage</a>
                                    </li>
                                   
                                </ul>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <?php
            
                if($_SESSION['st_status']=='admin'){
                    ?>
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
                            <a href="/repair-all/pages/typography.html">
                                <i class="material-icons">text_fields</i>
                                <span>Typography</span>
                            </a>
                        </li>
                        <li>
                            <a href="/repair-all/pages/helper-classes.html">
                                <i class="material-icons">layers</i>
                                <span>Helper Classes</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">widgets</i>
                                <span>Widgets</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span>Cards</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="/repair-all/pages/widgets/cards/basic.html">Basic</a>
                                        </li>
                                        <li>
                                            <a href="/repair-all/pages/widgets/cards/colored.html">Colored</a>
                                        </li>
                                        <li>
                                            <a href="/repair-all/pages/widgets/cards/no-header.html">No Header</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span>Infobox</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="/repair-all/pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                        </li>
                                        <li>
                                            <a href="/repair-all/pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                        </li>
                                        <li>
                                            <a href="/repair-all/pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                        </li>
                                        <li>
                                            <a href="/repair-all/pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                        </li>
                                        <li>
                                            <a href="/repair-all/pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">swap_calls</i>
                                <span>User Interface (UI)</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/repair-all/pages/ui/alerts.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/animations.html">Animations</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/badges.html">Badges</a>
                                </li>

                                <li>
                                    <a href="/repair-all/pages/ui/breadcrumbs.html">Breadcrumbs</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/collapse.html">Collapse</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/colors.html">Colors</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/dialogs.html">Dialogs</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/icons.html">Icons</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/labels.html">Labels</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/list-group.html">List Group</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/media-object.html">Media Object</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/modals.html">Modals</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/pagination.html">Pagination</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/preloaders.html">Preloaders</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/progressbars.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/range-sliders.html">Range Sliders</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/sortable-nestable.html">Sortable & Nestable</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/tabs.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/thumbnails.html">Thumbnails</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/tooltips-popovers.html">Tooltips & Popovers</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/ui/waves.html">Waves</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">assignment</i>
                                <span>Forms</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/repair-all/pages/forms/basic-form-elements.html">Basic Form Elements</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/forms/advanced-form-elements.html">Advanced Form Elements</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/forms/form-examples.html">Form Examples</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/forms/form-validation.html">Form Validation</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/forms/form-wizard.html">Form Wizard</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/forms/editors.html">Editors</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Tables</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/repair-all/pages/tables/normal-tables.html">Normal Tables</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/tables/jquery-datatable.html">Jquery Datatables</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/tables/editable-table.html">Editable Tables</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">perm_media</i>
                                <span>Medias</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/repair-all/pages/medias/image-gallery.html">Image Gallery</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/medias/carousel.html">Carousel</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">pie_chart</i>
                                <span>Charts</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/repair-all/pages/charts/morris.html">Morris</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/charts/flot.html">Flot</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/charts/chartjs.html">ChartJS</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/charts/sparkline.html">Sparkline</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/charts/jquery-knob.html">Jquery Knob</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">content_copy</i>
                                <span>Example /m/Pages</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/repair-all/pages/examples/profile.html">Profile</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/examples/sign-in.html">Sign In</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/examples/sign-up.html">Sign Up</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/examples/forgot-password.html">Forgot Password</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/examples/blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/examples/404.html">404 - Not Found</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/examples/500.html">500 - Server Error</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">map</i>
                                <span>Maps</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/repair-all/pages/maps/google.html">Google Map</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/maps/yandex.html">YandexMap</a>
                                </li>
                                <li>
                                    <a href="/repair-all/pages/maps/jvectormap.html">jVectorMap</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">trending_down</i>
                                <span>Multi Level Menu</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Menu Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Menu Item - 2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span>Level - 2</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span>Menu Item</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="menu-toggle">
                                                <span>Level - 3</span>
                                            </a>
                                            <ul class="ml-menu">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span>Level - 4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/repair-all/pages/changelogs.html">
                                <i class="material-icons">update</i>
                                <span>Changelogs</span>
                            </a>
                        </li>
                        <li class="header">LABELS</li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons col-red">donut_large</i>
                                <span>Important</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons col-amber">donut_large</i>
                                <span>Warning</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons col-light-blue">donut_large</i>
                                <span>Information</span>
                            </a>
                        </li>
                    </ul>
                </div>
                    <?php
                }
            ?>
            <!-- Menu -->
           
            <!-- #Menu -->
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
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside> -->
        <!-- #END# Right Sidebar -->
    </section>
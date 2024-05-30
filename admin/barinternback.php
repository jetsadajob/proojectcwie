<!-- Main CSS  -->
<!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- เมนู bar -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left text-decoration-none">
            <a href="./addmin.php" class="logo text-decoration-none">
                <img src="./assets/img/profiles/icon.png" width="40" height="40" alt=""><span
                    class="university">cpkku-cwie</span>
            </a>
        </div>
        <!-- /Logo -->

        <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

        <!-- Header Menu -->
        <ul class="nav user-menu">

            <!-- ตั้งค่า โปรไฟล์ ออกจากระบบ -->
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img"><img src="assets/img/profiles/icon.png" alt="">
                        <span class="status online"></span></span>

                    <span>Admin</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">My Profile</a>
                    <!-- <a class="dropdown-item" href="settings.html">Settings</a> -->
                    <a class="dropdown-item" href="./register/logout.php">Logout</a>
                </div>
            </li>
            <!--/ ตั้งค่า โปรไฟล์ ออกจากระบบ -->

        </ul>
        <!-- /Header Menu -->

        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown" aria-expanded="true"><i
                    class="fa fa-ellipsis-v" style="color: gray;"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </div>
        <!-- /Mobile Menu -->

    </div>
    <!-- /เเทบเมนู -->

    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                    </li>
                    <li class="submenu">
                        <a class="text-decoration-none" href="./detilinterns.php">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                            </svg> 
                            <span> ย้อนกลับ</span> 
                        </a>

                    </li>

                    <!-- <li class="submenu">
                        <a class="text-decoration-none"  href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-layout-text-window-reverse" viewBox="0 0 16 16">
                                <path d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z" />
                                <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z" />
                            </svg> <span> จัดการเว็บไซต์</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="./calender/calendar.php">จัดการปฏิทิน</a></li>
                            <li><a href="#">จัดการหน้าดาวน์โหลด</a></li>
                        </ul>
                    </li> -->

                    <!-- <li class="submenu">
                        <a class="text-decoration-none" href="#" class="noti-dot"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            </svg> <span> นักศึกษา</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="liststudentscoop.php">นักศึกษาสหกิจศึกษา</a></li>
                            <li><a href="liststudentinterns.php">นักศึกษาฝึกงาน</a></li>
                            <!-- <li><a href="#">สถานประกอบการ</a></li> 
                        </ul>
                    </li> 

                    <!-- <li class="submenu">
                        <a class="text-decoration-none" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                                class="bi bi-person-video3" viewBox="0 0 16 16">
                                <path
                                    d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z" />
                                <path
                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z" />
                            </svg> <span> อาจารย์ </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a class="text-decoration-none" href="advisor.php">อาจารย์ที่ปรึกษา</a></li>
                            <li><a class="text-decoration-none" href="supervisor.php">อาจารย์นิเทศ</a></li>

                        </ul>
                    </li> -->
                    <!-- <li class="submenu">
                        <a class="text-decoration-none" class="text-decoration-none  href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                                class="bi bi-buildings" viewBox="0 0 16 16">
                                <path
                                    d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                <path
                                    d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                            </svg> <span> สถานประกอบการ </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="hr.php">ลงประกาศรับสมัครงาน</a></li>
                            

                        </ul>
                    </li> -->
                    <!-- <li class="submenu">
                        <a class="text-decoration-none" class="text-decoration-none href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                                class="bi bi-file-earmark-ruled" viewBox="0 0 16 16">
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h7v1a1 1 0 0 1-1 1H6zm7-3H6v-2h7v2z" />
                            </svg> <span> แบบฟอร์มสหกิจ </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="submitcooperative.php"> นักศึกษาที่สมัครสหกิจศึกษา </a></li>
                            <li><a href="submitdoccoop.php"> นักศึกษาดำเนินการสหกิจศึกษา </a></li>
                            
                        </ul>
                    </li> -->


                    <!-- <li class="submenu">
                        <a class="text-decoration-none" class="text-decoration-none href="#"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                                class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                            </svg> <span> แบบฟอร์มฝึกงาน </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="submitinternship.php"> นักศึกษาที่สมัครฝึกงาน </a></li>
                            <li><a href="submitdocinternship.php"> นักศึกษาดำเนินการฝึกงาน </a></li>
                            <li><a href="#"> ประวัตินักศึกษา </a></li>
                            <li><a href="#"> ใบรับรองการฝึกงาน </a></li>
                            <li><a href="#"> แบบประเมินการฝึกงาน </a></li>
                        </ul>
                    </li> -->

                </ul>

                <!-- <ul>
                <li>
                    <a href="./register/logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left " viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                         <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg> <span>ออกจากระบบ</span>
                    </a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
    <!-- /สไลด์บลา -->
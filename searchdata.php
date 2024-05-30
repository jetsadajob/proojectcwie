<?php
include './admin/work/dbwork.php';

// $searchdata=$_POST ['recruitment_company_role'];
// $sql = "SELECT * FROM job_recruitment WHERE recruitment_company_role LIKE '%$searchdata%' ORDER BY recruitment_company_role ASC";
 //เลือกข้อมูลจากตาราง employee ออกมาแสดง

// $result = mysqli_query($conn, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

// $count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
// $order = 1; //ให้เริ่มนับแถวจากเลข 1

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <title>ค้นหางาน</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="./admin/assets/img/profiles/icon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Google Fonts -->
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet"> -->

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="./css/searchjob.css" rel="stylesheet">

    <link rel="stylesheet" href="CSS/style.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./admin/assets/css/style.css">
    <link rel="stylesheet" href="./admin/assets/css/addwork.css">
    <link rel="stylesheet" href="./admin/assets/css/work.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
 

    <!-- endinject -->
    <link rel="shortcut icon" href="/Computing_KKU.svg.png" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  align-items-center">
        <div class="container d-flex justify-content-between">

        <?php include('nav_index.php') ;?>
        
        </div>
    </header><!-- #header -->

    <!-- ======= Header ======= -->

    <main class="container">

        <div class="contop">
            <div class="p-1 p-md-2 mb-3 mt-3 border rounded shadow-sm h-md-250">
                <div class="iconsearch d-flex">
                    <div class="icon"><i class="bi bi-search "></i></div></i>&nbsp;&nbsp;
                    <h5 class="mb-1">ค้นหาสถานประกอบการ</h5>
                </div>

            </div>
        </div>
        


        <div class="con1 row mb-2">
            <div class="col-md-3">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                        <form action="searchdata.php" metthod="POST">

                            <div class=" mb-3">
                                <label for="exampleDataList" class="form-label">ชื่อบริษัท</label>
                                <input type="text" class="form-control" list="datalistOptions" name="searchdata" placeholder="ชื่อบริษัท.." require>
                                <datalist id="datalistOptions">
                                    <option value="San Francisco">
                                    <option value="New York">
                                    <option value="Seattle">
                                    <option value="Los Angeles">
                                    <option value="Chicago">
                                </datalist>
                            </div>

                            <div class=" mb-3">
                                <label for="exampleDataList" class="form-label">สถานที่ทำงาน</label>
                                <select class="form-select" id="company">
                                    <option selected>ทั้งหมด</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class=" mb-3">
                                <label for="exampleDataList" class="form-label">ประเภทงาน</label>
                                <select class="form-select" id="company">
                                    <option selected></option>
                                    <option value="1">UX/UI,Mobile DeveloperOne</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <label for="exampleDataList" class="form-label">เงินเดือน</label>
                            <div class="input-group mb-3">

                                <select class="form-select" id="company">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>&nbsp;ถึง&nbsp;

                                <select class="form-select " id="company">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info ">ค้นหา</button>

                        </form>


                    </div>

                </div>
            </div>

            <!-- บล๊อคงานที่ค้นหา -->
            


            <div class="col-md-9">

                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <div class=" row col-4">
                            <div class="input-group col-4 mb-1 ">
                                <label for="exampleDataList" class="form-label">เรียงตาม</label>&nbsp;&nbsp;
                                <select class="form-select" id="company">
                                    <option selected></option>
                                    <option value="1">UX/UI,Mobile DeveloperOne</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </div>

                        </div>
                        <h6 class=" pb-1 border-bottom item"></h6>

                        <?php
                        $sql = "SELECT * FROM job_recruitment";
                        $result=mysqli_query($conn,$sql);
                        while ($row=mysqli_fetch_array($result)){  
                        ?>
                


				<div class="blog">
                    
                    <div class="blog-image">
                        <a href="#"><img src="./admin/assets/img/img1.svg" alt=""></a>
                    </div>
                    <div class="blog-meta">
                
                        <h3 class="blog-title"><a href="#"><?= $row["recruitment_company_role"]?></a></h3>
                        <div class="blog-top">
                            <a href="#" class="cat"><?= $row["recruitment_type_company"]?></a>
                            <span class="date"><i class="bx bxs-time"></i>14 สิงหาคม 2566</span>
                        </div>
                        <div class="blog-desc">
                            <i class='bx bxs-school'></i>
                            <span class="detail"><?= $row["recruitment_company_name"]?></span>
                        </div>
                        <div class="blog-desc">
                            <i class='bx bxs-map'></i>
                            <span class="detail"><?= $row["recruitment_company_location"]?>&nbsp;&nbsp;<i class="bx bxs-dollar-circle"></i>&nbsp;<?= $row["recruitment_company_experienc"]?></span>
                        </div>
                       
						

                    </div>
                </div>
	
				<?php
				}
				// mysql_close($conn);  //ปิดการเชื่อมต่อข้อมูล
				?>

                    
                   


                <!-- <div class="box-carblogs-blog">
                    <div class="blog">
                        <div class="blog-image">
                            <a href="#"><img src="./assets/img/img1.svg" alt=""></a>
                        </div>
                        <div class="blog-meta">
                            <div class="blog-top">
                                <a href="#" class="cat">programmer</a>
                                <span class="date"><i class="bx bxs-time"></i>1 มกราคม 2566</span>
                            </div>
                            <h3 class="blog-title"><a href="#">นักศึกษาสหกิจศึกษา และผู้สำเร็จการศึกษา</a></h3>

                            <div class="blog-desc">
                                <i class='bx bxs-school'></i>
                                <span class="detail">บริษัท ซีพีออลล์ จำกัด (มหาชน)</span>
                            </div>
                            <div class="blog-desc">
                                <i class='bx bxs-map'></i>
                                <span class="detail">313 อาคาร ซี.พี. ทาวเวอร์ ชั้น 24 ถ.สีลม แขวงสีลม เขตบางรัก
                                    กรุงเทพฯ
                                    10500</span>
                            </div>
                            <div class="blog-bottom">
                                <div class="user">
                                    <div class="avatars">
                                        <a href="#" class="edit"><i class="bx bxs-pencil"></i></a>
                                        <a href="#" class="delete"><i class="bx bxs-trash"></i></a>
                                        
                                    </div>
                                </div>
                                <a href="#" class="readmore">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="blog">
                        <div class="blog-image">
                            <a href="#"><img src="./assets/img/img2.svg" alt=""></a>
                        </div>
                        <div class="blog-meta">
                            <div class="blog-top">
                                <a href="#" class="cat">PRODUCTIVITY</a>
                                <span class="date"><i class="bx bxs-time"></i>30 มกราคม 2566</span>
                            </div>
                            <h3 class="blog-title"><a href="#">นักศึกษาฝึกงาน</a></h3>
                            <div class="blog-desc">
                                <i class='bx bxs-school'></i>
                                <span class="detail">บริษัท ปตท. จำกัด (มหาชน)</span>
                            </div>
                            <div class="blog-desc">
                                <i class='bx bxs-map'></i>
                                <span class="detail">555 ถนนวิภาวดีรังสิต แขวงจตุจักร เขตจตุจักร กรุงเทพมหานคร
                                    10900</span>
                            </div>
                            <div class="blog-bottom">
                                <div class="user">
                                    <div class="avatars">
                                        <a href="#" class="edit"><i class="bx bxs-pencil"></i></a>
                                        <a href="#" class="delete"><i class="bx bxs-trash"></i></a>
                                        <
                                    </div>
                                </div>
                                <a href="#" class="readmore">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </div> -->

                
                 </div>

                </div>
                </div>
            </div>
            

                


                

                

            </div>
        </div>
    </main>





    <script src="./index.js"></script>





</body>

</html>
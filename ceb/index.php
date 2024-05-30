<?php
include './admin/work/dbwork.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <title>สหกิจศึกษา วิทยาลัยการคอมพิวเตอร์</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="./admin/assets/img/profiles/icon.png">
    <link href="./admin/assets/img/profiles/favicon.png" rel="icon">
    <link href="./admin/assets/img/profiles/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="./addmin/assets/css/font.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">


    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="./css/index.css" rel="stylesheet">

    <link rel="stylesheet" href="./CSS/style.css">

    <link rel="stylesheet" href="style.css">



    <!-- endinject -->
    <link rel="shortcut icon" href="/Computing_KKU.svg.png" />

    <link rel="stylesheet" href="./css/_swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />



</head>

<body>

    <!-- ======= Top Bar =======
  <section id="topbar" class="d-md-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-geo-alt-fill d-flex align-items-center"><a
            href="https://computing.kku.ac.th/index">วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</a></i>
        <i class="bi bi-telephone-fill d-flex align-items-center ms-4"><span>043-009700 ต่อ 50525</span></i>
      </div>
      <div class="contact-box d-none d-md-flex align-items-center">
        <a class="getstarted" href="./pages/samples/login.html"><i class="bi bi-person-circle"></i> เข้าสู่ระบบ /
          สมัครสมาชิก</a>
        <a class="getstarted" href="#about"><i class="bi bi-people-fill"></i> นักศึกษาฝึกงาน / นักศึกษาสหกิจ</a>

      </div>

    </div>
  </section> -->


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  align-items-center">
        <div class="container d-flex justify-content-between">

            <?php include('nav_index.php') ;?>

        </div>
    </header><!-- #header -->
    <!-- ======= Header ======= -->



    <main class="container">
        <div class="con1 ">
            <div class="pox">
                <div class="text ms-4 mb text-center ">
                    <div class="photo"><img src="./images/room2.png" class="img-fluid mt-1 rounded"
                            alt="Responsive image"></div>
                </div>
            </div>
        </div>
    </main>



    <main class="container">
        <div class="con1 row mb-1 mt-4">
            <div class="col-md-9">
                <div class="tab">
                    <div class="icon"><i class="bi bi-person-vcard"></i></div>
                    <div class="texttop">
                        <p>รับสมัครงาน</p>
                    </div>
                </div>

                <div class=" position-relative">
                    <div class="col d-flex flex-column position-static">
                        
                        <div class="con2">

                            <div class="slide-container ">

                                <div class="slide-content">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">

                                            <?php
                                            $sql = "SELECT * FROM job_recruitment";
                                            $result=mysqli_query($conn,$sql);
                                            while ($row=mysqli_fetch_array($result)){  
                                            ?>
                                            <div class="swiper-slide">
                                                <div class="card-wrapper ">
                                                    <div class="card">
                                                        <div class="product-card">
                                                            <div class="main-images">
                                                                <img id="" class="active"
                                                                    src="./admin/assets/img/img2.svg" alt="" >
                                                            </div>

                                                            <!-- <?php if (file_exists('./uploads/' . $row["recruitment_id"] . '.png')) : ?>
                                                            <img class="thumbnail" src="./admin/work/uploads/<?= $row["recruitment_id"] ?>.png"width="120" height="120" alt="" style="margin:0px;">
                                                            <?php else : ?>
                                                            <img src="<?php echo $row["recruitment_company_image"]; ?>"  width="120" height="120" alt="" style="margin:0px;">
                                                            <?php endif; ?> -->


                                                            <div class="shoe-details">
                                                                <div class="shoe_name">
                                                                    <?= $row["recruitment_company_name"]?></div>
                                                                <p> <?= $row["recruitment_type_company"]?></p>

                                                            </div>

                                                            <div class="button">
                                                                <div class="button-layer"></div>
                                                                <a
                                                                    href="detailwork.php?id=<?=$row["recruitment_id"]?>"><button>อ่านรายละเอียด</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div><br>

                                        <div class="swiperedit">
                                            <div class="swiper-pagination "></div>
                                        </div>
                                    </div>
                                    <!-- <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div> -->
                                </div>
                            </div>
                        </div>


                        <div class="tab">
                            <div class="icon"><i class="bi bi-newspaper"></i>></i></div>
                            <div class="texttop">
                                <p>ข่าวประชาสัมพันธ์</p>
                            </div>
                        </div>
                        <div class="row g-0 border rounded overflow-hidden  flex-md-row mb-8 shadow-sm h-md-250 position-relative">
                            <div class="wrapper">

                                <input type="radio" name="slider" checked id="home">
                                <input type="radio" name="slider" id="blog">
                                <input type="radio" name="slider" id="code">
                                <input type="radio" name="slider" id="help">
                                <input type="radio" name="slider" id="about">
                                <nav>
                                    <label for="home" class="home"><i
                                            class="fa-solid fa-person-chalkboard"></i></i>สหกิจศึกษา</label>
                                    <label for="blog" class="blog"><i
                                            class="fa-solid fa-briefcase"></i></i>ฝึกงาน</label>
                                    <label for="code" class="code"><i
                                            class="fa-solid fa-landmark"></i>สถานประกอบการ</label>
                                    <label for="help" class="help"><i class="bi bi-person-square"></i>อาจารย์</label>
                                    <label for="about" class="about"></label>
                                    <div class="slider"></div>
                                </nav>
                                <section>
                                    <div class="content content-1">

                                        <div class="con2">
                                            <div class="slide-container ">
                                                <div class="slide-content">
                                                    <div class="swiper mySwiper">
                                                        <div class="swiper-wrapper">

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ขั้นตอนการขอหนังสือขอความเคราะห์รับนักศึกษาเข้าปฏิบัติสหกิจศึกษา
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p>เอกสารประกันภัยในต่างประเทศ(เฉพาะนักศึกษาสหกิจศึกษา)         

                                                                                        
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ขอเชิญเข้าร่วมอบรมเตรียมความพร้อมก่อนออกปฏิบัติสหกิจศึกษา
                                                                                    ระหว่าง...      </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ยื่นความประสงค์ฝึกงาน <br><br><br>
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ยื่นความประสงค์สหกิจศึกษา
                                                                                    <br><br><br>
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                        </div><br>
                                                        <div class="swiperedit">
                                                            <div class="swiper-pagination "></div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="content content-2">
                                        <div class="con2">
                                            <div class="slide-container ">
                                                <div class="slide-content">
                                                    <div class="swiper mySwiper">
                                                        <div class="swiper-wrapper">

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ขั้นตอนการขอหนังสือขอความเคราะห์รับนักศึกษาเข้าปฏิบัติสหกิจศึกษา
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> เอกสารประกันภัยในต่างประเทศ(เฉพาะนักศึกษาสหกิจศึกษา)
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ขอเชิญเข้าร่วมอบรมเตรียมความพร้อมก่อนออกปฏิบัติสหกิจศึกษา
                                                                                    ระหว่าง...</p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ยื่นความประสงค์ฝึกงาน <br><br><br>
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ยื่นความประสงค์สหกิจศึกษา
                                                                                    <br><br><br>
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="swiperedit">
                                                            <div class="swiper-pagination "></div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content content-3">
                                        <div class="con2">
                                            <div class="slide-container ">
                                                <div class="slide-content">
                                                    <div class="swiper mySwiper">
                                                        <div class="swiper-wrapper">

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ขั้นตอนการขอหนังสือขอความเคราะห์รับนักศึกษาเข้าปฏิบัติสหกิจศึกษา
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p>เอกสารประกันภัยในต่างประเทศ(เฉพาะนักศึกษาสหกิจศึกษา)
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ขอเชิญเข้าร่วมอบรมเตรียมความพร้อมก่อนออกปฏิบัติสหกิจศึกษา
                                                                                    ระหว่าง...</p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ยื่นความประสงค์ฝึกงาน <br><br><br>
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="card-wrapper ">
                                                                    <div class="card ">
                                                                        <div class="product-card">
                                                                            <div class="main-image">
                                                                                <img id="" class="active"
                                                                                    src="./images/logo.png" alt="">

                                                                            </div>
                                                                            <div class="shoe-details">
                                                                                <span
                                                                                    class="shoe_name">วิทยาลัยการคอมพิวเตอร์</span>
                                                                                <p> ยื่นความประสงค์สหกิจศึกษา
                                                                                    <br><br><br>
                                                                                </p>

                                                                            </div>

                                                                            <div class="button">
                                                                                <div class="button-layer"></div>
                                                                                <button>อ่านรายละเอียด</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div><br>
                                                        <div class="swiperedit">
                                                            <div class="swiper-pagination "></div>
                                                        </div>


                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="content content-4">


                                    </div>
                                    <div class="content content-5">

                                    </div>
                                </section>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>


            <!-- แทบขวา -->
            <div class="col-md-3  ">
                <div class="row g-0 ">
                    <div class="col p-1 d-flex flex-column ">
                        <div class=" shadow-sm h-md-250 position-relative ">
                            <div class="col p-2 d-flex flex-column position-static">


                              <a type="button" class="btn btn-primary p-2  mb-2 "
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                    href="./login_student.php">
                                    <i class="bi bi-people-fill"></i> นักศึกษา
                                </a>

                                <a type="button" class="btn btn-primary p-2  mb-2 "
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                    href="./teacher/supervision_teacher/supervision_teacher_home.php">
                                    <i class="bi bi-people-fill"></i> อาจารย์
                                </a>

                                <a type="button" class="btn btn-primary p-2  mb-2 "
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                    href="./company/hr/hr_dashboard.php">
                                    <i class="bi bi-person-circle"></i> สถานประกอบการ
                                </a>

                                <a type="button" class="btn btn-primary p-2  mb-2 "
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                    href="./admin/addmin.php">
                                    <i class="bi bi-person-circle"></i> สำหรับผู้ดูแลระบบ
                                </a>

                            </div>

                        </div>

                        <div class="calendarr ">
                            <div class="wrapperr border rounded">
                                <header>
                                    <p class="current-date"></p>
                                </header>
                                <div class="calendar ">
                                    <ul class="weeks">
                                        <li>Sun</li>
                                        <li>Mon</li>
                                        <li>Tue</li>
                                        <li>Wed</li>
                                        <li>Thu</li>
                                        <li>Fri</li>
                                        <li>Sat</li>
                                    </ul>
                                    <ul class="days"></ul>
                                </div>
                                <a href="calender.php">กิจกรรมทั้งหมด</a>
                            </div>

                        </div>

                        <div class="followtab ">
                            <div class="followtabtext"><i class="bi bi-rss"></i> ติดตาม</div>
                        </div>

                        <div class="followinfor">
                            <div class="followphoto">
                                <!-- <img src="./images/follow.jpg" class="" alt="Responsive image" width="100%" height="100%"> -->
                                <div class="boxfollow">
                                    <div class="boxlogo">
                                        <img src="./Computing_KKU.svg.png" alt="">
                                        <p>College of Comput...</p>
                                        <div class="like"><a
                                                href="https://www.facebook.com/computing.kku/friends_likes/"
                                                role="link"> 7.3
                                                พัน ถูกใจ</a></div>
                                    </div>

                                    <div class="boxicon">
                                        <div class="facebook">

                                            <button> <a href="https://www.facebook.com/computing.kku"><i
                                                        class="bi bi-facebook"></i> ถูกใจเพจ
                                        </div></a></button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <a type="button" class="btn btn-primary p-2 p-md- mb-2 "
                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                        href="searchjob.php">
                        <i class="bi bi-search"></i> ค้นหางาน
                    </a>

                    <!-- <a type="button" class="btn btn-primary p-2 p-md- mb-2 "
                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                        href="#">
                        <i class="fa-solid fa-business-time"></i> ลงเวลาฝึกงาน
                    </a> -->

                </div>
            </div>
        </div>


        
        



    </main>

    </div>

    <div class="footer d-flex align-items-center justify-content-center py-3" data-v-064a8820="">
        <div class="mx-2" data-v-064a8820="">College of Computing Khon Kaen University</div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 15,
        // loop: true,
        centerSlide: 'true',
        fade: 'true',
        grabCursor: 'true',
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            520: {
                slidesPerView: 2,
            },
            950: {
                slidesPerView: 3,
            },
            950: {
                slidesPerView: 4,
            },
        },
    });
    </script>

    <script src="./index.js"></script>
    <script src="./js/swiper.js"></script>
    <script src="script.js"></script>

</body>

</html>
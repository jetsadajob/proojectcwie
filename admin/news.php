<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข่าวประชาสัมพันธ์</title>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/profiles/Computing_KKU.svg.png">
    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="./assets/css/line-awesome.min.css">

    <!-- textediter CSS -->
    <!-- <link rel="stylesheet" href="./assets/css/textediter.css">
    <link rel="stylesheet" href="./assets/js/textediter.css"> -->

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/6wxmqlsq4k922xfv2n3ztl11bwqdayixb7n36bwtk4qabmi5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style2.css">


    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace visualblocks wordcount preview code fullscreen insertdatetime ',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat  | alignleft aligncenter alignright alignjustify | undo redo ',
            language_url: './assets/js/th_TH.js',
            language: 'th_TH',



            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,

            images_upload_url: './news.php',
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            images_file_types: 'jpg,svg,webp,jpeg,png,gif',
            /* and here's our custom image picker*/
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'




        });
    </script>


</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('./nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">
        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <ul class="breadcrumb mt-5">
                        <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                        <li class="breadcrumb-item ">แบบฟอร์มสหกิจ</li>
                        <li class="breadcrumb-item ">นักศึกษาที่ยื่นคำร้องสหกิจศึกษา</li>
                        <li class="breadcrumb-item ">รายละเอียด</li>
                            <li class="breadcrumb-item active">จัดการข่าวประชาสัมพันธ์</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">


                    <!-- Page Header -->
                    <div class="head-title">
                        <div class="left">
                            <h6 class="page-title">จัดการข่าวประชาสัมพันธ์</h6>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form onsubmit="return validateAddnewsForm()" action="./news/addnews.php" method="POST" enctype="multipart/form-data" name="addform" class="form-horizontal" id="addform">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="img" class="form-label">รูปภาพปก (ถ้ามี)</label>
                                                <input class="form-control" type="file" id="img" name="img">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-2">หัวข้อข่าว</div>
                                            <div class="col-sm-12">
                                                <input name="title" id="title" type="text" required class="form-control" placeholder="หัวข้อข่าว" onblur="checkInput()" />
                                                <small id="titleError" style="color: red; display: none;">กรุณากรอกข้อมูลที่ไม่ใช่ค่าว่าง</small>
                                                <small id="titleSpaceError" style="color: red; display: none;">ห้ามกรอกเฉพาะเว้นวรรคเท่านั้น</small>
                                            </div>
                                        </div>

                                        <script>
                                            function checkInput() {
                                                var titleInput = document.getElementById("title").value;
                                                if (!titleInput.trim()) {
                                                    document.getElementById("titleError").style.display = "block";
                                                } else {
                                                    document.getElementById("titleError").style.display = "none";
                                                }
                                            }
                                        </script>



                                        <div class="form-group">
                                            <div class="row"></div>
                                            <div class="col-sm-2">รายละเอียด</div>
                                            <div class="col-md-12">
                                                <textarea name="txtMessage" id="txtMessage"></textarea>
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="file" class="form-label">ไฟล์เพิ่มเติม (ถ้ามี)</label>
                                                <input class="form-control" type="file" id="file" name="file">
                                            </div>
                                        </div>

                                        <div class=" text-right">
                                            <button type="submit" class="btn btn-success" onclick="return validateAddnewsForm()" id="btn">บันทึก</button>
                                            <a href="./tablenews.php"><button type="button" class="btn btn-danger" id="btn">ยกเลิก</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateAddnewsForm() {
            var fields = ["title"];

            for (var i = 0; i < fields.length; i++) {
                var fieldValue = document.getElementById(fields[i]).value.trim();
                if (fieldValue === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                        text: 'ห้ามกรอกข้อมูลที่เป็นช่องว่าง',
                    });
                    return false;
                }
            }
            return true;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Select2 JS -->
    <script src="assets/js/select2.min.js"></script>

    <!-- Datatable JS -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <!-- Datetimepicker JS -->
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
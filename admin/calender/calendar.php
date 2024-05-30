<?php
require_once('connect.php');


$sql = "SELECT * FROM events ";
// $result = mysqli_query( $bdd, $sql);

// $row = mysqli_fetch_array($result);

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

setlocale(LC_TIME, 'th_TH.utf8');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>จัดการปฏิทิน</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/addwork.css">
    <link rel="stylesheet" href="../assets/css/listastu.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">


    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">


    <!-- สำคัญ -->
    <!-- FullCalendar -->
    <link href='lib/fullcalendar.min.css' rel='stylesheet' />

    <!-- ตัวหมุนๆ CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- <script src='/lib/jquery.min.js'></script> -->
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- สำคัญ -->
    <script src="js/bootstrap.min.js"></script>

    <!-- FullCalendar -->
    <script src='lib/moment.min.js'></script>
    <script src='lib/fullcalendar.min.js'></script>
    <!-- Slimscroll JS -->
    <script src="../assets/js/jquery.slimscroll.min.js"></script>




    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/6wxmqlsq4k922xfv2n3ztl11bwqdayixb7n36bwtk4qabmi5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image  lists  searchreplace visualblocks wordcount preview code fullscreen insertdatetime ',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough |  image  table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat  | alignleft aligncenter alignright alignjustify | undo redo ',
            language_url: '../assets/js/th_TH.js',
            language: 'th_TH',


            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            images_upload_url: './calendar.php',
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
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

    <div class="page-wrapper ">


        <!-- Page Content -->
        <div class="content container-fluid mt-4">
            <?php
            include('nav_admin.php');

            ?>

            <nav aria-label="breadcrumb mt-5">
                <ol class="breadcrumb  mt-5 ">
                    <li class="breadcrumb-item"><a href="../addmin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">จัดการเว็บไซต์</li>
                    <li class="breadcrumb-item ">จัดการปฏิทิน</li>
                    </li>
                </ol>
            </nav>



            <div class="row mt-5">

                <div class="col-sm-12 ">
                    <div class="col-sm-7">
                        <!-- Page Header -->
                        <div class="page-headerr mb-5 mt-3 p-2 ">
                            <div class="row align-items-center">

                                <div class="col">
                                    <h3 class="page-title">จัดการปฏิทิน</h3>
                                </div>
                                <div class="col-auto float-right ml-auto">
                                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus"></i>เพิ่มกิจกรรม</a>
                                </div>

                            </div>
                        </div>
                        <!-- /Page Header -->

                        <!-- ปฏิทิน -->
                        <div class="row">

                            <div class="col-lg-12 text-center">
                                <div id="calendar" class="col-centered">
                                </div>
                            </div>

                        </div>
                        <!-- ปฏิทิน -->



                    </div>


                    <div class="col-sm-4    ">
                        <div class="col p-1 d-flex flex-column ">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h5 class="pb-1 border-bottom">สีของประเภทผู้ใช้</h5>

                                    <div class="boxviewcolor mt-2">
                                        <div class="p-3 mb-2 text-white " style=" Background-color: #0071c5;">นักศึกษาฝึกงาน</div>
                                    </div>

                                    <div class="boxviewcolor mt-2">
                                        <div class="p-3 mb-2 text-white " style=" Background-color: #40E0D0;">นักศึกษาสหกิจศึกษา</div>
                                    </div>

                                    <div class="boxviewcolor mt-2">
                                        <div class="p-3 mb-2 text-white " style=" Background-color: #008000;">อาจารย์ที่ปรึกษา</div>
                                    </div>

                                    <div class="boxviewcolor mt-2">
                                        <div class="p-3 mb-2 text-white " style=" Background-color: #FFD700;">อาจารย์ประจำวิชาสหกิจ</div>
                                    </div>

                                    <div class="boxviewcolor mt-2">
                                        <div class="p-3 mb-2 text-white " style=" Background-color: #FF8C00;">อาจารย์นิเทศ</div>
                                    </div>

                                    <div class="boxviewcolor mt-2">
                                        <div class="p-3 mb-2 text-white " style=" Background-color: #FF0000;">สถานประกอบการ</div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>





            <!-- Modal -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">

                        <form class="form-horizontal" method="POST" action="addEvent.php" onsubmit="return validateAddnewsForm()" >

                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">เพิ่มกิจกรรม</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">ชื่อ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="ชื่อกิจกรรม">
                                    </div>
                                </div>

                              

                                <div class="form-group">
                                    <label for="doc" class="col-sm-2 control-label">เอกสาร</label>
                                    <div class="col-sm-10">
                                        <textarea name="doc" class="form-control" id="doc" placeholder="เอกสารที่ต้องส่ง"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- &#9724; -->
                                    <label for="color" class="col-sm-2 control-label">สี</label>
                                    <div class="col-sm-10">
                                        <select name="color" class="form-control" id="color" required>
                                            <option value="ไม่ได้เลือกประเภท">กรุณาเลือกประเภทประกาศ
                                            </option>
                                            <option value="#0071c5">&#9724; นักศึกษาฝึกงาน</option>
                                            <option value="#40E0D0">&#9724; นักศึกษาสหกิจศึกษา</option>
                                            <option value="#008000">&#9724; อาจารย์ที่ปรึกษา</option>
                                            <option value="#FFD700">&#9724; อาจารย์ประจำวิชาสหกิจ</option>
                                            <option value="#FF8C00">&#9724; อาจารย์นิเทศ</option>
                                            <option value="#FF0000">&#9724; สถานประกอบการ</option>
                                            <!-- <option  value="#000">&#9724; Black</option> -->

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="start" class="col-sm-2 control-label">เริ่ม</label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="start" class="form-control" id="start">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="end" class="col-sm-2 control-label">สิ้นสุด</label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="end" class="form-control" id="end">
                                    </div>
                                </div>

                            </div>

                            <!-- ปุ่ม -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary" onclick="return validateAddnewsForm()">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="editEventTitle.php">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">แก้ไข</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">ชื่อ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title">
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <label for="doc" class="col-sm-2 control-label">เอกสาร</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" name="doc" class="form-control" id="doc" hidden> -->
                                        <textarea type="text" name="doc" rows="5" class="form-control mb-2"
                                    placeholder="กรอกจุดประสงค์"
                                    id="docc"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="color" class="col-sm-2 control-label">สี</label>
                                    <div class="col-sm-10">
                                        <select name="color" class="form-control" id="color">
                                            <option value="ไม่ได้เลือกประเภท">กรุณาเลือกประเภทประกาศ
                                            </option>
                                            <option value="#0071c5" value="#0071c5">&#9724; นักศึกษาฝึกงาน
                                            </option>
                                            <option value="#40E0D0">&#9724; นักศึกษาสหกิจศึกษา</option>
                                            <option value="#008000">&#9724; อาจารย์ที่ปรึกษา</option>
                                            <option value="#FFD700">&#9724; อาจารย์ประจำวิชาสหกิจ</option>
                                            <option value="#FF8C00">&#9724; อาจารย์นิเทศ</option>
                                            <option value="#FF0000">&#9724; สถานประกอบการ</option>
                                            <!-- <option  value="#000">&#9724; Black</option> -->

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label class="text-danger">
                                                <input type="checkbox" name="delete"> ลบกิจกรรม</label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id" class="form-control" id="id">


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary" >บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

        </main>

    </div>
    </div>




    </div>











    <?php date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");
    ?>
    <?php
    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");
    // $doc = html_entity_decode(stripslashes($event['doc']));

    ?>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            navLinks: true,
            defaultDate: '<?php echo $date ?>',
            minTime: '00:00:00',
            maxTime: '24:00:00',
            editable: true,
            eventLimit: true,
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                var formattedStart = moment(start).format('YYYY-MM-DD HH:mm:ss');
                var formattedEnd = moment(end).format('YYYY-MM-DD HH:mm:ss');
                $('#ModalAdd #start').val(formattedStart);
                $('#ModalAdd #end').val(formattedEnd);
                $('#ModalAdd #doc').val('');
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    var docData = JSON.parse(event.doc.replace(/\\/g, ""));
                $('#ModalEdit #docc').text(docData);


                    $('#ModalEdit').modal('show');
                    tinymce.get('docc').setContent(docData);

                });
            },
            eventDrop: function(event, delta, revertFunc) {
                edit(event);
            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc) {
                edit(event);
            },
            events: [
                <?php foreach ($events as $event) :
                    $start = explode(" ", $event['start']);
                    $end = explode(" ", $event['end']);
                    if ($start[1] == '00:00:00') {
                        $start = $start[0];
                    } else {
                        $start = $event['start'];
                    }
                    if ($end[1] == '00:00:00') {
                        $end = $end[0];
                    } else {
                        $end = $event['end'];
                    }
                ?> {
                        id: '<?php echo $event['id']; ?>',
                        title: '<?php echo $event['title']; ?>',
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $end; ?>',
                        color: '<?php echo $event['color']; ?>',
                        doc: '<?php echo json_encode($event['doc']); ?>'
                    },
                <?php endforeach; ?>
            ]
        });

        function edit(event) {
            var start = event.start.format('YYYY-MM-DD HH:mm:ss');
            var end = event.end ? event.end.format('YYYY-MM-DD HH:mm:ss') : start;
            var id = event.id;
            var title = $('#ModalEdit #title').val();
            var color = $('#ModalEdit #color').val();
            var doc = $('#ModalEdit #doc').val();

            $.ajax({
                url: 'editEventDate.php',
                type: 'POST',
                data: {
                    id: id,
                    start: start,
                    end: end,
                    doc: doc,
                    title: title,
                    color: color,
                    delete: $('input[name="delete"]').is(':checked')
                },
                success: function(rep) {
                    if (rep === 'OK') {
                        alert('บันทึก');
                    } else {
                        alert('ไม่สามารถบันทึกได้ โปรดลองอีกครั้ง');
                    }
                }
            });
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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





    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>







</body>

</html>
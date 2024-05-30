<?php
session_start();
require_once('./calender/connect.php');

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}






$sql = "SELECT *   FROM events ";
$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Calendar</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href=".assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href=".assets/css/line-awesome.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="./assets/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap-datetimepicker.min.css">

    <!-- Calendar CSS -->
    <link rel="stylesheet" href="./assets/css/fullcalendar.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style2.css">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar -->
    <link href='./calender/lib/fullcalendar.min.css' rel='stylesheet' />


    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/6wxmqlsq4k922xfv2n3ztl11bwqdayixb7n36bwtk4qabmi5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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


    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <div class="main-wrapper">

        <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
        <?php include('./nav_admin.php'); ?>
        <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->


        <!-- Page Wrapper -->
        <div class="page-wrapper">


            <!-- Page Content -->
            <div class="content container-fluid mt-5">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">จัดการปฏิทิน</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">จัดการเว็บไซต์</li>
                                <li class="breadcrumb-item active">จัดการปฏิทิน</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus"></i>เพิ่มกิจกรรม</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">

                    <div class="col-lg-12 text-center">

                        <div id="calendar" class="col-centered">
                        </div>
                    </div>

                </div>
                <!-- /.row -->

                <!-- Modal -->
                <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="addEvent.php">

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
                                            <textarea type="text" name="doc" class="form-control" id="doc" placeholder="เกสารที่ต้องส่ง"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="color" class="col-sm-2 control-label">สี</label>
                                        <div class="col-sm-10">
                                            <select name="color" class="form-control" id="color">
                                                <option value="">กรุณาเลือกสี</option>
                                                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                                <option style="color:#000;" value="#000">&#9724; Black</option>

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
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
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
                                            <input type="text" name="title" class="form-control" id="title" placeholder="ชื่อกิจกรรม">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="doc" class="col-sm-2 control-label">เอกสาร</label>
                                        <div class="col-sm-10">
                                            <!-- <textarea type="text" name="doc" class="form-control" id="doc"><?php echo isset($row['doc']) ? $row['doc'] : ''; ?></textarea> -->
                <textarea name="doc" id="doc" cols="30" rows="10"></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="color" class="col-sm-2 control-label">สี</label>
                                        <div class="col-sm-10">
                                            <select name="color" class="form-control" id="color">
                                                <option value="">กรุณาเลือกสี</option>
                                                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                                <option style="color:#000;" value="#000">&#9724; Black</option>

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
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>

    </div>


    <?php date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");
    ?>
    <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({

                header: {

                    left: 'prev,next today',
                    center: 'title',
                    //right: 'month,basicWeek,basicDay'
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },

                navLinks: true,
                defaultDate: '<?php echo $date ?>',
                minTime: '00:00:00',
                maxTime: '24:00:00',
                editable: true,

                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {

                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');
                },
                eventRender: function(event, element) {
                    element.bind('dblclick', function() {
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        $('#ModalEdit #doc').val(event.doc);
                        $('#ModalEdit').modal('show');
                    });
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position

                    edit(event);

                },
                eventResize: function(event, dayDelta, minuteDelta,
                    revertFunc) { // si changement de longueur

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
                    ?>

                        {
                            id: '<?php echo $event['id']; ?>',
                            title: '<?php echo $event['title']; ?>',
                            doc: '<?php echo $event['doc']; ?>',
                            start: '<?php echo $start; ?>',
                            end: '<?php echo $end; ?>',
                            color: '<?php echo $event['color']; ?>',

                        },
                    <?php endforeach; ?>
                ]
            });

            function edit(event) {
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if (event.end) {
                    end = event.end.format('YYYY-MM-DD HH:mm:ss');
                } else {
                    end = start;
                }

                id = event.id;

                Event = [];
                Event[0] = id;
                Event[1] = start;
                Event[2] = end;

                $.ajax({
                    url: 'editEventDate.php',
                    type: "POST",
                    data: {
                        Event: Event
                    },
                    success: function(rep) {
                        if (rep == 'OK') {
                            alert('บันทึก');
                        } else {
                            alert('Could not be saved. try again.');
                        }
                    }
                });
            }

        });
    </script>


    <!-- <script src='./calender/lib/jquery.min.js'></script>

<script src="./calenderjs/jquery.js"></script>


<script src="./calenderjs/bootstrap.min.js"></script> -->

    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>


    <!-- FullCalendar -->
    <script src='./calenderlib/moment.min.js'></script>
    <script src='./calenderlib/fullcalendar.min.js'></script>


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>



    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Select2 JS -->
    <script src="assets/js/select2.min.js"></script>

    <!-- Datetimepicker JS -->
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
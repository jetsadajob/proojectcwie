<?php
require_once('connect.php');


$sql = "SELECT id, title, start, end, color,doc FROM events ";

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

    <title>calendar</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- css ที่สร้างใหม่ -->
    <!-- <link rel="stylesheet" href="./css/boxviewcolor.css> -->

    <!-- Fontawesome CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- logo  Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- Select2 CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/select2.min.css"> -->

    <!-- Datetimepicker CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css"> -->

    <!-- Calendar CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/fullcalendar.min.css"> -->

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">




    <link rel="stylesheet" href="../internship/assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">


    <!-- สำคัญ -->
    <!-- FullCalendar -->
    <link href='lib/fullcalendar.min.css' rel='stylesheet' />

    <!-- ตัวหมุนๆ CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src='/lib/jquery.min.js'></script>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- FullCalendar -->
    <script src='lib/moment.min.js'></script>
    <script src='lib/fullcalendar.min.js'></script>
    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>



</head>

<body>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('./nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <div class="page-wrapper">


        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- <h3 class="page-title">นักศึษาสหกิจ</h3> -->
                        <ul class="breadcrumb mt-5">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">จัดการเว็บไซต์</li>
                            <li class="breadcrumb-item active">จัดการปฏิทิน</li>
                        </ul>
                    </div>

                </div>
            </div>

            <main class="container">
                <div class="con1 row mb-1 ">
                    <div class="col-md-7">
                        <!-- Page Header -->
                        <div class="page-header">
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
                                                    <textarea name="doc" class="form-control" id="doc" placeholder="เอกสารที่ต้องส่ง"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <!-- &#9724; -->
                                                <label for="color" class="col-sm-2 control-label">สี</label>
                                                <div class="col-sm-10">
                                                    <select name="color" class="form-control" id="color">
                                                        <option value="ไม่ได้เลือกประเภท">กรุณาเลือกประเภทประกาศ
                                                        </option>
                                                        <option value="#0071c5">&#9724; นักศึกษาฝึกงาน</option>
                                                        <option value="#40E0D0">&#9724; นักศึกษาสหกิจศึกษา</option>
                                                        <option value="#008000">&#9724; อาจารย์ที่ปรึกษา</option>
                                                        <!-- <option value="#FFD700">&#9724; อาจารย์นิเทศ</option> -->
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
                                                    <!-- <textarea name="doc" class="form-control" id="doc" placeholder="เอกสารที่ต้องส่ง"></textarea> -->
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
                                                        <!-- <option value="#FFD700">&#9724; อาจารย์นิเทศ</option> -->
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
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-3 ml-3  mt-5  ">
                        <div class="row g-0 ">
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

            </main>

        </div>



    </div>











    <?php date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");
    ?>
  <script>
$(document).ready(function() {
    var eventObjects = JSON.parse('<?php echo json_encode(array_map(function ($event) {
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        return [
            'id' => $event['id'],
            'title' => $event['title'],
            'start' => ($start[1] === '00:00:00') ? $start[0] : $event['start'],
            'end' => ($end[1] === '00:00:00') ? $end[0] : $event['end'],
            'color' => $event['color'],
            'doc' => $event['doc']
        ];
    }, $events)); ?>');

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        navLinks: true,
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: true,
        events: eventObjects,
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
                $('#ModalEdit #doc').val(event.doc);
                $('#ModalEdit').modal('show');
            });
        },
        eventDrop: function(event) {
            updateEvent(event);
        },
        eventResize: function(event) {
            updateEvent(event);
        }
    });

    function updateEvent(event) {
        var start = event.start.format('YYYY-MM-DD HH:mm:ss');
        var end = event.end ? event.end.format('YYYY-MM-DD HH:mm:ss') : start;
        $.ajax({
            url: 'editEventDate.php',
            type: 'POST',
            data: {
                id: event.id,
                start: start,
                end: end,
                title: $('#ModalEdit #title').val(),
                color: $('#ModalEdit #color').val(),
                doc: $('#ModalEdit #doc').val()
            },
            success: function(response) {
                if(response === 'OK') {
                    alert('Event updated successfully!');
                } else {
                    alert('Failed to update event.');
                }
            }
        });
    }
});
</script>
</body>

</html>
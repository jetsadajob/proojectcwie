<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>จัดการข้อมูลพนักงาน</title>
    <!-- sweet alert  -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

</head>

<body>
    <?php
        include('./navbar_menu.php');
        ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h4>จัดการข้อมูลพนักงานที่ปรึกษา
                    <hr>
                </h4>
                <?php
          //ถ้ามีการส่งพารามิเตอร์ method get และ  method get ชือ act = add จะแสดงฟอร์มเพิ่มข้อมูล
          if(isset($_GET['act']) && $_GET['act']=='add'){ ?>
                <h5>ข้อมูลทั่วไป</h5>
                <form method="post">
                    <div class="row mb-3">
                    <div class="col">
                            รหัสพนักงาน
                            <input type="text" name="staff_code" class="form-control" placeholder="ขั้นต่ำ 5 ตัว" required
                                minlength="5" maxlength="20">
                        </div>
                        <div class="col">
                            แผนก
                            <input type="text" name="staff_department" class="form-control" placeholder="แผนก" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-sm-2">
                            คำนำหน้าชื่อ
                            <select name="staff_prefix" class="form-select" required>
                                <option value="">-คำนำหน้าชื่อ-</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col col-sm-4">
                            ชื่อ
                            <input type="text" name="staff_firstname" class="form-control" placeholder="ชื่อ" required>
                        </div>
                        <div class="col col-sm-6">
                            นามสกุล
                            <input type="text" name="staff_lastname" class="form-control" placeholder="นามสกุล" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            เบอร์โทร
                            <input type="tel" name="staff_phone" class="form-control" placeholder="เบอร์โทร" required
                                minlength="10" maxlength="10">
                        </div>
                        <div class="col">
                            อีเมล
                            <input type="email" name="staff_email" class="form-control" placeholder="อีเมล" required>
                        </div>
                    </div>
                    <h5>ข้อมูลนักศึกษาที่รับผิดชอบ</h5>
                    <div class="row mb-3">
                        <div class="col col-sm-6">
                            ชื่อ-สกุลนักศึกษา
                            <input type="text" name="std_name" class="form-control" placeholder="ชื่อ" required>
                        </div>
                        <div class="col col-sm-6">
                            ประเภทนักศึกษา
                            <select name="std_type" class="form-select" required>
                                <option value="">-ประเภทนักศึกษา-</option>
                                <option value="นักศึกษาสหกิจศึกษา">นักศึกษาสหกิจศึกษา</option>
                                <option value="นักศึกษาฝึกงาน">นักศึกษาฝึกงาน</option>
                            </select>
                        </div>
                    </div>


                    <!-- <br>
                    <div class="button">
                        <button type="button" class="btn btn-danger">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-primary">
                            บันทึก
                        </button>
                    </div> -->
                    <br>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button class="btn btn-primary" type="submit">บันทึก</button>
                    </div>
                </form>
                <?php } ?>
                <br>
                <h5>ข้อมูลพนักงานที่ปรึกษา
                    <a href="formaddstaff.php?act=add" class="btn btn-success btn-sm">+เพิ่มข้อมูล</a>
                </h5>
                <div class="table-responsive">
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr class="table-danger">
                                <th width="10%">รหัสพนักงาน</th>
                                <th width="20%">ชื่อพนักงาน</th>
                                <th width="10%">แผนก</th>
                                <th width="10%">เบอร์โทร</th>
                                <th width="15%">อีเมล</th>
                                <th width="15%">นักศึกษาที่รับผิดชอบ</th>
                                <th width="15%">ประเภทนักศึกษา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
              //เรียกไฟล์เชื่อมต่อฐานข้อมูล
              require_once 'connect.php';
              //คิวรี่ข้อมูลมาแสดงในตาราง
              $stmt = $conn->prepare("SELECT* FROM tbl_std ORDER BY staff_code DESC");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
                            <tr>
                                <td><?= $row['staff_code'];?></td>
                                <td><?= $row['staff_prefix'].$row['staff_firstname'].' '.$row['staff_lastname'];?></td>
                                <td><?= $row['staff_department'];?></td>
                                <td><?= $row['staff_phone'];?></td>
                                <td><?= $row['staff_email'];?></td>
                                <td><?= $row['std_name'];?></td>
                                <td><?= $row['std_type'];?></td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</body>

</html>

<?php
  //   echo '<pre>';
  //       print_r($_POST);
  // echo '</pre>';
  // exit();
  //ตรวจสอบตัวแปรที่ส่งมาจากฟอร์ม
  if (isset($_POST['staff_code']) && isset($_POST['staff_department']) && isset($_POST['staff_phone'])) {
  //ไฟล์เชื่อมต่อฐานข้อมูล
  require_once 'connect.php';
  //sql insert
  $stmt = $conn->prepare("INSERT INTO tbl_std
  (
  staff_code,
  staff_department, 
  staff_prefix, 
  staff_firstname, 
  staff_lastname,
  staff_phone,
  staff_email,
  std_name,
  std_type
  )
  VALUES
  (
  :staff_code,
  :staff_department, 
  :staff_prefix, 
  :staff_firstname, 
  :staff_lastname,
  :staff_phone,
  :staff_email,
  :std_name,
  :std_type
  )
  ");
  //bindParam data type
  $stmt->bindParam(':staff_code', $_POST['staff_code'], PDO::PARAM_STR);
  $stmt->bindParam(':staff_department', $_POST['staff_department'], PDO::PARAM_STR);
  $stmt->bindParam(':staff_prefix', $_POST['staff_prefix'], PDO::PARAM_STR);
  $stmt->bindParam(':staff_firstname', $_POST['staff_firstname'], PDO::PARAM_STR);
  $stmt->bindParam(':staff_lastname', $_POST['staff_lastname'], PDO::PARAM_STR);
  $stmt->bindParam(':staff_phone', $_POST['staff_phone'], PDO::PARAM_STR);
  $stmt->bindParam(':staff_email', $_POST['staff_email'], PDO::PARAM_STR);
  $stmt->bindParam(':std_name', $_POST['std_name'], PDO::PARAM_STR);
  $stmt->bindParam(':std_type', $_POST['std_type'], PDO::PARAM_STR);
  $result = $stmt->execute();
  $conn = null; //close connect db
  //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
  if($result){
  echo '<script>
    setTimeout(function() {
      swal({
      title: "เพิ่มข้อมูลสำเร็จ",
      type: "success"
      }, function() {
      window.location = "formaddstaff.php"; //หน้าที่ต้องการให้กระโดดไป
      });
    }, 1000);
  </script>';
  }else{
  echo '<script>
    setTimeout(function() {
      swal({
      title: "เกิดข้อผิดพลาด",
      type: "error"
      }, function() {
      window.location = "formaddstaff.php"; //หน้าที่ต้องการให้กระโดดไป
      });
    }, 1000);
  </script>';
  } //else ของ if result
   
  } //isset

  ?>
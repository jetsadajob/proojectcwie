<?php
// เชื่อมต่อกับฐานข้อมูล
include './admin/work/dbwork.php';

// กำหนดจำนวนรายการต่อหน้า
$records_per_page = 7;

// หากมีการร้องขอหน้าที่ต้องการ
if (isset($_GET['page'])) {
    // กำหนดหน้าที่ร้องขอ
    $page = $_GET['page'];
} else {
    // หากไม่ระบุหน้า ให้กำหนดให้เป็นหน้าแรก
    $page = 1;
}

// คำนวณ offset เพื่อใช้ในการดึงข้อมูลจากฐานข้อมูล
$start_from = ($page - 1) * $records_per_page;

// สร้างคำสั่ง SQL เพื่อดึงข้อมูลของหน้าที่ต้องการ
$sql = "SELECT * FROM events ORDER BY start DESC LIMIT $start_from, $records_per_page";
$result = mysqli_query($conn, $sql);

// สร้าง HTML สำหรับแสดงข้อมูล
while ($row = mysqli_fetch_array($result)) {
    $start_date = $row["start"];
    $end_date = $row["end"];

    $start_timestamp = strtotime($start_date);
    $end_timestamp = strtotime($end_date);
    $start_thai_date = date(" j ", $start_timestamp) . thai_month(date("n", $start_timestamp)) . date(" Y", $start_timestamp);
    $end_thai_date = date(" j ", $end_timestamp) . thai_month(date("n", $end_timestamp)) . date(" Y", $end_timestamp);
?>

    <div class="row">
        <div class="col-12">
            <div class="mb-1 text-left">
                <div class="row">
                    <div class="context ">
                        <!-- ส่วนแสดงผลของสี -->
                        <?php
                        $sql_color = "SELECT * FROM events  ";
                        $result_color = mysqli_query($conn, $sql_color);
                        $row_color = mysqli_fetch_array($result_color);
                        ?>
                        <?php if ($row_color["color"] == "#0071c5") : ?>
                            <span class="badge bg-primary">นักศึกษาฝึกงาน</span>
                        <?php elseif ($row_color["color"] == "#40E0D0") : ?>
                            <span class="badge bg-info text-dark">นักศึกษาสหกิจศึกษา</span>
                        <?php elseif ($row_color["color"] == "#008000") : ?>
                            <span class="badge badge-pill badge-success">อาจารย์ที่ปรึกษา</span>
                        <?php elseif ($row_color["color"] == "#FFD700") : ?>
                            <span class="badge badge-warning">อาจารย์ประจำวิชาสหกิจ</span>
                        <?php elseif ($row_color["color"] == "#FF8C00") : ?>
                            <span class="badge badge-danger">อาจารย์นิเทศ</span>
                        <?php elseif ($row_color["color"] == "#FF0000") : ?>
                            <span class="badge bg-info text-dark">สถานประกอบการ</span>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <!-- แสดงข้อมูลวันที่ -->
                        <?php echo $start_thai_date; ?> - <?php echo $end_thai_date; ?>
                    </div>
                </div>
                <div>
                    <!-- ลิงก์ไปยังหน้ารายละเอียด -->
                    <a href="./calendardetail.php?id=<?= $row["id"] ?>" class="text-primary mb-1">
                        <div class="context"><?= $row["title"] ?></div>
                </div>
                </a>
                <hr>
            </div>
        </div>
    </div>

<?php
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

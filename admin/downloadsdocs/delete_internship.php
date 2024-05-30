
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_GET['id'])) {
    require_once '../connect.php';

    // รับ ID (ค่า 'no') ของไฟล์ที่จะลบ
    $id = $_GET['id'];

    // คิวรี่ข้อมูลไฟล์จากฐานข้อมูล
    $stmt = $conn->prepare("SELECT doc_file FROM tbl_pdf_internship WHERE no = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetch();

    if($file) {
        // ลบไฟล์จากโฟลเดอร์
        unlink("docinternship/" . $file['doc_file']);

        // ลบข้อมูลจากฐานข้อมูล
        $stmt = $conn->prepare("DELETE FROM tbl_pdf_internship WHERE no = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    $conn = null; // ปิดการเชื่อมต่อฐานข้อมูล
    header('Location: ../downloadinternship.php'); // กลับไปยังหน้าแสดงผล
    exit();
    
    if($result){
        echo '<script>
                swal({
                    title: "ลบไฟล์เอกสารสำเร็จ",
                    icon: "success"
                }).then(function() {
                    window.location = "../downloadinternship.php";
                });
              </script>';
    } else {
        echo '<script>
                swal({
                    title: "เกิดข้อผิดพลาด",
                    icon: "error"
                }).then(function() {
                    window.location = "../downloadinternship.php";
                });
              </script>';
    }
}


?>
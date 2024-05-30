
 <?php

	require_once('connect.php');

	if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']) && isset($_POST['doc'])) {
		// รับค่าจากฟอร์ม
		$title = $_POST['title'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$color = $_POST['color'];
		$doc = $_POST['doc'];


		// สร้างคำสั่ง SQL สำหรับการเพิ่มข้อมูล
		$sql = "INSERT INTO events(title, start, end, color, doc) VALUES (?, ?, ?, ?, ?)";
		$query = $bdd->prepare($sql);

		if ($query == false) {
			print_r($bdd->errorInfo());
			die('Erreur prepare');
		}

		$sth = $query->execute([$title, $start, $end, $color, $doc]);

		if ($sth == false) {
			print_r($query->errorInfo());
			die('Erreur execute');
		}
	}

	header('Location: ' . $_SERVER['HTTP_REFERER']);
	?> 


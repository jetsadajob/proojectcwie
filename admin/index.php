
<?php
      $con= mysqli_connect("localhost","root","","projectcwie") or die("Error: " . mysqli_error($con));
      mysqli_query($con, "SET NAMES 'utf8' ");
      error_reporting( error_reporting() & ~E_NOTICE );
      date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>select by.devtai.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $sql_provinces = "SELECT * FROM provinces";
    $query = mysqli_query($con, $sql_provinces);
?>
 
<div class="container">
  
  <form>
    <div class="form-group">
      <label for="sel1">จังหวัด:</label>
      <select class="form-control" name="Ref_prov_id" id="provinces">
            <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
             <?php foreach ($query as $value) { ?>
            <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
            <?php } ?>
      </select>
      <br>
 
      <label for="sel1">อำเภอ:</label>
      <select class="form-control" name="Ref_dist_id" id="amphures">
      </select>
      <br>
 
      <label for="sel1">ตำบล:</label>
      <select class="form-control" name="Ref_subdist_id" id="districts">
      </select>
       <br>
 
      <label for="sel1">รหัสไปรษณีย์:</label>
       <input type="text" name="zip_code" id="zip_code" class="form-control">
          <br>
        <a href="https://devtai.com/?cat=38"> <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button></a>
    </div>
  </form>
</div>

</body>

</html>

<script type="text/javascript">
        
        $('#provinces').change(function() {
            var id_province = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax_db.php",
                data: {
                    id: id_province,
                    function: 'provinces'
                },
                success: function(data) {
                    $('#amphures').html(data);
                    $('#districts').html(' ');
                    $('#districts').val(' ');
                    $('#zip_code').val(' ');
                }
            });
        });

        $('#amphures').change(function() {
            var id_amphures = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax_db.php",
                data: {
                    id: id_amphures,
                    function: 'amphures'
                },
                success: function(data) {
                    $('#districts').html(data);
                }
            });
        });

        $('#districts').change(function() {
            var id_districts = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax_db.php",
                data: {
                    id: id_districts,
                    function: 'districts'
                },
                success: function(data) {
                    $('#zip_code').val(data)
                }
            });

        });
    </script>
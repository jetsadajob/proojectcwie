<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQk/C+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2zfn7g5p2D54Emf5u3GRnbsmHugVwMPb3jGqW9Bf5J7Vc9e" crossorigin="anonymous"></script>

    <script>
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
                    $('#districts').html('');
                    $('#zip_code').val('');
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
                    $('#zip_code').val('');
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
                    $('#zip_code').val(data);
                }
            });
        });

        
    </script>
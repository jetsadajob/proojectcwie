<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Data Dashboard</title>
    <!-- Include Highcharts library -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="col">
        <div class="boxfilter">
            <fieldset>
                <legend class="text-xs text-uppercase mb-1">ประเภทอาจารย์</legend>
                <select id="teacherType" class="form-select form-select-sm" aria-label="Small select example">
                    <option selected value="all">ทั้งหมด</option>
                    <option value="advisor">อาจารย์ที่ปรึกษา</option>
                    <option value="supervision">อาจารย์นิเทศ</option>
                    <option value="courseInstructor">อาจารย์ประจำวิชาสหกิจ</option>
                </select>
            </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนอาจารย์แต่ละประเภท</h6>
                </div>
                <div class="card-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนอาจารย์แต่ละหลักสูตร (แบ่งตามสาขาวิชาที่ประจำอยู่)</h6>
                </div>
                <div class="card-body">
                    <div id="allmajorteacher"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#teacherType').change(function() {
                var selectedOption = $(this).children("option:selected").val();
                fetchData(selectedOption);
            });
        });

        function fetchData(selectedOption) {
            $.ajax({
                type: "POST",
                url: "fetch_data.php",
                data: { selected_option: selectedOption },
                success: function(response) {
                    var data = JSON.parse(response);
                    updateChart(data.advisorCount, data.supervisionCount, data.courseCount);
                }
            });
        }

        function updateChart(advisorCount, supervisionCount, courseCount) {
            var chart = Highcharts.chart('container', {
                series: [{
                    data: [{
                            name: 'อาจารย์ที่ปรึกษา',
                            y: advisorCount
                        },
                        {
                            name: 'อาจารย์นิเทศ',
                            y: supervisionCount
                        },
                        {
                            name: 'อาจารย์ประจำวิชา',
                            y: courseCount
                        }
                    ]
                }]
            });
        }
    </script>
</body>
</html>

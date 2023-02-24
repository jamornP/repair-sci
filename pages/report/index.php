<?php  
    session_start(); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>App Science KMITL</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/link-css.php";?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
</head>

<body class="theme-deep-orange font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/page-loader.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/navbar.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/s-left-right.php";?>
<?php //$_SESSION['year']=2567;?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    รายงาน
                    
                </h2>
            </div>
            <div class="row clearfix">
                 <!-- Area Chart -->
                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>ย้อนหลัง 5 ปี (แบบรายปี)</h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div id="bar_chart_y" class="graph"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Area Chart -->
                <!-- Line Chart -->
                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ย้อนหลัง 5 ปี</h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div id="line_chart" class="graph"></div>
                        </div>
                    </div>
                </div> -->
                <!-- #END# Line Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ปีงบประมาณ <?php echo $_SESSION['year'];?> (แบบรายเดือน)</h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div id="bar_chart_m" class="graph"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
               
            </div>
        </div>
    </section>
    
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
    <!-- Jquery Core Js -->
    <script src="/repair-sci/plugins/jquery/jquery.min.js"></script>

    <!-- Custom Js -->
    <script src="/repair-sci/js/admin.js"></script>
    <!-- <script src="/repair-sci/js/pages/charts/morris.js"></script> -->

    <script>
        $(document).ready(function () {
            // getMorris('line', 'line_chart');
            // getMorris('bar', 'bar_chart_m');
            // getMorris('area', 'area_chart');
            // getMorris('donut', 'donut_chart');
             showYear();
             showMonth();
            //  showStatus();
        });

        function showYear(){
            
            $.get('year.php?table=tb_a_repair',function(data){
                // console.log(data);
                Morris.Bar({
                    element: 'bar_chart_y',
                    data: data,
                    xkey: 'year',
                    ykeys: ['repair','complete','wait','company','no'],
                    labels: ['แจ้งซ่อม','เรียบร้อย','รออะไหล่','จ้างเหมา','งานค้าง'],
                    barColors: ['rgb(1,67,91)','rgb(17,161,157)','rgb(255,135,135)','rgb(152,168,248)','rgb(194,17,17)']
                });
            })
        }
        function showMonth(){
            $.post('month.php',function(data){
                // console.log(data);
                Morris.Bar({
                    element: 'bar_chart_m',
                    data: data,
                    xkey: 'month',
                    ykeys: ['repair','complete','wait','company','no'],
                    labels: ['แจ้งซ่อม','เรียบร้อย','รออะไหล่','จ้างเหมา','งานค้าง'],
                    barColors: ['rgb(1,67,91)','rgb(17,161,157)','rgb(255,135,135)','rgb(152,168,248)','rgb(194,17,17)']
                });
            })
        }
        // function showStatus(){
        //     $.post('status.php',function(data){
        //         console.log(data.color);
        //         Morris.Donut({
        //             element: 'donut_chart',
        //             data: data,
        //             colors: ['rgb(255,215,0)','rgb(32,178,170)','rgb(0,139,139)','rgb(90,74,133)','rgb(44,83,133)','rgb(35,105,131)','rgb(148,0,211)','rgb(255,20,147)','rgb(30,144,255)','rgb(220,20,60)'],
        //             formatter: function (y) {
        //                 return y
        //             }
        //         });
        //     })
        // }
       
    </script>
    
</body>

</html>
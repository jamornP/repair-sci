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
                    รายงานการซ่อมเครื่องปรับอากาศ
                    
                </h2>
            </div>
            <div class="row clearfix">
                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>รายการแจ้งซ่อมย้อนหลัง 5 ปี (แบบรายปี)</h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div id="bar_chart_y" class="graph"></div>
                        </div>
                    </div>
                </div>
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
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ปีงบประมาณ <?php echo $_SESSION['year'];?> (แยกตามอาคาร)</h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div id="bar_chart_m2" class="graph"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>

    <!-- Jquery Core Js -->
    <script src="/repair-sci/plugins/jquery/jquery.min.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="/repair-sci/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Custom Js -->
    <script src="/repair-sci/js/admin.js"></script>
    <!-- <script src="/repair-sci/js/pages/charts/morris.js"></script> -->

    <script>
        $(document).ready(function () {
             showYear();
             showMonth();
             showMonth2();
        });

        function showYear(){
            $.get('year.php?table=tb_a_repair',function(data){
                // console.log(data);
                Morris.Area({
                    element: 'bar_chart_y',
                    data: data,
                    xkey: 'year',
                    ykeys: ['repair'],
                    labels: ['แจ้งซ่อม'],
                    pointSize: 2,
                    hideHover: 'auto',
                    // barColors: ['rgb(1,67,91)','rgb(17,161,157)','rgb(255,135,135)','rgb(152,168,248)','rgb(194,17,17)'],
                    lineColors: ['rgb(233, 30, 99)']
                });
            })
        }
        function showMonth2(){
            $.get('building.php?table=tb_a_repair',function(data){
                // console.log(data);
                Morris.Donut({
                    element: 'bar_chart_m2',
                    data: data,
                    colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)','rgb(1,67,91)','rgb(17,161,157)','rgb(255,135,135)','rgb(152,168,248)','rgb(194,17,17)'],
                    formatter: function (y) {
                        return y + '%'
                    }
                });
            })
        }
        function showMonth(){
            $.get('month.php?table=tb_a_repair',function(data){
                // console.log(data);
                Morris.Area({
                    element: 'bar_chart_m',
                    data: data,
                    xkey: 'month',
                    ykeys: ['repair'],
                    labels: ['แจ้งซ่อม'],
                    barColors: ['rgb(17,161,157)','rgb(0, 150, 136)']
                });
            })
        }
        
        
    </script>
    
</body>

</html>
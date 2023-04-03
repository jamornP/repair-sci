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
                    รายงานการซ่อมไฟฟ้าและประปา
                    
                </h2>
            </div>
            <div class="row clearfix">
                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2>จำนวนแจ้งซ่อมย้อนหลัง 5 ปี (แบบรายปี)</h2>
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
                            <h2>ปีงบประมาณ <?php echo $_SESSION['year'];?> (แยกตามประเภทการแจ้งซ่อม)</h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div id="bar_chart_m3" class="graph"></div>
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
             showMonth3();
            //  getMorris('donut', 'donut_chart');
            //  getMorris('line', 'donut_chart2');
        });

        function showYear(){
            $.get('year.php?table=tb_e_repair',function(data){
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
        function showMonth3(){
            $.get('type.php?table=tb_e_repair',function(data){
                // console.log(data);
                Morris.Donut({
                    element: 'bar_chart_m3',
                    data: data,
                    colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)','rgb(1,67,91)','rgb(17,161,157)','rgb(255,135,135)','rgb(152,168,248)','rgb(194,17,17)'],
                    formatter: function (y) {
                        return y + '%'
                    }
                });
            })
        }
        function showMonth2(){
            $.get('building.php?table=tb_e_repair',function(data){
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
            $.get('month.php?table=tb_e_repair',function(data){
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


// function getMorris(type, element) {
//     if (type === 'line') {
//         Morris.Line({
//             element: element,
//             data: [{
//                 'period': '2011 Q3',
//                 'licensed': 3407,
//                 'sorned': 660
//             }, {
//                     'period': '2011 Q2',
//                     'licensed': 3351,
//                     'sorned': 629
//                 }, {
//                     'period': '2011 Q1',
//                     'licensed': 3269,
//                     'sorned': 618
//                 }, {
//                     'period': '2010 Q4',
//                     'licensed': 3246,
//                     'sorned': 661
//                 }, {
//                     'period': '2009 Q4',
//                     'licensed': 3171,
//                     'sorned': 676
//                 }, {
//                     'period': '2008 Q4',
//                     'licensed': 3155,
//                     'sorned': 681
//                 }, {
//                     'period': '2007 Q4',
//                     'licensed': 3226,
//                     'sorned': 620
//                 }, {
//                     'period': '2006 Q4',
//                     'licensed': 3245,
//                     'sorned': null
//                 }, {
//                     'period': '2005 Q4',
//                     'licensed': 3289,
//                     'sorned': null
//                 }],
//             xkey: 'period',
//             ykeys: ['licensed', 'sorned'],
//             labels: ['Licensed', 'Off the road'],
//             lineColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)'],
//             lineWidth: 3
//         });
//     } else if (type === 'bar') {
//         Morris.Bar({
//             element: element,
//             data: [{
//                 x: '2011 Q1',
//                 y: 3,
//                 z: 2,
//                 a: 3
//             }, {
//                     x: '2011 Q2',
//                     y: 2,
//                     z: null,
//                     a: 1
//                 }, {
//                     x: '2011 Q3',
//                     y: 0,
//                     z: 2,
//                     a: 4
//                 }, {
//                     x: '2011 Q4',
//                     y: 2,
//                     z: 4,
//                     a: 3
//                 }],
//             xkey: 'x',
//             ykeys: ['y', 'z', 'a'],
//             labels: ['Y', 'Z', 'A'],
//             barColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)'],
//         });
//     } else if (type === 'area') {
//         Morris.Area({
//             element: element,
//             data: [{
//                 period: '2010 Q1',
//                 iphone: 2666,
//                 ipad: null,
//                 itouch: 2647
//             }, {
//                     period: '2010 Q2',
//                     iphone: 2000,
//                     ipad: 2294,
//                     itouch: 2441
//                 }, {
//                     period: '2010 Q3',
//                     iphone: 4000,
//                     ipad: 1969,
//                     itouch: 2501
//                 }, {
//                     period: '2010 Q4',
//                     iphone: 3000,
//                     ipad: 3597,
//                     itouch: 5689
//                 }, {
//                     period: '2011 Q1',
//                     iphone: 6000,
//                     ipad: 1914,
//                     itouch: 2293
//                 }, {
//                     period: '2011 Q2',
//                     iphone: 5000,
//                     ipad: 4293,
//                     itouch: 1881
//                 }, {
//                     period: '2011 Q3',
//                     iphone: 4000,
//                     ipad: 3795,
//                     itouch: 1588
//                 }, {
//                     period: '2011 Q4',
//                     iphone: 15000,
//                     ipad: 5967,
//                     itouch: 5175
//                 }, {
//                     period: '2012 Q1',
//                     iphone: 10000,
//                     ipad: 4460,
//                     itouch: 2028
//                 }, {
//                     period: '2012 Q2',
//                     iphone: 8000,
//                     ipad: 5713,
//                     itouch: 1791
//                 }],
//             xkey: 'period',
//             ykeys: ['iphone', 'ipad', 'itouch'],
//             labels: ['iPhone', 'iPad', 'iPod Touch'],
//             pointSize: 2,
//             hideHover: 'auto',
//             lineColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)']
//         });
//     } else if (type === 'donut') {
//         Morris.Donut({
//             element: element,
//             data: [{
//                     label: 'Jam',
//                     value: 25
//                 }, {
//                     label: 'Frosted',
//                     value: 40
//                 }, {
//                     label: 'Custard',
//                     value: 25
//                 }, {
//                     label: 'Sugar',
//                     value: 10
//                 }],
//             colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
//             formatter: function (y) {
//                 return y + '%'
//             }
//         });
//     }
// }
    </script>
    
</body>

</html>
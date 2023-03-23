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
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/link-css.php"; ?>
    
</head>

<body class="theme-deep-orange font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/page-loader.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/navbar.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/s-left-right.php"; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>รายงานผลการประเมินความพึงพอใจ</h1>
            </div>

            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <form action="" method="POST">
                                    <div class="col-sm-10 col-md-10 col-xl-10">
                                        <h2 class="card-inside-title">รายงานแจ้งซ่อม</h2>
                                        <select class="form-control show-tick" tabindex="-98" name="table">
                                            <option value="">-- เลือก --</option>
                                            <?php
                                                $staffMenu = $menuObj->getMenuByStaff($_SESSION['s_id']);
                                                $a = count($staffMenu);
                                                if ($a > 0) {
                                                    foreach ($staffMenu as $smenu) {
                                                        $selected =($smenu['type']==$_POST['table']?"selected":"");
                                                        echo "
                                                            <option value='{$smenu['type']}' {$selected}>{$smenu['m_name']}</option>
                                                        ";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <?php 
                                        $dateS=(isset($_POST['dateS'])?$_POST['dateS']:"");
                                        $dateE=(isset($_POST['dateE'])?$_POST['dateE']:"");
                                    ?>
                                    <div class="col-sm-2 col-md-2 col-xl-2">
                                        <button type="submit" class="btn btn-block bg-deep-purple waves-effec" name="submit">
                                            <i class="material-icons">search</i><br>
                                            <span class="fs-16">ค้นหา</span>
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="col-sm-12 col-md-12 col-xl-12">
                                <hr style="border-top: 3px solid #f44336;">
                                
                                    <?php
                                        $year=$_SESSION['year'];
                                        if(isset($_POST['submit'])){
                                            $type = $_POST['table'];
                                            switch($type){
                                                case "e":
                                                    $table="tb_e_repair";
                                                    $title="การซ่อมไฟฟ้าและประปา";
                                                    $dataAssType = $assessmentObj->getAssByType($type);
                                                    $a1=0;
                                                    $a2=0;
                                                    $a3=0;
                                                    $a4=0;
                                                    $a5=0;
                                                    $a6=0;
                                                    $a7=0;
                                                    $a8=0;
                                                    $i=0;
                                                    if(count($dataAssType)>0){
                                                        foreach($dataAssType as $ass){
                                                            $i++;
                                                            $a1+=$ass['a1'];
                                                            $a2+=$ass['a2'];
                                                            $a3+=$ass['a3'];
                                                            $a4+=$ass['a4'];
                                                            $a5+=$ass['a5'];
                                                            $a6+=$ass['a6'];
                                                            $a7+=$ass['a7'];
                                                            $a8+=$ass['a8'];
                                                        }
                                                    }
                                                    $a=array($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8);
                                                    $countRe=$repairObj->countAllRepair($year,$table);
                                                    $countAss=$i;
                                                    if($countAss== 0 or $countRe == 0){
                                                        $assper = 0;
                                                    }else{
                                                        $assper = $countAss*100/$countRe;
                                                    }
                                                        ?>
                                                    <h4>ผลการประเมินความพึงพอใจ <code class="font-kanit fs-18"><?php echo $title;?></code></h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <?php
                                                                    $groups = $assessmentObj->getAssGroup();
                                                                    // print_r($groups);
                                                                    $j = 0;
                                                                    foreach ($groups as $g) {
                                                                        $j++;
                                                                        echo "
                                                                            <tr class='bg-cyan fs-16'>
                                                                            <td colspan='2'>{$j}.{$g['ass_group']}</td>
                                                                            <td class='text-center'>ระดับความพึงพอใจ</td>
                                                                            <td class='text-center'>คะแนนเฉลี่ย</td>
                                                                            </tr>
                                                                        ";
                                                                        $dataAss = $assessmentObj->getAssByGroup($g['ass_group']);
                                                                        $i = 0;
                                                                        foreach ($dataAss as $ass) {
                                                                            $i++;
                                                                            if($a[$i]==0 or $countAss == 0){
                                                                                $average="";
                                                                            }else{
                                                                                $average = $a[$i]/$countAss;
                                                                            }
                                                                            $scoreAv = number_format($average,2);
                                                                            $average = AssessmentAswer($average);
                                                                            
                                                                            echo "
                                                                                <tr class=''>
                                                                                    <td   class='text-center'>{$j}.{$i}</td>
                                                                                    <td  class=''>{$ass['ass_name']}</td>
                                                                                    <td class='text-center'>
                                                                                        {$average}
                                                                                    </td>
                                                                                    <td class='text-center'>
                                                                                        {$scoreAv}
                                                                                    </td>
                                                                                </tr>
                                                                            ";
                                                                        }
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                        <?php
                                                break;
                                                case "a":
                                                    $table="tb_a_repair";
                                                    $title="การซ่อมเครื่องปรับอากาศ";
                                                    $dataAssType = $assessmentObj->getAssByType($type);
                                                    $a1=0;
                                                    $a2=0;
                                                    $a3=0;
                                                    $a4=0;
                                                    $a5=0;
                                                    $a6=0;
                                                    $a7=0;
                                                    $a8=0;
                                                    $i=0;
                                                    if(count($dataAssType)>0){
                                                        foreach($dataAssType as $ass){
                                                            $i++;
                                                            $a1+=$ass['a1'];
                                                            $a2+=$ass['a2'];
                                                            $a3+=$ass['a3'];
                                                            $a4+=$ass['a4'];
                                                            $a5+=$ass['a5'];
                                                            $a6+=$ass['a6'];
                                                            $a7+=$ass['a7'];
                                                            $a8+=$ass['a8'];
                                                        }
                                                    }
                                                    $a=array($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8);
                                                    $countRe=$repairObj->countAllRepair($year,$table);
                                                    $countAss=$i;
                                                    if($countAss==0 or $countRe == 0){
                                                        $assper =0;
                                                    }else{
                                                        $assper = $countAss*100/$countRe;
                                                    }
                                                        ?>
                                                    <h4>ผลการประเมินความพึงพอใจ <code class="font-kanit fs-18"><?php echo $title;?></code></h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <?php
                                                                    $groups = $assessmentObj->getAssGroup();
                                                                    // print_r($groups);
                                                                    $j = 0;
                                                                    foreach ($groups as $g) {
                                                                        $j++;
                                                                        echo "
                                                                            <tr class='bg-cyan fs-16'>
                                                                            <td colspan='2'>{$j}.{$g['ass_group']}</td>
                                                                            <td class='text-center'>ระดับความพึงพอใจ</td>
                                                                            </tr>
                                                                        ";
                                                                        $dataAss = $assessmentObj->getAssByGroup($g['ass_group']);
                                                                        $i = 0;
                                                                        foreach ($dataAss as $ass) {
                                                                            $i++;
                                                                            if($a[$i]==0 or $countAss == 0){
                                                                                $average="";
                                                                            }else{
                                                                                $average = $a[$i]/$countAss;
                                                                            }
                                                                            $average = AssessmentAswer($average);
                                                                            echo "
                                                                                <tr class=''>
                                                                                    <td   class='text-center'>{$j}.{$i}</td>
                                                                                    <td  class=''>{$ass['ass_name']}</td>
                                                                                    <td class='text-center'>
                                                                                        {$average}
                                                                                    </td>
                                                                                </tr>
                                                                            ";
                                                                        }
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                        <?php
                                                break;
                                                case "c":
                                                    $table="tb_c_repair";
                                                    $title="การซ่อมเครื่องคอมพิวเตอร์เจ้าหน้าที่";
                                                    $dataAssType = $assessmentObj->getAssByType($type);
                                                    $a1=0;
                                                    $a2=0;
                                                    $a3=0;
                                                    $a4=0;
                                                    $a5=0;
                                                    $a6=0;
                                                    $a7=0;
                                                    $a8=0;
                                                    $i=0;
                                                    if(count($dataAssType)>0){
                                                        foreach($dataAssType as $ass){
                                                            $i++;
                                                            $a1+=$ass['a1'];
                                                            $a2+=$ass['a2'];
                                                            $a3+=$ass['a3'];
                                                            $a4+=$ass['a4'];
                                                            $a5+=$ass['a5'];
                                                            $a6+=$ass['a6'];
                                                            $a7+=$ass['a7'];
                                                            $a8+=$ass['a8'];
                                                        }
                                                    }
                                                    $a=array($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8);
                                                    $countRe=$repairObj->countAllRepair($year,$table);
                                                    $countAss=$i;
                                                    if($countAss==0 or $countRe == 0){
                                                        $assper =0;
                                                    }else{
                                                        $assper = $countAss*100/$countRe;
                                                    }
                                                    // echo "countRe ".$countRe."<br>";
                                                    // echo "countAss ".$countAss;
                                                        ?>
                                                    <h4>ผลการประเมินความพึงพอใจ <code class="font-kanit fs-18"><?php echo $title;?></code></h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <?php
                                                                    $groups = $assessmentObj->getAssGroup();
                                                                    // print_r($groups);
                                                                    $j = 0;
                                                                    foreach ($groups as $g) {
                                                                        $j++;
                                                                        echo "
                                                                            <tr class='bg-cyan fs-16'>
                                                                            <td colspan='2'>{$j}.{$g['ass_group']}</td>
                                                                            <td class='text-center'>ระดับความพึงพอใจ</td>
                                                                            </tr>
                                                                        ";
                                                                        $dataAss = $assessmentObj->getAssByGroup($g['ass_group']);
                                                                        $i = 0;
                                                                        foreach ($dataAss as $ass) {
                                                                            $i++;
                                                                            if($a[$i]==0 or $countAss == 0){
                                                                                $average="";
                                                                            }else{
                                                                                $average = $a[$i]/$countAss;
                                                                            }
                                                                            $average = AssessmentAswer($average);
                                                                            echo "
                                                                                <tr class=''>
                                                                                    <td   class='text-center'>{$j}.{$i}</td>
                                                                                    <td  class=''>{$ass['ass_name']}</td>
                                                                                    <td class='text-center'>
                                                                                        {$average}
                                                                                    </td>
                                                                                </tr>
                                                                            ";
                                                                        }
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                        <?php
                                                break;
                                                case "r":
                                                    $table="tb_r_repair";
                                                    $title="การซ่อมเครื่องคอมพิวเตอร์ห้องเรียน";
                                                    $dataAssType = $assessmentObj->getAssByType($type);
                                                    $a1=0;
                                                    $a2=0;
                                                    $a3=0;
                                                    $a4=0;
                                                    $a5=0;
                                                    $a6=0;
                                                    $a7=0;
                                                    $a8=0;
                                                    $i=0;
                                                    if(count($dataAssType)>0){
                                                        foreach($dataAssType as $ass){
                                                            $i++;
                                                            $a1+=$ass['a1'];
                                                            $a2+=$ass['a2'];
                                                            $a3+=$ass['a3'];
                                                            $a4+=$ass['a4'];
                                                            $a5+=$ass['a5'];
                                                            $a6+=$ass['a6'];
                                                            $a7+=$ass['a7'];
                                                            $a8+=$ass['a8'];
                                                        }
                                                    }
                                                    $a=array($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8);
                                                    $countRe=$repairObj->countAllRepair($year,$table);
                                                    $countAss=$i;
                                                    if($countAss==0 or $countRe == 0){
                                                        $assper =0;
                                                    }else{
                                                        $assper = $countAss*100/$countRe;
                                                    }
                                                        ?>
                                                    <h4>ผลการประเมินความพึงพอใจ <code class="font-kanit fs-18"><?php echo $title;?></code></h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <?php
                                                                    $groups = $assessmentObj->getAssGroup();
                                                                    // print_r($groups);
                                                                    $j = 0;
                                                                    foreach ($groups as $g) {
                                                                        $j++;
                                                                        echo "
                                                                            <tr class='bg-cyan fs-16'>
                                                                            <td colspan='2'>{$j}.{$g['ass_group']}</td>
                                                                            <td class='text-center'>ระดับความพึงพอใจ</td>
                                                                            </tr>
                                                                        ";
                                                                        $dataAss = $assessmentObj->getAssByGroup($g['ass_group']);
                                                                        $i = 0;
                                                                        foreach ($dataAss as $ass) {
                                                                            $i++;
                                                                            if($a[$i]==0 or $countAss == 0){
                                                                                $average="";
                                                                            }else{
                                                                                $average = $a[$i]/$countAss;
                                                                            }
                                                                            $average = AssessmentAswer($average);
                                                                            echo "
                                                                                <tr class=''>
                                                                                    <td   class='text-center'>{$j}.{$i}</td>
                                                                                    <td  class=''>{$ass['ass_name']}</td>
                                                                                    <td class='text-center'>
                                                                                        {$average}
                                                                                    </td>
                                                                                </tr>
                                                                            ";
                                                                        }
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                        <?php
                                                break;
                                                case "l":
                                                    $table="tb_l_repair";
                                                    $title="การซ่อมเครื่องคอมพิวเตอร์ห้อง LAB 210,211";
                                                    $dataAssType = $assessmentObj->getAssByType($type);
                                                    $a1=0;
                                                    $a2=0;
                                                    $a3=0;
                                                    $a4=0;
                                                    $a5=0;
                                                    $a6=0;
                                                    $a7=0;
                                                    $a8=0;
                                                    $i=0;
                                                    if(count($dataAssType)>0){
                                                        foreach($dataAssType as $ass){
                                                            $i++;
                                                            $a1+=$ass['a1'];
                                                            $a2+=$ass['a2'];
                                                            $a3+=$ass['a3'];
                                                            $a4+=$ass['a4'];
                                                            $a5+=$ass['a5'];
                                                            $a6+=$ass['a6'];
                                                            $a7+=$ass['a7'];
                                                            $a8+=$ass['a8'];
                                                        }
                                                    }
                                                    $a=array($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8);
                                                    $countRe=$repairObj->countAllRepair($year,$table);
                                                    $countAss=$i;
                                                    if($countAss==0 or $countRe == 0){
                                                        $assper =0;
                                                    }else{
                                                        $assper = $countAss*100/$countRe;
                                                    }
                                                        ?>
                                                    <h4>ผลการประเมินความพึงพอใจ <code class="font-kanit fs-18"><?php echo $title;?></code></h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <?php
                                                                    $groups = $assessmentObj->getAssGroup();
                                                                    // print_r($groups);
                                                                    $j = 0;
                                                                    foreach ($groups as $g) {
                                                                        $j++;
                                                                        echo "
                                                                            <tr class='bg-cyan fs-16'>
                                                                            <td colspan='2'>{$j}.{$g['ass_group']}</td>
                                                                            <td class='text-center'>ระดับความพึงพอใจ</td>
                                                                            </tr>
                                                                        ";
                                                                        $dataAss = $assessmentObj->getAssByGroup($g['ass_group']);
                                                                        $i = 0;
                                                                        foreach ($dataAss as $ass) {
                                                                            $i++;
                                                                            if($a[$i]==0 or $countAss == 0){
                                                                                $average="";
                                                                            }else{
                                                                                $average = $a[$i]/$countAss;
                                                                            }
                                                                            $average = AssessmentAswer($average);
                                                                            echo "
                                                                                <tr class=''>
                                                                                    <td   class='text-center'>{$j}.{$i}</td>
                                                                                    <td  class=''>{$ass['ass_name']}</td>
                                                                                    <td class='text-center'>
                                                                                        {$average}
                                                                                    </td>
                                                                                </tr>
                                                                            ";
                                                                        }
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                        <?php
                                                break;
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <hr style="border-top: 3px solid #f44336;">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class ="bg-blue">
                                            <th class="text-center">คะแนน</th>
                                            <th class="text-center">ระดับความพึงพอใจ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">4.51 - 5.00</td>
                                            <td class="text-center">ดีมาก</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3.51 - 4.50</td>
                                            <td class="text-center">ดี</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2.51 - 3.50</td>
                                            <td class="text-center">ปานกลาง</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">1.51 - 2.50</td>
                                            <td class="text-center">น้อย</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">1.00 - 1.50</td>
                                            <td class="text-center">ปรับปรุง</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if(isset($_POST['submit']) AND $_POST['table']<>""){
                    ?>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>จำนวนผู้ตอบแบบประเมิน คิดเป็นร้อยละ</h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php $dd = number_format($assper,2);?>
                                <div class="text-center">
                                    <input type="text" class="knob" value="<?php echo $dd;?>" data-width="300" data-height="300" data-thickness="0.50" data-fgColor="#E91E63" readonly>
                                </div>
                                
                            </div>
                            <p>รายการแจ้งซ่อมทั้งหมด : <?php echo $countRe;?></p>
                            <p>รายการตอบแบบประเมินทั้งหมด : <?php echo $countAss;?></p>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ข้อเสนอแนะ</h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">   
                        <?php
                        $dataAssType = $assessmentObj->getAssByType($type);
                        // print_r($dataAssType);
                        $i=0;
                        foreach($dataAssType as $data){
                            
                            if($data['suggestion']=="" OR strlen($data['suggestion']) <= 1){
                                    
                            }else{
                                $i++;
                                echo "
                                    <p>{$i}. {$data['suggestion']}</p>
                                ";
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- export Excel -->
           
        </div>
    </section>

    <?php //require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/script-js.php"; 
    ?>
    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery Knob Plugin Js -->
    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/charts/jquery-knob.js"></script>
    <script src="../../js/pages/charts/morris.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>


    
</body>

</html>
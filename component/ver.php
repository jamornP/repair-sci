<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Science KMITL</title>
</head>
<body>
   
</body>
</html>
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
</head>

<body class="theme-deep-orange font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/page-loader.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/navbar.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/s-left-right.php";?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Update Version </h1>
            </div>

            <h3>v 1.1</h3> 
    - เพิ่มเมนูติดตามงานซ่อม<br>
    - เปลี่ยนชื่อเมนู ข้อมูลส่วนตัว
    <h3>v 2</h3>
    - ล็อกสถานะ เรียบร้อยให้เลือกได้เฉพาะ staff<br>
    - รายงานตามประเภทของการแจ้งซ่อม งานอาคาร<br>
    - รายงานเลือกระหว่างวันที่<br>
    - เพิ่มคู่มือในเมนูบาร์<br>
    - แก้ไขให้โชว์ใบงานตรงโมเดลเพิ่มสถานะการดำเนินงาน
    <h3>v 2.1</h3>
    - เพิ่มแบบประเมิน
    <h3>v 2.2</h3>
    - รายงานผลแบบประเมิน
    <h3>v 2.3</h3>
    - รายงานเลือกระหว่างวันที่ เพิ่ม เวลาที่ใช้ในการซ่อม<br>
    - รูปแบบรายงานแต่ละการแจ้งซ่อม รายปี รายเดือน แยกตามอาคาร
    - แสดงเบอร์ติดต่อ ที่หน้าเมนู staff
        </div>
    </section>
    
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
</body>

</html>

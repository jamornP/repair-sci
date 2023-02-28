-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 03:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_repairall`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_a_datastatus`
--

CREATE TABLE `tb_a_datastatus` (
  `ds_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `as_id` int(11) NOT NULL,
  `ds_remark` text NOT NULL,
  `ds_num` int(11) NOT NULL,
  `ds_date` datetime NOT NULL,
  `ds_count_time` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_a_repair`
--

CREATE TABLE `tb_a_repair` (
  `r_id` int(11) NOT NULL,
  `ar_year_term` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `s_id` int(11) NOT NULL,
  `ar_tel` varchar(255) NOT NULL,
  `ar_room` varchar(255) NOT NULL,
  `ar_floor` varchar(50) NOT NULL,
  `b_id` int(11) NOT NULL,
  `ar_remark` text NOT NULL,
  `as_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_a_status`
--

CREATE TABLE `tb_a_status` (
  `as_id` int(11) NOT NULL,
  `as_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_a_status`
--

INSERT INTO `tb_a_status` (`as_id`, `as_name`) VALUES
(1, 'แจ้ง'),
(2, 'รับเรื่อง'),
(3, 'จ่ายงาน'),
(4, 'สำรวจหน้างาน'),
(5, 'ดำเนินการซ่อม'),
(6, 'ซ่อมไม่ได้'),
(7, 'ซ่อมเสร็จ'),
(8, 'เรียบร้อย'),
(9, 'รออะไหล่'),
(10, 'รอจ้างเหมา');

-- --------------------------------------------------------

--
-- Table structure for table `tb_building`
--

CREATE TABLE `tb_building` (
  `b_id` int(11) NOT NULL COMMENT 'PK คีย์หลัก',
  `b_code` varchar(10) NOT NULL COMMENT 'รหัสอาคาร',
  `b_name` varchar(100) NOT NULL COMMENT 'ชื่ออาคาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_building`
--

INSERT INTO `tb_building` (`b_id`, `b_code`, `b_name`) VALUES
(1, 'Sc01', 'อาคารวิทยาศาสตร์ 1'),
(2, 'Sc02', 'อาคารวิทยาศาสตร์ 2'),
(3, 'Sc03', 'อาคารปฏิบัติการเทคโนโลยีพอลิเมอร์'),
(4, 'Sc04', 'อาคารจุฬาภรณวลัยลักษณ์ 1'),
(5, 'Sc05', 'อาคารหอประชุมจุฬาภรณวลัยลักษณ์'),
(6, 'Sc06', 'อาคารจุฬาภรณวลัยลักษณ์ 2'),
(7, 'Sc07', 'อาคารวิทยรังสรรค์พระจอมเกล้า'),
(8, 'Sc08', 'อาคารพระจอมเกล้า'),
(9, 'Sc-Food', 'โรงอาหาร'),
(10, 'Sc-Sport', 'สนามบาส');

-- --------------------------------------------------------

--
-- Table structure for table `tb_c_datastatus`
--

CREATE TABLE `tb_c_datastatus` (
  `ds_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `ds_remark` text NOT NULL,
  `ds_num` int(11) NOT NULL,
  `ds_date` datetime NOT NULL,
  `ds_count_time` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_c_datastatus`
--

INSERT INTO `tb_c_datastatus` (`ds_id`, `r_id`, `cs_id`, `ds_remark`, `ds_num`, `ds_date`, `ds_count_time`, `s_id`) VALUES
(1, 1, 1, 'แจ้งซ่อม', 1, '2023-02-28 13:47:23', 'เริ่มจับเวลา', 3),
(2, 1, 3, 'ผู้ใช้งาน นัดให้ไปยกเครื่องเช้าวันที่ 28 ก.พ. 66', 2, '2023-02-28 13:48:30', '1 นาที 7 วินาที', 3),
(3, 1, 3, 'ยกเคสมาสำรองข้อมูลออกและเปลี่ยนใส่ ssd hdd, clone hdd', 3, '2023-02-28 13:54:35', '6 นาที 5 วินาที', 3),
(4, 1, 3, 'format hdd เดิม ย้ายข้อมูลกลับลง HDD , update windows', 4, '2023-02-28 13:54:47', '12 วินาที', 3),
(5, 1, 3, 'ยกเคสคอมกลับไปติดตั้ง และadd printer- scan Toshiba', 5, '2023-02-28 14:55:42', '1 ชั่วโมง 0 นาที 55 วินาที', 3),
(6, 1, 8, '', 6, '2023-02-28 14:55:57', '15 วินาที', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_c_repair`
--

CREATE TABLE `tb_c_repair` (
  `r_id` int(11) NOT NULL,
  `cr_year_term` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `s_id` int(11) NOT NULL,
  `cr_tel` varchar(255) NOT NULL,
  `cr_room` varchar(255) NOT NULL,
  `cr_floor` varchar(50) NOT NULL,
  `b_id` int(11) NOT NULL,
  `cr_remark` text NOT NULL,
  `cs_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_c_repair`
--

INSERT INTO `tb_c_repair` (`r_id`, `cr_year_term`, `date_add`, `s_id`, `cr_tel`, `cr_room`, `cr_floor`, `b_id`, `cr_remark`, `cs_id`, `n_id`) VALUES
(1, 2566, '2023-02-28 13:47:23', 3, '6367', 'K-DAI', '1', 7, 'เพิ่ม SSD และลง Window ใหม่ เครื่องคุณสุธาสินี โกมลดิษฐ์', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_c_status`
--

CREATE TABLE `tb_c_status` (
  `cs_id` int(11) NOT NULL,
  `cs_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_c_status`
--

INSERT INTO `tb_c_status` (`cs_id`, `cs_name`) VALUES
(1, 'แจ้ง'),
(2, 'รับเรื่อง'),
(3, 'ดำเนินการ'),
(4, 'ซ่อมไม่ได้'),
(5, 'รอดำเนินการครั้งถัดไป'),
(6, 'ส่งบริษัทซ่อม'),
(7, 'รออะไหล่'),
(8, 'เรียบร้อย'),
(9, 'ซ่อมไม่คุ้ม');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`d_id`, `d_name`) VALUES
(1, 'ส่วนสนับสนุนวิชาการ'),
(2, 'ภาควิชาสถิติ'),
(3, 'ภาควิชาคณิตศาสตร์'),
(4, 'ภาควิชาวิทยาการคอมพิวเตอร์'),
(5, 'ภาควิชาฟิสิกส์'),
(6, 'ภาควิชาชิววิทยา'),
(7, 'ภาควิชาเคมี'),
(8, 'ศูนย์เครื่องมือ'),
(9, 'K-DAI'),
(10, 'กิจการนักศึกษา'),
(11, 'ศูนย์เครื่องมือวิทยาศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `tb_e_datastatus`
--

CREATE TABLE `tb_e_datastatus` (
  `ds_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `es_id` int(11) NOT NULL,
  `ds_remark` text NOT NULL,
  `ds_num` int(11) NOT NULL,
  `ds_date` datetime NOT NULL,
  `ds_count_time` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_e_repair`
--

CREATE TABLE `tb_e_repair` (
  `r_id` int(11) NOT NULL,
  `er_year_term` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `s_id` int(11) NOT NULL,
  `er_tel` varchar(255) NOT NULL,
  `er_room` varchar(255) NOT NULL,
  `er_floor` varchar(50) NOT NULL,
  `b_id` int(11) NOT NULL,
  `et_id` int(11) NOT NULL,
  `er_remark` text NOT NULL,
  `es_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_e_status`
--

CREATE TABLE `tb_e_status` (
  `es_id` int(11) NOT NULL,
  `es_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_e_status`
--

INSERT INTO `tb_e_status` (`es_id`, `es_name`) VALUES
(1, 'แจ้ง'),
(2, 'รับเรื่อง'),
(3, 'จ่ายงาน'),
(4, 'สำรวจหน้างาน'),
(5, 'ดำเนินการซ่อม'),
(6, 'ซ่อมไม่ได้'),
(7, 'ซ่อมเสร็จ'),
(8, 'เรียบร้อย'),
(9, 'รออะไหล่'),
(10, 'รอจ้างเหมา');

-- --------------------------------------------------------

--
-- Table structure for table `tb_e_type`
--

CREATE TABLE `tb_e_type` (
  `et_id` int(11) NOT NULL,
  `et_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_e_type`
--

INSERT INTO `tb_e_type` (`et_id`, `et_name`) VALUES
(1, 'ไฟฟ้า'),
(2, 'โทรศัพท์'),
(3, 'ประปา'),
(4, 'สุขภัณฑ์ห้องน้ำ'),
(5, 'อาคาร/ห้องเรียน'),
(6, 'วัสดุ/ครุภัณฑ์');

-- --------------------------------------------------------

--
-- Table structure for table `tb_l_datastatus`
--

CREATE TABLE `tb_l_datastatus` (
  `ds_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `ls_id` int(11) NOT NULL,
  `ds_remark` text NOT NULL,
  `ds_num` int(11) NOT NULL,
  `ds_date` datetime NOT NULL,
  `ds_count_time` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_l_repair`
--

CREATE TABLE `tb_l_repair` (
  `r_id` int(11) NOT NULL,
  `lr_year_term` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `s_id` int(11) NOT NULL,
  `lr_tel` varchar(255) NOT NULL,
  `lr_room` varchar(255) NOT NULL,
  `lr_floor` varchar(50) NOT NULL,
  `b_id` int(11) NOT NULL,
  `lr_remark` text NOT NULL,
  `ls_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_l_status`
--

CREATE TABLE `tb_l_status` (
  `ls_id` int(11) NOT NULL,
  `ls_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_l_status`
--

INSERT INTO `tb_l_status` (`ls_id`, `ls_name`) VALUES
(1, 'แจ้ง'),
(2, 'รับเรื่อง'),
(3, 'ดำเนินการ'),
(4, 'ซ่อมไม่ได้'),
(5, 'รอดำเนินการครั้งถัดไป'),
(6, 'ส่งบริษัทซ่อม'),
(7, 'รออะไหล่'),
(8, 'เรียบร้อย'),
(9, 'ซ่อมไม่คุ้ม');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_link_repair` text NOT NULL,
  `m_link_m_repair` text NOT NULL,
  `m_icon` varchar(255) NOT NULL,
  `m_table` varchar(255) NOT NULL,
  `m_images` varchar(255) NOT NULL,
  `m_show` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`m_id`, `m_name`, `m_link_repair`, `m_link_m_repair`, `m_icon`, `m_table`, `m_images`, `m_show`) VALUES
(1, 'ไฟฟ้าและประปา', '/repair-sci/pages/repair/electricity.php', '/repair-sci/pages/manage/e_repair.php', 'settings_input_composite', 'tb_e_repair', '', 1),
(2, 'เครื่องปรับอากาศ', '/repair-sci/pages/repair/air.php', '/repair-sci/pages/manage/a_repair.php', 'straighten', 'tb_a_repair', '', 1),
(3, 'คอมพิวเตอร์เจ้าหน้าที่/ Internet/Printer', '/repair-sci/pages/repair/computer.php', '/repair-sci/pages/manage/c_repair.php', 'devices', 'tb_c_repair', '', 1),
(4, 'คอมพิวเตอร์ห้องเรียน', '/repair-sci/pages/repair/room.php', '/repair-sci/pages/manage/r_repair.php', 'desktop_mac', 'tb_r_repair', '', 1),
(5, 'รายงานซ่อมไฟฟ้าและประปา', '#', '/repair-sci/pages/report/e_report.php', 'assessment', 'tb_e_repair', '', 0),
(6, 'รายงานซ่อมเครื่องปรับอากาศ', '#', '/repair-sci/pages/report/a_report.php', 'assessment', 'tb_a_repair', '', 0),
(7, 'รายงานซ่อมเครื่องคอมพิวเตอร์เจ้าหน้าที่', '#', '/repair-sci/pages/report/c_report.php', 'assessment', 'tb_c_repair', '', 0),
(8, 'รายงานซ่อมเครื่องคอมพิวเตอร์ห้องเรียน', '#', '/repair-sci/pages/report/r_report.php', 'assessment', 'tb_r_repair', '', 0),
(9, 'คอมพิวเตอร์ห้อง LAB คณะ', '/repair-sci/pages/repair/lab.php', '/repair-sci/pages/manage/l_repair.php', 'desktop_mac', 'tb_l_repair', '', 1),
(10, 'รายงานการซ่อมเครื่องคอมพิวเตอร์ห้อง LAB', '#', '/repair-sci/pages/report/l_report.php', 'assessment', 'tb_l_repair', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nature`
--

CREATE TABLE `tb_nature` (
  `n_id` int(11) NOT NULL,
  `n_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_nature`
--

INSERT INTO `tb_nature` (`n_id`, `n_name`) VALUES
(1, 'งานซ่อม'),
(2, 'ติดตั้งเพิ่ม'),
(3, 'เคลื่อนย้าย');

-- --------------------------------------------------------

--
-- Table structure for table `tb_r_datastatus`
--

CREATE TABLE `tb_r_datastatus` (
  `ds_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `rs_id` int(11) NOT NULL,
  `ds_remark` text NOT NULL,
  `ds_num` int(11) NOT NULL,
  `ds_date` datetime NOT NULL,
  `ds_count_time` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_r_repair`
--

CREATE TABLE `tb_r_repair` (
  `r_id` int(11) NOT NULL,
  `rr_year_term` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `s_id` int(11) NOT NULL,
  `rr_tel` varchar(255) NOT NULL,
  `rr_room` varchar(255) NOT NULL,
  `rr_floor` varchar(50) NOT NULL,
  `b_id` int(11) NOT NULL,
  `rr_remark` text NOT NULL,
  `rs_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_r_status`
--

CREATE TABLE `tb_r_status` (
  `rs_id` int(11) NOT NULL,
  `rs_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_r_status`
--

INSERT INTO `tb_r_status` (`rs_id`, `rs_name`) VALUES
(1, 'แจ้ง'),
(2, 'รับเรื่อง'),
(3, 'ดำเนินการ'),
(4, 'ซ่อมไม่ได้'),
(5, 'รอดำเนินการครั้งถัดไป'),
(6, 'ส่งบริษัทซ่อม'),
(7, 'รออะไหล่'),
(8, 'เรียบร้อย'),
(9, 'ซ่อมไม่คุ้ม');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `s_id` int(11) NOT NULL,
  `s_name_TH` varchar(255) NOT NULL,
  `s_name_EN` varchar(255) NOT NULL,
  `s_position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `s_tel` varchar(255) NOT NULL,
  `d_id` int(11) NOT NULL,
  `sts_id` int(50) NOT NULL,
  `s_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`s_id`, `s_name_TH`, `s_name_EN`, `s_position`, `email`, `password`, `s_tel`, `d_id`, `sts_id`, `s_images`) VALUES
(1, 'นางสาวรัตนา  ใจดี', 'Ratana  Jaidee', 'เจ้าหน้าที่บริหารงานทั่วไป', 'ratana.ja@kmitl.ac.th', '$2y$10$FWGZYDfzniPsb1eDe4e7kOX1aMcvuyb1xT7malyfDP17fOpwlaf/2', '0868919731', 1, 0, ''),
(2, 'นางสายสุดาวัลย์ สุทธิญาณ', 'Sasudawan Suttiyan', 'นักวิทยาศาสตร์', 'saisudawan.su@kmitl.ac.th', '$2y$10$ZhXtiOKT3e38.DEki8kGAONwCZWAKXofoToQnVINrD1Ws6kIfCcR2', '0847594826', 1, 0, ''),
(3, 'นายศักดา ตราช่าง', 'Sakda Trachang', 'นักวิชาการคอมพิวเตอร์', 'sakda.tr@kmitl.ac.th', '$2y$10$zWbtYTjSQDCf0twBp7wiaedobEryh.9U8uyeGscKx3PyflBXTyq46', '0970163534', 1, 0, '1-4.jpg'),
(4, 'นายสมัคร แสงจันทร์', 'Samak Sangjun', 'นักวิทยาศาสตร์', 'samak.sa@kmitl.ac.th', '$2y$10$/6jr5Hz4MEN8Ziezt9aWMeOdyoFEdXCWT75S3Vz4ETsijbzkAo88K', '0823255224', 1, 0, ''),
(5, 'นางพรรณวดี ตาทอง', 'Panwadee Tathong', 'นักบริหารทรัพยากรบุคคล', 'panwadee.ta@kmitl.ac.th', '$2y$10$Z3lKgTXQec/bXiLtJ/o57e/fmMQ8RXzrBnC/GxCgTKBI3UxmiQ70a', '0814277745', 1, 0, ''),
(6, 'นางภัควรัญชญ์ จำปาทิว', 'Phakwaran Jampativw', 'เจ้าหน้าที่บริหารงานทั่วไป', 'kloijai.ja@kmitl.ac.th', '$2y$10$3ZY0umBtl0OmaOK9aJEoD.gB4bWc//yutWRmtd28shs/LuugT/j/a', '0641974170', 1, 0, ''),
(7, 'นายสาคร สอนพงษ์', 'Sacorn Sornpong', 'นักวิทยาศาสตร์', 'sacorn.so@kmitl.ac.th', '$2y$10$5HOwFTnWo5P2FIFOmwbh3.WcjoOeMgmkdKfWnlvVwsSxqchikGjHq', '0862525704', 1, 0, ''),
(8, 'นางวิยดา แจ้งกระจ่าง', 'Viyada Chaengkrachang', 'นักวิชาการศึกษา', 'viyada.ch@kmitl.ac.th', '$2y$10$9GdammF.92A2BgaXJhvrW.NsrTPWEDC0laLeyYdm5cEpCqP5zNkl.', '0896705376', 1, 0, ''),
(9, 'นายอุดร บุญธรรม', 'Udon Boontam', 'นักวิชาการคอมพิวเตอร์', 'udon.bo@kmitl.ac.th', '$2y$10$f9WzmzDX3GaLuMw3AwE9.ufqwpSpEmToX7atFlQlW9aaLBkiP2g7K', '0821627601', 1, 0, ''),
(10, 'นายรังสรรค์ ปานทอง', 'Rangson Pantong  ', 'นักวิทยาศาสตร์', 'rangson.pa@kmitl.ac.th', '$2y$10$I/c4ResbQHNoIgyrnrInVelnxvTTCprkB/bQ8tL.9HOQWx4lOsMAu', '0819853726', 1, 0, ''),
(11, 'นางปิยาภรณ์ โพธิไชยะ', 'Piyaporn Potichaiya', 'นักวิชาการศึกษา', 'piyaporn.po@kmitl.ac.th', '$2y$10$J2vNF15HWlf/p8kS8IKDvuTADPVcrNt3ZWaBNKZLgBopICET8lbZW', '0841267402', 1, 0, ''),
(12, 'นางสาวดารัณ สอนไข่', 'Darun Sonkai', 'นักวิชาการศึกษา', 'darun.so@kmitl.ac.th.', '$2y$10$HkVQZAAB0Ivp0P5NmJquteuiF1dRsL9KbStBT79NE4AsSmud8SzJO', '0992856989', 1, 0, ''),
(13, 'นางสาววารี สกุลสุวิโรจน์', 'Waree Sakulsuwiroj', 'นักวิชาการศึกษา', 'waree.sa@kmitl.ac.th', '$2y$10$26hMKL27RSS9v2laa0tD/uBK5iFUWMj9RpBXvHnBMSk6No.J2raSq', '0991516569', 1, 0, ''),
(14, 'นายนพพล ริ้วเจริญฤทธิ์กุล', 'Noppol Riwcharoenritkul', 'เจ้าหน้าที่บริหารงานทั่วไป', 'noppol.ri@kmitl.ac.th', '$2y$10$C.2c1SrJAm7XA6GoL86zeuCdMQUvNyeGiLlr.yw4hsUgLfDLJ/EFK', '0859656651', 1, 0, ''),
(15, 'นายวีระพันธ์ ทิพาพงศ์', 'Weraphan Tipaphong', 'นักวิทยาศาสตร์', 'weraphan.ti@kmitl.ac.th', '$2y$10$4dUfK43c.8Gsw8MowmCSXOCLU.ZyjOmb3bHIDUBFWe7MjNct.bB7W', '0817199158', 1, 0, ''),
(16, 'นางสาวภูษณิศา ดิษาภิรมย์', 'Phusanisa Disaphirom', 'เจ้าหน้าที่บริหารงานทั่วไป', 'phusanisa.di@kmitl.ac.th', '$2y$10$Q.oioW8BApJ7uRHhd9jueu70N5uYH4qp3jwyie7kGbthH3kbaWuvu', '0819390622', 1, 0, ''),
(17, 'นางสุรัตน์ ศิวาคม', 'Surat Sivakom', 'เจ้าหน้าที่บริหารงานทั่วไป', 'surat.si@kmitl.ac.t', '$2y$10$R6io/WgG957Ghcpm1LzvSubaxhLGOO1VGXYYjTORLsTM3tpAf02XW', '0815509633', 1, 0, ''),
(18, 'นายพีรพัฒน์ ไกรวัฒนวงศ์', 'Peerapat Kraiwattanawong   ', 'นักวิทยาศาสตร์', 'peerapat.kr@kmitl.ac.th', '$2y$10$z4botkLCEUAkLpsUeftdx.kwzrdNFQVJxVp/dZpSKJuPfrCdATnq.', '0909854255', 1, 0, ''),
(19, 'นางสาวปรียานุช ศรีไพบูลย์', 'Priyanuch Sripaiboon', 'นักวิทยาศาสตร์', 'priyanuch.sr@kmitl.ac.th', '$2y$10$1wS2hL6u633h6Dl4N3gcX.OLlWv/SIS4q9FCpngHSZUEE3sRLwP.y', '0945396491', 1, 0, ''),
(20, 'นางสาวชลิดา ประฮาดไชย', 'Chalida Kaewcharoen ', 'เจ้าหน้าที่บริหารงานทั่วไป', 'chalida.ka@kmitl.ac.th', '$2y$10$7dIyGsOeruz/7jATguvUR.6MB3qclBXcSUJ5g8PjiXX.hsSSZd3j6', '0894451315', 1, 0, ''),
(21, 'นายสรกิจจ์ มงคล', 'Sorakit Mongkol ', 'นักวิทยาศาสตร์', 'sorakit.mo@kmitl.ac.th  ', '$2y$10$xXzeDfVrgifawGy.zUaAC.by/b.KZ03U.4.bwjKYiqUtRLH9M6i/S', '0846397503', 1, 0, ''),
(22, 'นางสาวรจนา จำกัด', 'Rotjana Jumkud ', 'เจ้าหน้าที่บริหารงานทั่วไป', 'rotjana.ju@kmitl.ac.th', '$2y$10$Gxwp4homCAhDTUVJRf000OsSJ4WjgGTgfRjIFvVPTiWtkiMtFE2BK', '0891187123', 1, 0, ''),
(23, 'นายคมสัน สืบสุข', 'Khomsan Suepsuk', 'เจ้าหน้าที่บริหารงานทั่วไป', 'komson.su@kmitl.ac.th', '$2y$10$ukieVWwy6f1uFQADB44.rOvzoaT0PEoou/04Op3jgzEfX6O9IhYwS', '0865381729', 1, 0, ''),
(24, 'นายนที โอ้ภาษี', 'Natee Ohpasee ', 'นักวิทยาศาสตร์', 'natee.op@kmitl.ac.th', '$2y$10$s5zcY53qumzkr3wIspKYP.bTyRNOuOIfoCkA8tYc09KwTOFolAvE6', '0817594621', 1, 0, ''),
(25, 'นายชัชชัย ลัทธิลักขณา', 'Chatchai Latthilakana         ', 'นักวิทยาศาสตร์', 'chatchai.la@kmitl.ac.th', '$2y$10$99S32ajiDGi5.Y/lMZjff.7qbeDUmBwHw/uAT0y8K2eCx3LuO04dW', '0870745743', 1, 0, ''),
(26, 'นางมัณทนา ไชยสีดา', 'Mantana Chaiseeda', 'เจ้าหน้าที่บริหารงานทั่วไป', 'mantana.ch@kmitl.ac.th', '$2y$10$eOgFuDtJ3FARm.o2TA5cOOYjkQFtuR4Y7aLCLyRJsuoALdbuy0Dim', '0940525914', 1, 0, ''),
(27, 'นางสาวสุชาดา ไชยวงศ์', 'Suchada Chaiyawong', 'นักวิชาการเงินและบัญชี', 'suchada.ch@kmitl.ac.th', '$2y$10$ijDL7c58uTrxmrT1NksGZ.cD7hN0Ja/.ixLwBpLMEvGNkHR6iHRDa', '0890903115', 1, 0, ''),
(28, 'นายวัชระ สิริพิพัฒน์กุล', 'Watchara​ Siriphiphatkun', 'นักวิทยาศาสตร์', 'watchara.si@kmitl.ac.th', '$2y$10$7raI8iTpiPi1dzqoNX64M.3AzGaE3gS5NMhw9UXeeZYfXihV2Yeb6', '0837999820', 1, 0, '7-4.jpg'),
(29, 'นางสาวสุปราณี อุดมบุษรา', 'Supranee Udombutsara', 'เจ้าหน้าที่บริหารงานทั่วไป', 'supranee.ud@kmitl.ac.th', '$2y$10$qOdxAtNIogLfj3ocHHPuu.apy1Ch8wP8OAK0nfblJjJe0LA2qEEke', '0865726651', 1, 0, ''),
(30, 'นางเมทินี  ฐิติกุลรัตน์', 'Metinee Thitikulrat', 'นักวิชาการศึกษา', 'metinee.su@kmitl.ac.th', '$2y$10$NduS7141ziEQpuxrH1VJr.PpicAUcv0/.pxWk52/XUMzzyqeVayl.', '0832469090', 1, 0, ''),
(31, 'นายจามร เพ็งสวย', 'Jamorn Pengsuay', 'นักวิชาการคอมพิวเตอร์', 'jamorn.pe@kmitl.ac.th', '$2y$10$tUbmct8dHhi6w6DIb2j3HOSPhiUoY5Qk4Q0QBnXlkq7xiFRMSYmYK', '0868082435', 1, 1, '3-4.jpg'),
(32, 'นายพงษ์พันธ์ ขุนทอง', 'Phongphan Khunthong', 'นักวิชาการคอมพิวเตอร์', 'phongphan.ku@kmitl.ac.th', '$2y$10$knLlotLLkzzAj7p3PJG8Gusns0Mhajn6YI0E4WNDguT9wcqbtffaC', '0851450257', 1, 0, ''),
(33, 'นางสาวรุ่งรัตน์ จิตรีขันธ์', 'Rungrat Jitrekun', 'นักวิชาการพัสดุ', 'rungrat.ji@kmitl.ac.th', '$2y$10$EW0iJ6yYEM0bBIRE/ld3.e.xhpb3xL9wuMFWN9iCLdT0gTOycwja2', '0875330101', 1, 0, ''),
(34, 'นายณัฐพล ไกรธรรม', 'Nuttapol Kraitham ', 'นักวิทยาศาสตร์', 'nuttapol.kr@kmitl.ac.th', '$2y$10$6IOet19MJjcORuZXEbu7guqhqI9KDi3lQVeu7lcGTJV1OYqVBAm76', '0968547171', 1, 0, ''),
(35, 'นายอัคริศ  ตันพิพัฒน์', 'Akarit Tanpipat', 'นักวิชาการศึกษา', 'akarit.ta@kmitl.ac.th', '$2y$10$bEGSb9SXA/LoGpo5q3vWReeMPLHtz7WOVRTvSq6I6tfE/CYXMlzG6', '0879123876', 1, 0, ''),
(36, 'นางสาวนิศาชล ศิลโรจน์', 'Nisachon Sinrot', 'นักวิเคราะห์นโยบายและแผน', 'nisachon.si@kmitl.ac.th', '$2y$10$cmDMqdJyXk6hzO5L7lvQ8OQE5bzeAhgcm5crVL2Uq7J/q9./EMZIu', '0880804648', 1, 0, ''),
(37, 'นางพิมพร อ่อนละออ', 'Pimporn Onla-or', 'นักวิทยาศาสตร์', 'pimporn.be@kmitl.ac.th', '$2y$10$3PzHOaM4BOCwIGSzcsVUJuDWrEIlUHiWi.5cs8b.3nqAPExPGGbki', '0946366951', 1, 0, ''),
(38, 'นางขวัญเรือน ศิริวัฒน์', 'Kuanreun Siriwat', 'นักวิชาการศึกษา', 'kuanreun.si@kmitl.ac.th', '$2y$10$mA7DxPOA.pMIj9zSv60vc.LIcNvyFzgXEiZfTCfugPpYKpoa8LpAq', '0868897424', 1, 0, ''),
(39, 'นางสาววรัญญา บินอานัด', 'Waranya Binarnat', 'นักวิทยาศาสตร์', 'waranya.bi@kmitl.ac.th', '$2y$10$7N2haNPDA3guo7cYuTlxDe0hRgjXf.CYocxceVz31KqVqKnPLKKli', '0899252748', 1, 0, ''),
(40, 'นายศรัณย์ สมบัติจิราภรณ์', 'Saran Sombutjiraporn', 'นักวิทยาศาสตร์', 'saran.so@kmitl.ac.th', '$2y$10$OPYi4gcoT6obCBdt3AjqE.OwNGkIZrAdcubvrN0nkDi1Pop8.siGu', '0954984623', 1, 0, ''),
(41, 'นางสาวนลิตา สว่างจิตต์', 'Nalita Sawangjit', 'นักวิทยาศาสตร์', 'nalita.sa@kmitl.ac.th', '$2y$10$bVUCN6EJW3/3l4odTMi53O3mnyRPe76dLwMD0n0VLdPGD4QtdhIrK', '0868291322', 1, 0, ''),
(42, 'นางสาววัชรายา มาศแจ้ง', 'Watchalaya Matjank', 'นักวิทยาศาสตร์', 'watchalaya.ma@kmitl.ac.th', '$2y$10$FMh3//JC95pvc2uofj1b3.yeQISduHuZoC.OVZeMbqFRb81AyvEmK', '0655088254', 1, 0, ''),
(43, 'นางสาวคุณากร ผลมา', 'Kunakorn Pholma', 'นักวิเคราะห์นโยบายและแผน', 'kunakorn.ph@kmitl.ac.th', '$2y$10$UdqFYXyd85cp2ESLxCnZFufbwfLmU6QCnuK8oH/HsQ6t/uv3A/Nde', '0633292828', 1, 0, ''),
(44, 'นางรัตติญา ไชยสุนทร', 'Rattiya Chaisuntorn', 'ผู้ปฏิบัติงานบริหาร', 'rattiya.ch@kmitl.ac.th', '$2y$10$5q3KLXpibhWoV0yE7ZpLOOCabaKJZlf0VS/tpgJ6xMWWv3ciwa5V6', '0816155089', 1, 0, ''),
(45, 'นางสาววราเศรษฐ์ พันธุ์หิรัญ', 'Waraset Phanhirun  ', 'นักวิชาการคอมพิวเตอร์', 'wannapa.ph@kmitl.ac.th', '$2y$10$S.LpO9J6Nmza6SkQenwdmufrU/FxhvddPPXkkXf0c3fs8bsenBe1q', '0957179164', 1, 0, ''),
(46, 'นายภานรินทร์ อินทรีย์', 'Panarin Insee ', 'ผู้ปฏิบัติงานวิทยาศาสตร์', 'panarin.in@kmitl.ac.th', '$2y$10$ukulPt7eynEmyDdw/APPt.8/zr./UqcYPU3rTJySGFrWrtlWP3WSi', '0972242323', 1, 0, ''),
(47, 'นายสุพจน์ ศิวาคม', 'Supot Sivakom ', 'ผู้ปฏิบัติงานวิทยาศาสตร์', 'supot.si@kmitl.ac.th', '$2y$10$78UVD687DuO21gzWs0EQUunxFv1MaXOH8D3XS/56cy3mp/2iadu3C', '0856008136', 1, 0, ''),
(48, 'นายวิรัตน์ วงษ์พลับ', 'Wirat Wongplub', 'ผู้ปฏิบัติงานบริหาร', 'wirat.wo@kmitl.ac.th', '$2y$10$EmLb53NEqiFaxvZzh7vQ4eZTAKBdKMeaDU41z4oozRBWBus/3Cjey', '0899165636', 1, 0, ''),
(49, 'นางสาวอชิรญา รุจิระกุล', 'Achiraya Rujirakul', 'นักประชาสัมพันธ์', 'achiraya.ru@kmitl.ac.th', '$2y$10$vkG.iH.aZ/NNg659wi6lLuXkxzJaX1RUnPKoEHzL4aMJLLD/OG10y', '0875669344', 1, 0, ''),
(50, 'นายชวนนท์  มะโน', 'Chawanon Mano', 'นักวิทยาศาสตร์', 'chawanon.ma@kmitl.ac.th', '$2y$10$C4dnv8haqHz7tiJsdAUy4uio0yQ7TjNpL8eSPdETz9Yu62uV9LwHO', '0824587002', 1, 0, ''),
(51, 'นางสาวยุวดี  คำแหง', 'Yuwadee Khamheang', 'นักวิทยาศาสตร์', 'yuwadee.kh@kmitl.ac.th', '$2y$10$nMcF7fEFbontuY9tB9ESvuK3E4R4tdsM/.Q82zG8HjPB3nger72s2', '0625939941​', 1, 0, ''),
(52, 'นายสุรเดช คุรุภัณฑ์', 'Suraded Kuruphan', 'นักวิชาการคอมพิวเตอร์', 'suradech.ku@kmitl.ac.th', '$2y$10$4M3QByJ50oBLdtfhKssxCu4FQmuQY5.OMpi69wdO4mswIIzzwW3SC', '0988280992', 1, 0, ''),
(53, 'นางกมนพัช นันทการ', 'Kamonaphach Nantakarn', 'นักวิทยาศาสตร์', 'kamonaphach.na@kmitl.ac.th', '$2y$10$GWNpZR1c3T7CP/6i.ODmDeUrsufYHWUiV54GCzBtaVPOrW5eF9aJy', '0831416532', 1, 0, ''),
(54, 'นางสาวเกศณี เกตุนวม', 'Kesanee Ketnuam ', 'เจ้าหน้าที่บริหารงานทั่วไป', 'kesanee.ke@kmitl.ac.th', '$2y$10$5sSPlbCiTn1rA35kqdaVYeo.yt/YFO1XuE3P1XCm3PtMfWRLl0BSS', '0863384487', 1, 0, ''),
(55, 'นางสาวธนวรรณ ศิวทัศน์', 'Thanawan Siwatat', 'เจ้าหน้าที่บริหารงานทั่วไป', 'thanawan.si@kmitl.ac.th', '$2y$10$NRP.Hi4jRxMczOKk3L0A3uKgBgQT2Q5mOZjVDYaKQ2PLnfDWxNX..', '0972249482', 1, 0, ''),
(56, 'นางสาวกัญญา มงคลโภชน์', 'Kanya Mongkolpot     ', 'นักวิทยาศาสตร์(ชำนาญการพิเศษ)', 'kanya.mo@kmitl.ac.th', '$2y$10$/fSPCmysZE4TWyF6wHy/suULRFwKYsHCqOsO.ORVShWAuMVbB2o5W', '0971528982', 1, 0, ''),
(57, 'นางสาวสุภัทร บานเย็น', 'Supat Banyen  ', 'นักวิทยาศาสตร์(ชำนาญการพิเศษ)', 'supat.ba@kmitl.ac.th', '$2y$10$xL4vgA2.lmCP3/LutasHSe9F.qOazXb867XH0Pk4NplUX7yLDXTGG', '0863688626', 1, 0, ''),
(58, 'นางสาววาณี ศรีชุ่ม', 'Wanee Srichoom', 'เจ้าหน้าที่บริหารงานทั่วไป', 'wanee.sr@kmitl.ac.th', '$2y$10$Wz3pYIA1tNZaPdWepptdaOqQkuUNOGuWOdyAs3rQVeIcprY2i9nwe', '0892043345', 1, 0, ''),
(59, 'นายจรินทร์ โพธิไชยะ', 'Jarin Potichaiya  ', 'ผู้ปฏิบัติการสอน', 'jarin.po@kmitl.ac.th', '$2y$10$wtot8vVXa8/.QxjCCBzlZe5rhiaZgsT/AeFDfFL2fcj84ioUzc3B.', '0841049143', 1, 0, ''),
(60, 'นายชัชวาลย์ เป็นสุข', 'Chatchawan Pensook', 'นักวิชาการโสตทัศนศึกษา', 'chatchawan.pe@kmitl.ac.th', '$2y$10$y3nEPXt4k48GkUgJPJqt6ugeVcYkF0drei.RoVPs3kUo1VU/bHpVS', '0819135330', 1, 0, ''),
(61, 'นายกฤษณะ เกษประดิษฐ์', 'Krisana Kespradit ', 'นักวิทยาศาสตร์', 'krisana.ke@kmitl.ac.th', '$2y$10$WA3UU.1.7SufM.Dt/ksTpeXJJF6rigEvPa9Hn7LXn8pE94ixDG0oC', '0814509835', 1, 0, ''),
(62, 'นางทองสุข ภู่ร้อย', 'Tongsuk Pooroy  ', 'ผู้ปฏิบัติงานวิทยาศาสตร์', 'tongsuk.po@kmitl.ac.th', '$2y$10$gyuYDIplCCr1Ftx2HOx0..zG7AivOAo/Lh9z0GxQMFzy7i3QGGFFi', '0859435379', 1, 0, ''),
(63, 'นางธนิดา พ่อค้าผล', 'Thanida Porkapon ', 'ผู้ปฏิบัติงานวิทยาศาสตร์', 'chanok.po@kmitl.ac.th', '$2y$10$JbwLXaeeWqBwbNoRJ29GpeARqTmGSbA739yAewle0isz.PLYh5pwe', '0846936259', 1, 0, ''),
(64, 'นางสาวภิณญาพัชญ์ ป้อมดี', 'Pinyapad Pomdee', 'เจ้าหน้าที่บริหารงานทั่วไป', 'pinyapad.po@kmitl.ac.th', '$2y$10$i4sjWalW4OpTY4IZlvdsVeE9jeQ4Q1039pbrzl.iJfyeJbO.hdv62', '0957308260', 1, 0, ''),
(65, 'นางอัจฉรา แผ้วบาง', 'Achara Phaeobang  ', 'เจ้าหน้าที่บริหารงานทั่วไป(ชำนาญการขั้นสูง)', 'achara.ph@kmitl.ac.th  ', '$2y$10$JMPe2zFmAWNiZuB5rocKx.fF40Q0Hec0OEZe6Ph8C5JFnu0EEpx8C', '0898268877', 1, 0, ''),
(66, 'นางพูลทรัพย์ วิสัยเกษม', 'Poolsub Wisaikasem', 'นักวิชาการเงินและบัญชี', 'poolsub.wi@kmitl.ac.th', '$2y$10$Y8nXSxI2C/MRV0ehBULEI.E629NwFp0wjWu1dDpy/e3EwnOfDGvAu', '0897822331', 1, 0, ''),
(67, 'นางรุ่งรัศมี ดิษฎา', 'Rungradsamee Disada', 'เจ้าหน้าที่บริหารงานทั่วไป', 'rungradsamee.di@kmitl.ac.th', '$2y$10$mPkwdyDv9vd.cg/DxGFcQO6uT/fQrPNQIIaPkygzY2mOSYPj1pzRe', '0895182933', 1, 0, ''),
(68, 'นางประไพจิต ยั่งยืน', 'Prapaichit Yungyuen', 'นักบริหารทรัพยากรบุคคล', 'prapaichit.yu@kmitl.ac.th', '$2y$10$vOXq2.R7IO6PApFDFOjhfOstQdev6UiNQB5a9BXsuoljGrhvwRtji', '0917915621', 1, 0, ''),
(69, 'นางฐิดารัด กระจ่างดารา', 'Thidarat Grajangdara', 'นักวิชาการพัสดุ', 'thidarat.gr@kmitl.ac.th', '$2y$10$eAOkgavYcxrW7fVL2uIXc.cBnPXYVXZzGGgw8fehxjJebG3JEellO', '0926104683', 1, 0, ''),
(70, 'นางสุมิตรา พ่อวิเศษ', 'Sumittra Phowiset', 'นักวิชาการเงินและบัญชี', 'sumittra.ph@kmitl.ac.th', '$2y$10$iTnpIGsF85D8O/sr0hM7gu5b13jOsNhIbaIv5FPCtlyQwOKeoVjMG', '0830224274', 1, 0, ''),
(71, 'นางกฤตพร สุขโพธารมณ์', 'Kritaporn Sookpotarom', 'นักวิชาการพัสดุ', 'kritaporn.so@kmitl.ac.th', '$2y$10$cNMM8WVzDgT1cKYlaIlCt.iwk2fdhr8xCEwavSE.DjMPbrjjrxlze', '0869983763', 1, 0, ''),
(72, 'นางสาวพัชรินทร์ ขาวสวย', 'Patcharin Khaosuai', 'เจ้าหน้าที่บริหารงานทั่วไป', 'patcharin.kh@kmitl.ac.th', '$2y$10$9NLgSpoDBfZkL1M5x.bh7O3pP5RTb18Nw6c8XRBVZURLGfQm1.ida', '0879180503', 1, 0, ''),
(73, 'นางวันณา คำทอง', 'Wanna Kumthong', 'เจ้าหน้าที่บริหารงานทั่วไป', 'wanna.ku@kmitl.ac.th', '$2y$10$I7AsZ8tqEBg8Hs9pYHB/L.ycjh7wFWIDygSNqAyxuKsyFoORx0o6u', '0898246351', 1, 0, ''),
(74, 'นางอาทิตา เสนีย์เดชกุล', 'Athita Senidetkun', 'นักวิเคราะห์นโยบายและแผน', 'athita.se@kmitl.ac.th', '$2y$10$lZDQE43bjiMijuhzPuHI0OXQh5PVNQEZh90hoQW2/PWRAsgYRbGXG', '0860029942', 1, 0, ''),
(75, 'นางสมพร พุ่มจันทร์', 'Somporn Poomjan  ', 'เจ้าหน้าที่บริหารงานทั่วไป', 'somporn.po@kmitl.ac.th', '$2y$10$hSnHpzQ6KBn/RYJVRsKJWeyl6PndLuS7PMjtASqODLTxtBa98USaW', '0813993347', 1, 0, ''),
(76, 'นางอนงค์ ผลสุขการ', 'Anong Pholsukkarn', 'เจ้าหน้าที่บริหารงานทั่วไป', 'anong.ph@kmitl.ac.th', '$2y$10$sHbvv.4eHFZyDG0B2IEFEuIm9XfmSfX7UhJE9F8OfyDvX0/.BSi3.', '0819382591', 1, 0, ''),
(77, 'นายสาโรจน์ ชูอำไพ', 'Saroj Chooampai  ', 'ผู้ปฏิบัติงานวิทยาศาสตร์', 'saroj.ch@kmitl.ac.th', '$2y$10$HJkwnHGg6Dfc1YjKFKwsL.7JOcGBHSo2vVPg4r2cbfdcm89jM2C.q', '0622077714', 1, 0, ''),
(78, 'นายสุดใจ สอนสะอาด', 'Sudjai Sonsa-ard   ', 'ผู้ปฏิบัติงานวิทยาศาสตร์', 'sudjai.so@kmitl.ac.th', '$2y$10$nr9dkV3AV/P225ZrIY0WZO/ZDyGUk./QNrpdMu2YUQYS04P4mzHTS', '0898892994', 1, 0, ''),
(79, 'ว่าที่ ร.ต. สุวัฒน์  ศิวาคม', 'Acting Sub Lt. Suwat Sivakom', 'เจ้าหน้าที่บริหารงานทั่วไป', 'suwat.si@kmitl.ac.th', '$2y$10$og6EgVGCE0Qr52hg.Pf/Qucs/5EQnUdLT.gO4Eb7RtiKyLt2WETo.', '0894421281', 1, 0, ''),
(80, 'นางสาวชนัญชิดา  ต้นเถา', 'Chananchida  Tonthao', 'แม่บ้าน', 'chananchida.to@kmitl.ac.th', '$2y$10$oSc32PnroXL9rHo3FYpVEeYY1/vl/qa4jsfqXShuFRIzHBj6O2KlO', '0867755978', 1, 0, ''),
(81, 'นายสถาพร ริสยาม', 'Sathaporn Risayam', 'ช่างไฟฟ้า', 'sathaporn.ri@kmitl.ac.th', '$2y$10$gJV/Mziwa6xaQ9fquz.rburuZj4MVO7zEz16/zj5ye.ZZ4UJ.9SnK', '0611166524', 1, 0, '8-4.jpg'),
(82, 'นายสมศักดิ์ จำปาทิว', 'Somsak Champathiw', 'พนักงานโรงพิมพ์', 'somsak.cham@kmitl.ac.th', '$2y$10$1E7cvaVcQO0kZ8nf6nTPQ.bkRUJHvwma35Znt.ARuVel5tzrp1pqC', '0928676722', 1, 0, ''),
(83, 'นายอนุพงศ์ สรงประภา', 'Anupong Srongprapa', 'รองศาสตราจารย์', 'merl.kmitl@gmail.com', '$2y$10$7cLg2wVTytXH8eP5.IrKhuM.WD.gtb/n41Bytn6n5Af9Tdy.n1iCS', '', 1, 0, ''),
(84, 'นางสาวจันทร์เทวา  ราชเจริญ', 'Chantewa Rachjaroen', 'นักวิทยาศาสตร์ ', 'juntewa41@gmail.com', '$2y$10$tKi9Tutg/PtscluoDjN3h.3AMS1qMVBNnpHk4FqKnNvAQauKvufXu', '0846518427', 1, 0, ''),
(85, 'นางสาวจิราพร ศรีสุวรรณวิเชียร', 'Jiraporn Srisuwanwichian', 'นักวิชาการพัสดุ', 'jiraporn58030411@gmail.com', '$2y$10$UGRLmr/oMeSq645Z.H6YguihlzvphaSQi5HnUBrSqylbGRdSKyOJe', '0920231381', 1, 0, ''),
(86, 'นางสาวศศิวรรณ กลิ่นนวล', 'Sasiwan Klinnuan', 'เจ้าหน้าที่บริหารงานทั่วไป', 'sasiwan.kl@kmitl.ac.th', '$2y$10$bG8AJq5bQhphNjDDZDq7j.9BCe0j1svIeSbBW.XoBd2aZEJzyXOxq', '0954012582', 1, 0, ''),
(87, 'นางสาวณัฐพร มานะประดิษฐ์', 'Nuttaporn Manapradit', 'นักวิทยาศาสตร์', 'nuttaporn.ma@kmitl.ac.th', '$2y$10$a737S43hAg2L4/IOXKPhJu6/HgaM8ncffTxHaRKwqba4AiP1XDd0.', '0853986641', 11, 0, ''),
(88, 'นายศักรินทร์ บุญล้ำ', 'Sakrin Boonlum', 'นักวิทยาศาสตร์', 'sakrin.bo@kmitl.ac.th', '$2y$10$mP/wnWEcNQrlkMxo/jM33uDDunFteUp7dE/Tf9SvJvtT.10Ec6KSa', '0841872358', 11, 0, ''),
(89, 'นางสาววาสินี ธรรมสถิต', 'Wasinee Thamsathit ', 'นักวิทยาศาสตร์', 'wasinee.th@kmitl.ac.th', '$2y$10$LaD0XwTg0ueigS0iUpgvdeoLXZMUZzpuAQx4gMu75.X/5lb3nSyVa', '0897623125', 11, 0, ''),
(90, 'นางสุดใจ ผุดผาด', 'Sudjai Phutphat', 'นักวิทยาศาสตร์ (ชำนาญการพิเศษ)', 'sudjai.ph@kmitl.ac.th', '$2y$10$hTa1long.tOUVrAJ0/VPr.Knk7UlevwulyXVYKmKy9K.XEUHICqVe', '0863848769', 11, 0, ''),
(91, 'นางสาวนันทวัน เนียมหอม', 'Nantawan Niemhom', 'นักวิทยาศาสตร์', 'nantawan.ni@kmitl.ac.th', '$2y$10$fTm10CimMYOf8Pc1nImPpOXp855iDLo1C/V0WHCMSwlx9jv9KDbXi', '0866676091', 11, 0, ''),
(92, 'นายวีรยุทธ อินบุญมา', 'Weerayut Inboonma', 'นักวิทยาศาสตร์', 'weerayut.in@kmitl.ac.th', '$2y$10$.IIt1i.dmwsIRpXG/GY0yu6pciuDH7S3QCkqnYOXrMSc8hEOpLI0.', '0858165768', 11, 0, ''),
(93, 'นางสาวณัฐนันท์ รอดสา', 'Nuttanun Rodsa', 'นักวิทยาศาสตร์', 'nuttanun.ro@kmitl.ac.th', '$2y$10$KamSQucIwN3GDtCiSIZvbegTozdrfzC3ZSbM6F6yHDUA0fja0enkO', '0830767202', 11, 0, ''),
(94, 'นางสาวธนาภรณ์ มาศวรรณา', 'Thanaporn Maswanna', 'นักวิทยาศาสตร์', 'thanaporn.ma@kmitl.ac.th', '$2y$10$AfeyAu5l86PElaTXN1nQneRYWn8dR0JG8Oq1Tb/YXfseypFwlHYZu', '0909616121', 11, 0, ''),
(95, 'นายสัญญา มีสิม', 'Sanya Meesim', 'นักวิทยาศาสตร์', 'sanya.me@kmitl.ac.th', '$2y$10$9XW7K3u/XfHI2wxXhNTt9uLQqoZEuy.ukWsWRJ3xzq/tdmj2VZx66', '0945579178', 11, 0, ''),
(96, 'นางสาวกรรณิกา รัตนวราหะ', 'Kannika Rattanawaraha', 'เจ้าหน้าที่บริหารงานทั่วไป', 'kanrat888@gmail.com', '$2y$10$mZLFLdE919TIHwIXKKL4q.cDYJdMsGVP.6mVjKwrYOOeNTExCDYM2', '0642265645', 11, 0, ''),
(97, 'นางสาวสุธาสินี โกมลดิษฐ์', 'Suthasinee Komoldit', 'เจ้าหน้าที่บริหารงานทั่วไป(ชำนาญการพิเศษ)', 'suthasinee.ko@kmitl.ac.th', '$2y$10$c9/Tg52EcvadLkJ3Szofu.meRxQShTfucJOmVGJeLEtJxAmfCtC9e', '0984253599', 9, 0, ''),
(98, 'นายศุภสรณ์ อุตรพงศ์', 'Suphasorn Utarapong', 'เจ้าหน้าที่บริหารงานทั่วไป', 'suphasorn.ut@kmitl.ac.th', '$2y$10$FgGU.JemNtPd9xe7tA/L8uqhaXZHYQ.Dj2YPTpG6FUCQVP2hHscxW', '0985351442', 9, 0, ''),
(99, 'นายสุรศักดิ์ พิพัฒน์ศาสตร์', 'Surasak Pipatsart', 'ผู้ช่วยศาสตราจารย์', 'surasak.pi@kmitl.ac.th', '$2y$10$qgl5LC2NySi15zpY0wbRHuJuv/hLWUSNeZUMwdPpBqCmCiurWTUiO', '0957726354', 5, 0, ''),
(100, 'นายประธาน บุรณศิริ', 'Prathan Buranasiri ', 'ผู้ช่วยศาสตราจารย์', 'prathan.bu@kmitl.ac.th', '$2y$10$ethR96tEjUHcvEtUdz83/uxcniKaw6CVqZX16F4m9Cs.ssIaj9rD2', '0970953982', 5, 0, ''),
(101, 'นางสาหร่าย เล็กชะอุ่ม', 'Sarai Lekchaaum', 'รองศาสตราจารย์', 'sarai.le@kmit.ac.th', '$2y$10$Kbj0BBv74xLdlEwG5reJw.8vgfaPVFC1BXv4m5iluh/t5s9g1uOjq', '0899838011', 5, 0, ''),
(102, 'นายธรรมรัตน์ แต่งตั้ง', 'Thammarat Tangtung ', 'อาจารย์', 'thammarat.ta@kmitl.ac.th', '$2y$10$W43UYhXw4cy94xFkNf5hvudwJQCxUGKUNVKqHIQjL7neMP5l1wwfi', '0813558975', 5, 0, ''),
(103, 'นายสุรชาติ กมลดิลก', 'Surachart Kamoldirok ', 'อาจารย์', 'surachart.ka@kmitl.ac.th ', '$2y$10$tSvQAWqv9zoKDwLW4PF9XOIUaAazMakN6ohA.aBwpRFRsR/ghQRPu', '0819002522', 5, 0, ''),
(104, 'นายภูมินทร์ จินดาจิธาวัฒน์', 'Phumin Jindajitawat  ', 'อาจารย์', 'phumin.ji@kmitl.ac.th', '$2y$10$TuuuiXy0hHh4RToJd0naW.9jA5dXjoilpofMRcMgpi2vaH3epsMyC', '0879375877', 5, 0, ''),
(105, 'นางสาวรัชนก สมพรเสน่ห์', 'Ratchanok Somphonsane ', 'รองศาสตราจารย์', 'ratchanok.so@kmitl.ac.th', '$2y$10$3vsfXshbmqML7KWpv50bOujy/w89q3sEs2Efkl479dsnJ/oTNoZlW', '0917062494', 5, 0, ''),
(106, 'นายณัฐพร พรหมรส', 'Nathaporn Promros', 'ผู้ช่วยศาสตราจารย์', 'nathaporn.pr@kmitl.ac.th', '$2y$10$G4rhG23kWI0Qd/L2aq.8c.aajR75gHhoY7yQY4qYncyw86rnXJy1m', '0863798648', 5, 0, ''),
(107, 'นางสาวศ.ทิพวรรณ คล้ายบุญมี', 'S.Tipawan Khlayboonme', 'ผู้ช่วยศาสตราจารย์', 's.tipawan.kh@kmitl.ac.th ', '$2y$10$1MRYkBDeB0MqVLjpKi37LechXpyJTo5b7YgGf6JhoKPvGg5o5BN2G', '0812962134', 5, 0, ''),
(108, 'นายเชรษฐา รัตนพันธ์', 'Chesta Ruttanapun', 'รองศาสตราจารย์', 'chesta.ru@kmitl.ac.th', '$2y$10$pPuOlyoJH1AcY.ZctVLOD.NAYSQVTJJYzsJzzlOhcGGMZbUG9XToK', '0815104965', 5, 0, ''),
(109, 'นางสาวอาภาภรณ์ สกุลการะเวก', 'Aparporn Sakulkalavek', 'รองศาสตราจารย์', 'aparporn.sa@kmitl.ac.th', '$2y$10$msofNiT4KQLeHOntSAY9aeDs5ZQONnJwl67DwJ/75ZA.71vt25TJW', '0817788843', 5, 0, ''),
(110, 'นายกฤษกร โล้เจริญรัตน์', 'Kitsakorn Locharoenrat', 'รองศาสตราจารย์', 'kitsakorn.lo@kmitl.ac.th', '$2y$10$xoOAtG7WiLt5Md/f/FtTEe/SwBYLmx9lkCSIFVxL27NhDofVc7Gxa', '0900071329', 5, 0, ''),
(111, 'นางสาวพิชชานันท์ ธีเศรษฐ์โศภน', 'Pichanan Teesetsopon', 'อาจารย์', 'pichanan.te@kmitl.ac.th ', '$2y$10$XS8BxbesvL2B2Pk81so2HOifW5HAb13YI9ye7wpLOtuFp0K57Ws5i', '0615569351', 5, 0, ''),
(112, 'นายภาณุพล โขลนกระโทก', 'Bhanupol Klongratog', 'ผู้ช่วยศาสตราจารย์', 'bhanupol.kl@kmitl.ac.th', '$2y$10$9H1v87/OamGVdEAttjz64efZDP28KZtEPCsH1rHsEUXjLkuFKwo16', '0850975943', 5, 2, ''),
(113, 'นายพิศาล สุขวิสูตร', 'Pisan Sukwisute', 'ผู้ช่วยศาสตราจารย์', 'pisan.su@kmitl.ac.th', '$2y$10$HQxyJ7nc0ug0Jo.2L0XXPuXgZsvo54dUtfqJYgBF6OivRNcnvzBAC', '0897375282', 5, 0, ''),
(114, 'นางสาวเมตยา กิติวรรณ', 'Mettaya Kitiwan', 'ผู้ช่วยศาสตราจารย์', 'mettaya.ki@kmitl.ac.th', '$2y$10$xukDxq9EToBPBVik5UNik.vDY4RkIDnUDPFh5PdgQd5L1wLThOtxi', '0967017697', 5, 0, ''),
(115, 'นายชินพรรธน์ รัตนศิรวิทย์', 'Chinnapat Ruttanasirawit', 'อาจารย์', 'chinapat.ru@kmitl.ac.th', '$2y$10$vqsikX4mqmRxmbWmE2EWLONEiopeBE6mWKWYoGILFWIav8IsLoEiW', '0919914599', 5, 0, ''),
(116, 'นายกีรยุทธ์ ศรีนวลจันทร์', 'Keerayut Srinuamchan ', 'อาจารย์', 'keerayoot.sr@kmitl.ac.th', '$2y$10$QxSCJh8TlmIiC2yc4143z.l6ac1cf1B.xBKsiV8CQTXEQAwn/8WtC', '0814447724', 5, 0, ''),
(117, 'นายวิฑูรย์ ยินดีสุข', 'Witoon Yindeesuk', 'อาจารย์ ', 'witoon.yi@kmitl.ac.th', '$2y$10$v5MT90aHSjM7XFpqi6CFzOpKgO059Yzkdr8rMlGNa9r8MmDKoIfia', '0954967734', 5, 0, ''),
(118, 'นายณัฏกฤษ  สมดอก', 'Nuttakrit  Somdock', 'อาจารย์', 'nuttakrit.so@kmitl.ac.th', '$2y$10$qxaxm6IJTJEx92tEiCJTPuVYJL4/oksIH6.5wtf6PGhbK7Oy1vKha', '0972528395', 5, 0, ''),
(119, 'นายลัญจกร ตันนุกิจ', 'Lunchakorn Tannukij', 'อาจารย์', 'lunchakorn.ta@kmitl.ac.th', '$2y$10$mwttSkPccG7aKN.k75Uu8eY5MRaITmZSKdcN6MBq/7lfZTqmjjJlK', '0894719635', 5, 0, ''),
(120, 'นางสาวธนภรณ์ ลีลาวัฒนานนท์', 'Thanaporn Leelawattananon', 'ผู้ช่วยศาสตราจารย์', 'tanaporn.le@kmitl.ac.th', '$2y$10$lP7BQB7XJoxav4g.hfXHVOlbQSsrKro7KOBSmp8nCVfouGIt95ms2', '0891315442', 5, 0, ''),
(121, 'นางภัทรียา ดำรงศักดิ์', 'Pattareeya Damrongsak', 'รองศาสตราจารย์ ', 'pattareeya.da@kmitl.ac.th', '$2y$10$w4.E5TZ9svXX7pw3NRYrBOEfvkCNwf0x15xoc7kj3ZOa1PJ7xApgG', '0830757087', 5, 0, ''),
(122, 'นายพิเชษฐ ลิ้มสุวรรณ', 'Pichet Limsuwan', 'ศาสตราจารย์', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '0814947323', 5, 0, ''),
(123, 'นายอุทิศ ภัควัน', 'Authit Phakkhawan', 'นักวิจัยหลังปริญญาเอก', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '', 5, 0, ''),
(124, 'นางสาวกัญญาภัค ศิลาแก้ว', 'Kanyapak Silakaew', 'นักวิจัยหลังปริญญาเอก', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '', 5, 0, ''),
(125, 'นางใจปอง เกษมสุวรรณ์', 'Jaipong Kasemsuwan', 'ผู้ช่วยศาสตราจารย์', 'jaipong.ka@kmitl.ac.th', '$2y$10$5A1AFLPf.1W8SXzVAyBK4eZ0KzOuUi7yFHm4DzytGmh5oSnDMJBy2', '0955053500', 3, 0, ''),
(126, 'นางสิริพร แฮนน่า วินเทอร์', 'Siripawn Hananhh Winter', 'อาจารย์', 'siripawn.wi@kmitl.ac.th', '$2y$10$ZDXcPW.mxlwR7FAWWg9RZ.cjTSklrtCqHVydkVLQoNdVsNqBfYoL.', '0898940822', 3, 0, ''),
(127, 'นางสาวเทิดขวัญ ช้างเผือก', 'Thurdkwun Changpuek', 'อาจารย์', 'thurdkwan.ch@kmitl.ac.th', '$2y$10$KtjvUwN1Gw5PN9.Dya/vCOX0M5X1fWpOYnZ8UW5S6tHMutbsnxjEG', '0819128445', 3, 0, ''),
(128, 'นางสาวงามเฉิด ด่านพัฒนามงคล', 'Ngarmcherd Danpattanamongkon', 'อาจารย์', 'ngarmcherd.da@kmitl.ac.th', '$2y$10$ddA9Qmt2HWbeV.Js7GcyIuKpimsjBaPKqGl/DwAgg4hkZ.QOO5jR2', '0867785221', 3, 0, ''),
(129, 'นางสาวกนกณัฏฐช์ วัฒนแจ่มศรี', 'Kanognudge Wuttanachamsri', 'รองศาสตราจารย์', 'kanognudge.wu@kmitl.ac.th', '$2y$10$vax3yX7mHF3X.L05jfhNOutfsSjDqXcvNt5RxFjOZsgQPNihDiagi', '0924244654', 3, 0, ''),
(130, 'นางสาวจิรภัทร์ หยกรัตนศักดิ์', 'Jiraphat Yokrattanasak', 'อาจารย์', 'jiraphat.yo@kmitl.ac.th', '$2y$10$9g9Iyh/J4d.H0lrS.IMlfuNZQHWesQAcAEJOEZucQCFBGlCFV6K1e', '0615954953', 3, 0, ''),
(131, 'นางสาวภูษณิศา ล้อมทอง', 'Phusanisa Lomthong', 'อาจารย์', 'phusanisa.lo@kmitl.ac.th', '$2y$10$Fi8IUjcUD68FB5gsoL5G3e3YIOK7M70dIYdbqjsNt4dEaG3uSq43S', '0875104770', 3, 0, ''),
(132, 'นางสาวละออ บุญเกษม', 'Laor Boongasame', 'รองศาสตราจารย์', 'laor.bo@kmitl.ac.th', '$2y$10$3gZPvVkEdd1hGJNBznjtXuGLYecOdH374GkNIB.69/mVWBcLjbKR6', '0909698758', 3, 0, ''),
(133, 'นางบุษยมาส พิมพ์พรรณชาติ', 'Busayamas Pimpunchat', 'ผู้ช่วยศาสตราจารย์', 'busayamas.pi@kmitl.ac.th', '$2y$10$fKGVU1Qn9QuWxXaINGeQVe.aLQfEVXv637REioiGHWK/GIX/WRuh6', '0899253531', 3, 0, ''),
(134, 'นายพรชัย ชัยสนิท', 'Pornchai Chaisanit', 'อาจารย์', 'pornchai.cha@kmitl.ac.th', '$2y$10$bJJ.26OHjjiHkKy7Z5XIb.1WaLC089a/b.1asLZsb6ZybMRVFDb36', '0812574423', 3, 0, ''),
(135, 'นางสาววรรณพร สรรประเสริฐ', 'Wannaporn Sanprasert', 'อาจารย์', 'wannaporn.sa@kmitl.ac.th', '$2y$10$qvHVwXW5msbWASWdOY57tO8SOwE3h6G3/QWaSiFjP2YvsW0hiT/wa', '0812622264', 3, 0, ''),
(136, 'นายนพรัตน์ โพธิ์ชัย', 'Nopparat Pochai', 'รองศาสตราจารย์', 'nopparat.po@kmitl.ac.th', '$2y$10$CyGDZ8nQOoCCbYAdgJloje.LcAML/5gxjkxblnLxk/fS.9oUnFA7O', '0866392168', 3, 0, ''),
(137, 'นางศุกระวรรณ มะเวชะ', 'Sukrawan Mavecha', 'ผู้ช่วยศาสตราจารย์ ', 'sukrawan.ta@kmitl.ac.th', '$2y$10$.V/LfohpelObz7C4NU05s.1ECkceSh91GV86vL1DJhFjie8n40HoS', '0818066920', 3, 0, ''),
(138, 'นายเดชา สมนะ', 'Decha Samana', 'ผู้ช่วยศาสตราจารย์ ', 'decha.sa@kmitl.ac.th', '$2y$10$jNf3T.YrpdJzuZRQbaJIBO7BV9d7KMX1t1Gr3Xk5rgYJV4o5degTa', '0875159860', 3, 0, ''),
(139, 'นายภัทราวุธ จันทร์เสงี่ยม', 'Pattrawut Chansangiam', 'รองศาสตราจารย์', 'pattrawut.ch@kmitl.ac.th', '$2y$10$wLlL/gA18fX.IGe01cp.XeLcQi1Xnh7zuQRt.yM.yd/m5pDFKadDS', '0935266600', 3, 0, ''),
(140, 'นางสาวพันธนี พงศ์สัมพันธ์', 'Puntani Pongsumpun', 'รองศาสตราจารย์', 'puntani.po@kmitl.ac.th', '$2y$10$u6JAgj/fV07/FjWjJxpfVezUL6236W6JFenx1DlJWYo/.9fdzgKBi', '0899831142', 3, 0, ''),
(141, 'นายกัมปนาท นามงาม', 'Kampanat Namngam', 'อาจารย์', 'kampanat.na@kmitl.ac.th', '$2y$10$MBNPlsuyI65dC4IAKL7ileiw.Jj7sL.2Z5RFBScUuBR3dMtISL4C2', '0824525195', 3, 0, ''),
(142, 'นางศิริกุล ศิริธีรากุล', 'Sirikul Siriteerakul', 'อาจารย์', 'sirikul.si@kmitl.ac.th', '$2y$10$I3W0QzDdh6YhrsAAa8hjl.gdW5s7/HXXzl3Pec0TNvuyYm3b5TTJK', '0896773338', 3, 0, ''),
(143, 'นายอาทิตย์ แข็งธัญการ', 'Atid Kangtunyakarn', 'รองศาสตราจารย์', 'atid.ka@kmitl.ac.th', '$2y$10$daJ3K4Z8l3/.wbaoA8G53uGZg9Q8aOgoT0dNtUOKpuKn7zGLH25l2', '0819531522', 3, 0, ''),
(144, 'นายพุทธพร วานิชกร', 'Buddhaporn Vanishkorn', 'อาจารย์', 'buddhaporn.va@kmitl.ac.th', '$2y$10$700AXWRsA17gqPKX0aa9AuGn5oVZJkghPmV8lLJggk1CuTIVMbhcm', '0952070032', 3, 0, ''),
(145, 'นายธวัชชัย คำประภัสสร', 'Thawatchai Khumprapussorn', 'ผู้ช่วยศาสตราจารย์', 'thawatchai.kh@kmitl.ac.th', '$2y$10$tipCe.0e.IXax7W56gGgpeLQun0OjdvnQaaqWSAl4AuGLf0.yW5xy', '0898191886', 3, 0, ''),
(146, 'นายพุทธา สักกะพลางกูร', 'Puttha Sakkaplangkul', 'ผู้ช่วยศาสตราจารย์', 'puttha.sa@kmitl.ac.th', '$2y$10$E.A5shBwrkU9FaQlHC5rBeLorBXscdcBFkuT5wk2m1XOHnzk7krVm', '0952070032', 3, 0, ''),
(147, 'นายณัฐพร ชื่นเจริญ', 'Nattaporn Chuenjarern', 'อาจารย์', 'nattaporn.ch@kmitl.ac.th', '$2y$10$seqJ1GI0vEJZF0R8mGRG0.eijmqdRi4fsrmRlBztcvHOkgP5madRO', '0837672304', 3, 0, ''),
(148, 'นายฉัฐไชย์ ลีนาวงศ์', 'Chartchai Leenawong', 'รองศาสตราจารย์', 'chartchai.le@kmitl.ac.th', '$2y$10$NasB1RWPbnX94c0UeRRnpOZ75/pEWv/ksceCDaT7fSyjgMAtnIu36', '0894595622', 3, 0, ''),
(149, 'นางกาญจนา คำนึงกิจ', 'Kanchana Kumnungkit', 'ผู้ช่วยศาสตราจารย์', 'kanchana.ku@kmitl.ac.th  ', '$2y$10$kwkUTSFKIl/5XFRhdpGife50aZdc39WNfyG4uKECs5DU2qNRA2Zfq', '0955596951', 3, 0, ''),
(150, 'นายจินดา ไชยช่วย', 'Chinda Chaichuay', 'อาจารย์', 'chinda.ch@kmitl.ac.th', '$2y$10$UxeyoX0nKUzt7JGLUM0kQO1015690frqTySVoCicvUOYTww60GRbi', '0922529461', 3, 0, ''),
(151, 'นายไพรบูลย์ พันธรักษ์พงษ์', 'Praiboon Pantaragphong', 'รองศาสตราจารย์', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '', 3, 0, ''),
(152, 'นายอานนท์ พลอยมุกดา', 'Arnon Ploymukda', 'นักวิจัยหลังปริญญาเอก', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '', 3, 0, ''),
(153, 'นายศังกรศรัณย์ ล่องชูผล', 'Sungkornsarun Longchupole', 'อาจารย์', 'sungkornsarun.lo@kmitl.ac.th', '$2y$10$QQfMNrlZJG9pmxqEXlC3WeAQrc9sA8R4SIpimG0wipMRZWROrGeDe', '0816296667', 4, 0, ''),
(154, 'นางวรางคณา กิ้มปาน', 'Warangkhana Kimpan', 'ผู้ช่วยศาสตราจารย์', 'warangkhana.ki@kmitl.ac.th', '$2y$10$85cUugWeoKI3dqFBcoupSe4fVSDW.5Sr4w/XSwClylhm6lcBt5L.2', '0851554839', 4, 0, ''),
(155, 'นายธีรวัฒน์ ประกอบผล', 'Teerawat Prakobphon', 'รองศาสตราจารย์', 'teerawat.pr@kmitl.ac.th', '$2y$10$vLT49gL.mbf0sL9v5y1bPO2qPnDV1r0mnQzPi3n0liinUynHm9IOC', '0814011599', 4, 0, ''),
(156, 'นายอัคคัญญ์ นรบิน', 'Akan Narabin ', 'ผู้ช่วยศาสตราจารย์', 'santit.na@kmitl.ac.th', '$2y$10$tg7oNaTOAOqj96kvaJTdnOgp25AQATVHz/EUUa6jwfRKY.JitZkuG', '0632495254', 4, 0, ''),
(157, 'นางสาวปัทมา เจริญพร', 'Pattama Charoenporn', 'ผู้ช่วยศาสตราจารย์', 'pattama.ch@kmitl.ac.th', '$2y$10$CG6uphbT13DJEVnTpT4C7elyqPXxVZ2oIFpjcykpoBHc55yGxwEjW', '0853191992', 4, 0, ''),
(158, 'นายกุลสวัสดิ์ จิตขจรวานิช', 'Kulsawasd Jitkajornwanich', 'ผู้ช่วยศาสตราจารย์ ', 'kulsawasd.ji@kmitl.ac.th', '$2y$10$jmYVQrrGDs9UnX91BvRNW.0U7iR1zIUb4WCP9v7JOOd64IOTFm7g.', '0952599192', 4, 0, ''),
(159, 'นางสาวอินทราพร อรัณยะนาค', 'Inthraporn Aranyanak', 'ผู้ช่วยศาสตราจารย์ ', 'inthraporn.ar@kmitl.ac.th', '$2y$10$5wdMPpq5g1i/J6IW9PToY.HcuQGtCiTK1eOe9zNJGWlUcJDTKkTdq', '0631891669', 4, 0, ''),
(160, 'นายวิชญะ ต่อวงศ์ไพชยนต์', 'Witchaya Towongpaichayont', 'อาจารย์', 'witchaya.to@kmitl.ac.th', '$2y$10$SKcfT4Cxz5.p3RK/sn6wbeCOI7UthLyiHa0Zhuszasn04RmWOVlj.', '0801221121', 4, 0, ''),
(161, 'นายประพจน์ ศรีนุวัตติวงศ์', 'Prapoj Srinuwattiwong', 'อาจารย์', 'prapoj.sr@kmitl.ac.th', '$2y$10$Qfm93yhtqZw8GN0koSwp8u7Lfi1/bfiQ5bMWhBtAkm.ehu2.mxYn2', '0836160999', 4, 0, ''),
(162, 'นายพีระศักดิ์  อินทรไพบูลย์', 'Peerasak Intarapaiboon', 'ผู้ช่วยศาสตราจารย์', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '0845471513', 4, 0, ''),
(163, 'นางสาวรุ่งรัตน์ เวียงศรีพนาวัลย์', 'Rungrat Wiangsripanawan', 'อาจารย์', 'rungrat.wi@kmitl.ac.th', '$2y$10$f18CqcsXNu7pk.23iIrOcOBGfZTppWWyj6fLa.g5pkG6I48BC8iWa', '0994415596', 4, 0, ''),
(164, 'นางอนันตพร หรรษคุณาฒัย', 'Anantaporn Hanskunatai', 'ผู้ช่วยศาสตราจารย์', 'anantaporn.ha@kmitl.ac.th', '$2y$10$3MI/ifS0uTaK8RvrJtq7L.ArUXByCBGTrV/npHJXsG1/4vMhC8cSC', '0866602760', 4, 0, ''),
(165, 'นายธีระ ศิริธีรากุล', 'Teera Siriteerakul', 'ผู้ช่วยศาสตราจารย์', 'teera.si@kmitl.ac.th', '$2y$10$7V7weNV.T4ffCe2gbzofhudHpmpKLlvhrkbGNCPEHqN.ox9n9Weuu', '0837888873', 4, 0, ''),
(166, 'นายสันธนะ อู่อุดมยิ่ง', 'Suntana Oudomying', 'อาจารย์', 'suntana.ou@kmitl.ac.th', '$2y$10$M4WS4HDxzLoTfh./hn.s6e.rVJrBNkgvjI2fQljR4xWJoOgfaJYRi', '0816349139', 4, 0, ''),
(167, 'นายอัคเดช อุดมชัยพร', 'Akadej Udomchaiporn', 'อาจารย์', 'akadej.ud@kmitl.ac.th', '$2y$10$b/9CnOVePOShH7UmjeH5I.5QaIh/unLDi9pNkDWNILAOujyIFeNku', '0818080335', 4, 0, ''),
(168, 'นายจักรพันธ์ เตไชยา', 'Jakapun Tachaiya', 'อาจารย์', 'jakapun.ta@kmitl.ac.th', '$2y$10$dkSlrDfdBei8NdgZjJ/Lfe2uz/ffM4q2RGUb8uKRV79AgDISMW/g.', '0970989470', 4, 0, ''),
(169, 'นางสาวบุญหทัย เครือแก้ว', 'Boonhatai Kruekaew', 'อาจารย์', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '0863637763', 4, 0, ''),
(170, 'นางสาวนวลสวาท หิรัญสกลวงศ์', 'Nualsawat Hiransakolwong', 'ผู้ช่วยศาสตราจารย์', 'nualsawat.hi@kmitl.ac.th', '$2y$10$j/f9tg0kbnKBZI5UbYsjo.TJ24xF2XOkHflHb14POg.EknHh1mHQm', '0814057819', 4, 0, ''),
(171, 'นายศรัณย์ อินทโกสุม', 'Sarun Intakosum', 'ผู้ช่วยศาสตราจารย์', 'sarun.in@kmitl.ac.th', '$2y$10$wZ8/lhk4Vp0ju.psPy8U1uNwnRVER6ljCu6NZD.yzz8MAWwGHa8Je', '0812597341', 4, 0, ''),
(172, 'นายกฤษฎา บุศรา', 'Kridsada Budsara', 'ผู้ช่วยศาสตราจารย์', 'kridsada.bu@kmitl.ac.th', '$2y$10$znVTovYeqUspYqLFKbaunuIDqzqIfg/iCci4mkT9PSXd.M56KDp5W', '0946915495', 4, 0, ''),
(173, 'นายวิสันต์ ตั้งวงษ์เจริญ', 'Wisan Tangwongcharoen', 'ผู้ช่วยศาสตราจารย์', 'wisan.ta@kmitl.ac.th', '$2y$10$XYAShykRicXfYGExvguYfu1QDtjWc2vJsGcK1ZiUL92vVPSS8aT0O', '0816162324', 4, 0, ''),
(174, 'นายสายชล สินสมบูรณ์ทอง', 'Saichon Sinsomboonthong', 'รองศาสตราจารย์', 'saichon.si@kmitl.ac.th', '$2y$10$orCtWP.z6e9KlriYDiwON.F9zzZGcJDA6uPh9OBPGKvrk7TmrjQzq', '0846399436', 2, 0, ''),
(175, 'นางสาวพรพิมล ชัยวุฒิศักดิ์', 'Pornpimol Chaiwuttisak', 'ผู้ช่วยศาสตราจารย์', 'pornpimol.ch@kmitl.ac.th', '$2y$10$RSElluUmpeExGdDd.sSEjuMseIbhRd2lfWSQATvXorA.axT0F0Q8K', '0989146526', 2, 0, ''),
(176, 'นางยุวดี กล่อมวิเศษ', 'Yuwadee Klomwises', 'ผู้ช่วยศาสตราจารย์', 'yuwadee.kl@kmitl.ac.th', '$2y$10$8siP/I/7iWxop7RqQJLJ5O0y67t4sfdHG10L4dhSNbYFSB3NsyGk.', '0897885854', 2, 0, ''),
(177, 'นางสาวอัชฌา อระวีพร', 'Autcha Araveeporn', 'รองศาสตราจารย์', 'autcha.ar@kmitl.ac.th', '$2y$10$/JZvlzOghGbh86Y63.388eorWnqK8oevXzjVj6QOovVef7ZYtp3ae', '0819325096', 2, 0, ''),
(178, 'นางสาวกนกกรรณ์ ลี้โรจนาประภา', 'Kanogkan Leerojanaprapa', 'ผู้ช่วยศาสตราจารย์', 'kanogkan.le@kmitl.ac.th', '$2y$10$.vwK.Crhpt7dmqeIJtHpM.GQG6nxi0J5cIzbsTXFcfowRGEAM8/oG', '0945450438', 2, 0, ''),
(179, 'นางสาวพรรณทิพา วาณิชย์จิรัฐติกาล', 'Puntipa Wanitjirattikal', 'ผู้ช่วยศาสตราจารย์', 'puntipa.wa@kmitl.ac.th', '$2y$10$kKI38CRBM3KGNQK5EVRv1uulxK2Js8fyNgU95Nj1y8A/HUABkabF.', '0802274154', 2, 0, ''),
(180, 'นางสาวสกุณา ศรีอโนมัย', 'Sakuna Srianomai', 'อาจารย์', 'sakuna.sr@kmitl.ac.th', '$2y$10$tDoe7bXzO99c3yxn2eYp4eF8/CILQ5BPiGDacacyjLZb33LGDR71G', '0631456947', 2, 0, ''),
(181, 'นายอัศวิน วงศ์วิวัฒน์', 'Asawin Wongwiwat', 'อาจารย์', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '0896967169', 2, 0, ''),
(182, 'นางสาวชูใจ คูหารัตนไชย', 'Choojai Kuharatanachai', 'ผู้ช่วยศาสตราจารย์', 'choojai.ku@kmitl.ac.th', '$2y$10$V5TJKQo8uY.9P1osvEIlIuUdxt7EcTQaR/6KVvIBNgCJdozhzpMWC', '0815888949', 2, 0, ''),
(183, 'นางสาวสมศรี บัณฑิตวิไล', 'Somsri Banditvilai', 'ผู้ช่วยศาสตราจารย์', 'somsri.ba@kmitl.ac.th', '$2y$10$8ugo47617tD6DSJQZmIuUu9v3Sm9jUc438WAAEeiIfW9PypjP.Afe', '0818445927', 2, 0, ''),
(184, 'นายพรชัย หลายพสุ', 'Pronchai Laipasu', 'ผู้ช่วยศาสตราจารย์', 'pornchai.la@kmitl.ac.th', '$2y$10$O7eacEc9dX/jCqlWxgbZvuwB.lT2Mdz/p0dRBdeA4zOoKI2tLLMc6', '0818439048', 2, 0, ''),
(185, 'นายสิทธิชัย เจริญเศรษฐศิลป์', 'Sittichai Charoensettasilp', 'ผู้ช่วยศาสตราจารย์', 'kcsittic.ch@kmitl.ac.th', '$2y$10$SY6LkW/7A3TQ1irg.3lsw.yVC2NWQuIqNMQV6u3QDH1vCK3ldqwlW', '0882928799', 2, 0, ''),
(186, 'นางวลัยลักษณ์ อัตธีรวงศ์', 'Walailak Atthirawong', 'รองศาสตราจารย์', 'walailak.at@kmitl.ac.th', '$2y$10$cHk3jjaNfs//dQtV5cTyR.rNqzhoSb3YF6wOL9mwcSezK1L0xyX66', '0896750621', 2, 0, ''),
(187, 'นางสาวสุจิตรา สุคนธมัต', 'Sujitra Sukonthamut', 'อาจารย์', 'sujitra.su@kmitl.ac.th', '$2y$10$6UABuIw2qUWraBMQ0wFgj.MfJ/NlJYxRf01IZb./.Q/dSsp2cZk/i', '0819099033', 2, 0, ''),
(188, 'นางสาวสุรีย์ นานาสมบัติ', 'Suree Nanasombat', 'รองศาสตราจารย์', 'suree.na@kmitl.ac.th', '$2y$10$DQhiVhzNVCr/2SaMgNvqFu08h4bDgIndb.M0ZCmS8vzRacFvckEiS', '0887325318', 6, 0, ''),
(189, 'นายพนา โลหะทรัพย์ทวี', 'Pana Lohasupthawee', 'ผู้ช่วยศาสตราจารย์', 'pana.lo@kmitl.ac.th ', '$2y$10$i6GXwekNEF.f/o.cGpDvHOV.sbAnkziFCr.nAoMSXJqpm6wzevOBu', '0894559582', 6, 0, ''),
(190, 'นางวิมลมาศ บุญมี', 'Wimonmat Boonmee', 'อาจารย์', 'wimonmat.bo@kmitl.ac.th', '$2y$10$roX6ox/K/AVveYAJuZ52YeA.Q1pgvgictz.dCwq0plg6UlMx/DuSu', '0898974197', 6, 0, ''),
(191, 'นายธิปชัย วัฒนวิจารณ์', 'Tipachai Vatanavicharn', 'ผู้ช่วยศาสตราจารย์', 'tipachai.va@kmitl.ac.th ', '$2y$10$7.ByqrXFwEM5B4SGgJ7yJOa2z71Ta28M4mrbrpSqIxVpVOOL533gm', '0805539797', 6, 0, ''),
(192, 'นายเชิดศักดิ์ มณีรัตนรุ่งโรจน์', 'Cherdsak Maneeruttanarungroj ', 'รองศาสตราจารย์', 'cherdsak.ma@kmitl.ac.th', '$2y$10$b8qabDJKqjD6JEYJTA7keOE0XfKPa40yS73.ONCZG1HdI1zGkf2t.', '0846626149', 6, 0, ''),
(193, 'นายวรกฤต วรนันทกิจ', 'Worakrit Worananthakij', 'ผู้ช่วยศาสตราจารย์', 'worakrit.wo@kmitl.ac.th', '$2y$10$uv39xwA4/d6.c1CQekhfbOzs8o4E/1ypPsWdZzCzvoYFuVzFQh8Vy', '0994195694', 6, 0, ''),
(194, 'นายณัฐวุฒิ รุ่งจินดามัย', 'Nattawut Rungjindamai', 'ผู้ช่วยศาสตราจารย์', 'nattawut.ru@kmitl.ac.th', '$2y$10$V8KEynsq/07toRpY/YMuyOxpmXjiQGhwXpvjpkw2NzBgSgcuE13ZC', '0942549691', 6, 0, ''),
(195, 'นายกานต์ วงศาริยะ', 'Karn Wongsariya', 'ผู้ช่วยศาสตราจารย์', 'karn.wo@kmitl.ac.th', '$2y$10$bmhXRWvhYDJoDrLZt3lN6OuYEcc8iWpJlxIdi2zZo4UsR/JN2LoH2', '0838328282', 6, 0, ''),
(196, 'นางสาวสมพิศ สอนโยธา', 'Somphit Sornyotha', 'ผู้ช่วยศาสตราจารย์', 'somphit.so@kmitl.ac.th', '$2y$10$e9cBUPSlLFh.uoJA5HVDpuBJiCePpViERfGTQlDFtmgiTXctAjBXW', '0817105911', 6, 0, ''),
(197, 'นางสาววิภาวี เดชติศักดิ์', 'Wipawee Dejtisakdi', 'ผู้ช่วยศาสตราจารย์', 'wipawee.de@kmitl.ac.th', '$2y$10$jMiJmX78BU5zIwyUyElvvefC7gOjvKCDpOgAwSbBQJJYew5BY11Aq', '0968847764', 6, 0, ''),
(198, 'นางสาวนฤมล ตั้งธีระสุนันท์', 'Narumon Tangthirasunun', 'อาจารย์', 'narumon.ta@kmitl.ac.th', '$2y$10$O46Y95i/6xgW6FevBxqp1OUGsk.YaiAH9/XWnLVpSGbRgXZhRk/qy', '0922764941', 6, 0, ''),
(199, 'นางนิลเนตร อัศวะศิริจินดา', 'Nilnate Assavasirijinda', 'อาจารย์', 'nilnate.as@kmitl.ac.th', '$2y$10$CeDX4dAVBx2RSNpw.w/enuKwcMXUwZzfrGOhHELcIWQMpVG4gJBwu', '0891226222', 6, 0, ''),
(200, 'นางสาวธนาวดี บุญชัยดี', 'Thanavadee boonchaidee', 'อาจารย์', 'thanavadee.ko@kmitl.ac.th', '$2y$10$f5dsqyXXyKgyqfLaywy6R.rIQTSpeUm.9dYTboMrk19AIMhqhGQ/O', '0882122929', 6, 0, ''),
(201, 'นายจิตติ ท่าไว', 'Chitti Thawai ', 'รองศาสตราจารย์', 'chitti.th@kmitl.ac.th', '$2y$10$vzpLIhFHf.cBbcZtOk3wC.6S8yRNtd5LWuZauan3Mk7hDcbYslO12', '0867934564', 6, 0, ''),
(202, 'นางสาวสุทธิจิต ศรีวัชรกุล', 'Suttijit Sriwatcharakul', 'ผู้ช่วยศาสตราจารย์', 'suttijit.sr@kmitl.ac.th', '$2y$10$LyeIPefYAzCjsw2OnrHeUulZ1irHm5Zx/tSB.cBRqwpIhVJ89wU7.', '0993964495', 6, 0, ''),
(203, 'นางสาววรภัทร์ สงวนไชยไผ่วงศ์', 'Vorapat Sanguanchaipaiwong', 'ผู้ช่วยศาสตราจารย์', 'vorapat.sa@kmitl.ac.th', '$2y$10$knFjHMH8mMFDeut.XzsulOdkISgt/eZXnlFjLSN.H34CSIMNjKJeO', '0876985528', 6, 0, ''),
(204, 'นายโชคชัย กิตติวงศ์วัฒนา', 'Chokchai Kittiwongwattana', 'รองศาสตราจารย์', 'chokchai.ki@kmitl.ac.th', '$2y$10$vx9x0fIKF/0xyzbFHYkO6u3Q1cHn5h7mrT6cF7bJyFb9ndrBPHrVO', '0924581974', 6, 0, ''),
(205, 'นางคนึงกานต์ กลั่นบุศย์', 'Khanungkan Klanbut', 'อาจารย์', 'khanungkan.kl@kmitl.ac.th ', '$2y$10$P73OLdAoHU.cRlzcXMGhp.By8xE8tS7wdJimoE5FC5f2.se2j449S', '0957052499', 6, 0, ''),
(206, 'นายบุญฤทธิ์ เมฆศิริพร', 'Bunyarit Meksiriporn', 'อาจารย์', 'bunyarit.me@kmitl.ac.th', '$2y$10$eoZeZ8FeiC3ESkFcPzzTTu19TFDbofwb7QNyiD9n/SNp6fUtjel3S', '0842654519', 6, 0, ''),
(207, 'นางสาวกวินชญา สายแก้ว', 'Kawinchaya Saikaew', 'อาจารย์', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '0926622806', 6, 0, ''),
(208, 'นายอนุรักษ์ โพธิ์เอี่ยม', 'Anurug Poeaim', 'รองศาสตราจารย์', 'anurug.po@kmitl.ac.th', '$2y$10$zRjdIP0rb5VfwlK46zCrXeagMyPcagmjdsK6MSuGY.ztwVNqKCzc6', '0817321658', 6, 0, ''),
(209, 'นางดวงใจ โอชัยกุล', 'Duangjai Ochaikul', 'รองศาสตราจารย์', 'daungjai.oc@kmitl.ac.th', '$2y$10$I.j6sKh.SIWDkCA//qpBlOkIKL1QbRe1FWLn4gK9mXc12FXijtG6e', '0814307263', 6, 0, ''),
(210, 'นางสุพัตรา โพธิ์เอี่ยม', 'Supattra Poeaim', 'รองศาสตราจารย์', 'supattra.poe@kmitl.ac.th ', '$2y$10$lJ.FTyhi98UrSr1P5bKWZuwNvDS4vCCRJ8dvy5YyNHDGzYEsseequ', '0854859399', 6, 0, ''),
(211, 'นายมงคล เพ็ญสายใจ', 'Mongkol Phensaijai', 'ผู้ช่วยศาสตราจารย์', 'mongkol.ph@kmitl.ac.th  ', '$2y$10$/Nbc.k8DNsd7LCeo1.2Qy.W08fvccP5rw1YbGSTJpDMHiHZE1PH86', '0619163247', 6, 0, ''),
(212, 'นางสาวมาริสา จาตุพรพิพัฒน์', 'Marisa Jatupornpipat', 'รองศาสตราจารย์', 'marisa.ja@kmitl.ac.th ', '$2y$10$rm2GuycNQy/MaernOt521.yiqJTBBowPtlgM7W75hTetrhiq.CaO6', '0865241177', 6, 0, ''),
(213, 'นางอารี ฤทธิบูรณ์', 'Aree Rittiboon', 'รองศาสตราจารย์', 'aree.ri@kmitl.ac.th  ', '$2y$10$4WJViBvBwc9pgcIfjVM4t.WTcYmKRxMBit.4LSzwk6t3fKZ/a27na', '0909716336', 6, 0, ''),
(214, 'นางสรัญญา พันธุ์พฤกษ์', 'Saranya Phunpruch', 'รองศาสตราจารย์', 'saranya.ph@kmitl.ac.th', '$2y$10$wr6C5kjucnS5dKx5kTjNReblE3teKSzYm54tX4RYY1r8ZutBP1O1a', '0890089397', 6, 0, ''),
(215, 'นายสมชาย ไกรรักษ์', 'Somchai Krairak', 'ผู้ช่วยศาสตราจารย์', 'somchai.kr@kmitl.ac.th', '$2y$10$Lc0wHa6VSt3foguXXUMomu0/sClaDH2VaRRVbnYkT3DNheZJX3Rha', '0918140026', 6, 0, ''),
(216, 'นายฐิติกร ดวงอุปมา', 'Thitikorn Duangupama', 'นักวิจัยหลังปริญญาเอก', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '', 6, 0, ''),
(217, 'นางสาวณัฐธิดา นุ่มวงศ์', 'Natthida Numwong', 'ผู้ช่วยศาสตราจารย์', 'natthida.nu@kmitl.ac.th', '$2y$10$LG0M8zYESXmNTDOI7F2/d.yLWXsFXcKBc8YzqtVIpa6az5HzCewZG', '0840125897', 7, 0, ''),
(218, 'นางสาวเสาวภาคย์ ธีราทรง', 'Saowapak Teerasong', 'รองศาสตราจารย์', 'saowapak.te@kmitl.ac.th', '$2y$10$hAwDR2NmZ96cfEbD1yifUOpTiMwL/K0/FCqcV8s.u093enSIncWkK', '0852298912', 7, 0, ''),
(219, 'นางสาวปานไพลิน สีหาราช', 'Panpailin Seeharaj', 'รองศาสตราจารย์', 'panpailin.se@kmitl.ac.th', '$2y$10$HpAHeY5UdsHwfvEDumCbMuNcMWl88nFYbZHxie2wdRmDCsbjzhQdm', '0896843199', 7, 0, ''),
(220, 'นายเอกรัฐ เดชศรี', 'Ekarat Detsri', 'รองศาสตราจารย์', 'ekarat.de@kmitl.ac.th', '$2y$10$juMb0.AbyA6VngkAF.nsg.ImNa/Tz.Ct8339RwPbzNcHjJupwWTwC', '0812397115', 7, 0, ''),
(221, 'นายชวาลย์ ศรีวงษ์', 'Chaval Sriwong', 'ผู้ช่วยศาสตราจารย์', 'chaval.sr@kmitl.ac.th', '$2y$10$TsDuxWdSV9/LcHF9tiSJjeuO8XKpwyb72mXL1amwjikhEe746MLgW', '0863922920', 7, 0, ''),
(222, 'นางสาวกิตติมนต์ จิระกิตติดุลย์', 'Kittimon Jirakittidul', 'อาจารย์', 'kittimon.ji@kmitl.ac.th', '$2y$10$R/wiqEPm9K8uucLJMtZDsuu4dILsKjIugm/qnl/ox6MGVt5YH3qCm', '0927961416', 7, 0, ''),
(223, 'นายกิตติศักดิ์ ชูจันทร์', 'Kittisak Choojun', 'รองศาสตราจารย์', 'kittisak.ch@kmitl.ac.th', '$2y$10$ZyTsw9d5SCso3sgz9sntQOk0RHX9uHkAp05BOw1.mPH/t0fRU3Tu2', '0910488262', 7, 0, ''),
(224, 'นายการุณย์ สาดอ่อน', 'Karoon Sadorn', 'ผู้ช่วยศาสตราจารย์', 'karoon.sa@kmitl.ac.th', '$2y$10$3m.xnE12sYfDkGVz6jUaAOHWAWaZW5A3cUaEzTk7luXn8S.E5OSN.', '0949962199', 7, 0, ''),
(225, 'นางสาวพัชราภรณ์ วีระชวนะศักดิ์', 'Patcharaporn Weerachawanasak', 'ผู้ช่วยศาสตราจารย์', 'patcharaporn.we@kmitl.ac.th', '$2y$10$qg7Nj1csZ4vDOX4wxCKo.erlyaJKejD12R8PTRulBuTzxVFH4RuGq', '0896466965', 7, 0, ''),
(226, 'นายณวสิทธิ์ โชติแสง', 'Nawasit Chotsaeng', 'ผู้ช่วยศาสตราจารย์', 'nawasit.ch@kmitl.ac.th', '$2y$10$Ewj/Epr67qZeHsZ.Nwd7EOz4au9sthimYuG3pXksBl6gP4Wgc2/oC', '0925871833', 7, 0, ''),
(227, 'นายรฐวรรธน์ แดงเงิน', 'Rathawat Daengngern', 'ผู้ช่วยศาสตราจารย์', 'rathawat.da@kmitl.ac.th', '$2y$10$nbj2N7RvT80KHStDR/74g.TyLHxzkvJp7zrKHCzxCOwbyneZt3SQ2', '0869680496', 7, 0, ''),
(228, 'นายสุธา สุทธิเรืองวงศ์', 'Sutha Sutthiruangwong', 'ผู้ช่วยศาสตราจารย์', 'sutha.su@kmitl.ac.th', '$2y$10$fxg9dw6PTwkjhM/CDg/sOeVASiYaN6I9nyuoQwbioJlDf1/AsJk.q', '0655435436,0819155247', 7, 0, ''),
(229, 'นางสาวสุวรรณี จรรยาพูน', 'Suwannee Junyapoon', 'รองศาสตราจารย์', 'suwannee.ju@kmitl.ac.th', '$2y$10$HLoqo1vQZ26OnEL8Nwy3l.GpHEBkUUB2UbSUcW6muWhYYEqAPa8ma', '0897719088', 7, 0, ''),
(230, 'นายวิบูลย์ ประดิษฐ์เวียงคำ', 'Wiboon Praditweangkum', 'ผู้ช่วยศาสตราจารย์', 'wiboon.pra@kmitl.ac.th', '$2y$10$udSyf36WUi5p0lHOLmvU8uaYt.youo/rOmuBL9kzh0CQwv9zjDdyi', '0873402424', 7, 0, ''),
(231, 'นายมนตรี ทองคำ', 'Montree Thongkam', 'รองศาสตราจารย์', 'montree.th@kmitl.ac.th', '$2y$10$8KIaikHcC4odQFI5GKq45uNQSG3J6OjBXphblUSiyIcjPtLVItqBS', '0891248236', 7, 0, ''),
(232, 'นายณัฐวุฒิ เชิงชั้น', 'Nathawut Choengchan', 'ผู้ช่วยศาสตราจารย์', 'nathawut.ch@kmitl.ac.th', '$2y$10$NHX0DoV4iKdVLycD7/h1U.gSieFjjmCK./hk80GAO1yOjRqIB57gy', '0851291486', 7, 0, ''),
(233, 'นายบรรจง บุญชม', 'Banjong Boonchom', 'รองศาสตราจารย์', 'banjong.bo@kmitl.ac.th', '$2y$10$xVLmDLaK.uA.Xu9YaBqmDOD7KFArzPGClWeQXZXxZT5WHeNXov7GW', '0868618338', 7, 0, ''),
(234, 'นายนราธิป วิทยากร', 'Naratip Vittayakorn', 'ศาสตราจารย์', 'naratip.vi@kmitl.ac.th', '$2y$10$OHa2y1SdQBEgwpwjJsDvv.d.xI6SQflGbOBDxf635KOgO1bFRkc9G', '0829013663', 7, 0, ''),
(235, 'นายภิเษก รุ่งโรจน์ชัยพร', 'Pesak Rungrojchaipon', 'ผู้ช่วยศาสตราจารย์', 'pesak.ru@kmitl.ac.th', '$2y$10$I8ktui0i9xQqS4xR8Lq7meJh72r.xiUTqKwQdWK/n7G1odU/2qZdy', '0841350734', 7, 0, ''),
(236, 'นายวรท โชติปฏิเวชกุล', 'Warot Chotpatiwetchkul', 'ผู้ช่วยศาสตราจารย์', 'warot.ch@kmitl.ac.th', '$2y$10$c6oSOwY9rEyoCoI3xh9mWOD.MS6f7fRSO8P3xbhzh6V.rmSj5fHvS', '0834754979', 7, 0, ''),
(237, 'นายอาจณรงค์ เมธาวีสรรเสริญ', 'Arjnarong Mathaweesansurn', 'ผู้ช่วยศาสตราจารย์', 'arjnarong.ma@kmitl.ac.th', '$2y$10$1W9VWUfrYs7DcgK2frIhIe4O7ELN12I1tQhX9y5eY65IfNq15i2BW', '0815354515', 7, 0, ''),
(238, 'นายจตุพร มีศิลป์', 'Jatuporn Meesin', 'อาจารย์', 'jatuporn.me@kmitl.ac.th', '$2y$10$3dW8FOGBihreJwtJIQ58PuR/4YkJO/r9cAdcoSAhuqHsQDySz4vtm', '0936292990', 7, 0, ''),
(239, 'นายอำนาจ เพิ่มทรัพย์สกุล', 'Amnat Permsubscul', 'อาจารย์', 'amnat.pe@kmitl.ac.th', '$2y$10$VJVr6zUubwV3XL6AiRtPmejBMie4532JeucrQKf1Ld78FArZvwltm', '0625211805', 7, 0, ''),
(240, 'นางสาวพัชนี เจริญยิ่ง', 'Patchanee Charolenying', 'รองศาสตราจารย์', 'patchanee.ch@kmitl.ac.th', '$2y$10$Y/bYghAfjTKuwjSxlBeLb.xrLBlIGIfjuaoJQ0cRSgJM1IvLVvwKW', '0817542249', 7, 0, ''),
(241, 'นายตะวัน สุขน้อย', 'Tawan Sooknoi', 'ศาสตราจารย์ ', 'tawan.so@kmitl.ac.th ', '$2y$10$LqShhFtRzIJRsUAEWR5fYuRVU/WpGXNM3kcHQzLlp04HJdrpMdEO.', '0819298288', 7, 0, ''),
(242, 'นายอิทธิพล แจ้งชัด', 'Ittipol Jangchud', 'รองศาสตราจารย์ ', 'ittipol.ja@kmitl.ac.th  ', '$2y$10$0q313zOckWo.1ncdDiHi6uotIPWsjwVf3xXGh4UIoibqFM8DE5dsK', '0813493585', 7, 0, ''),
(243, 'นางสาวชลลดา ฤตวิรุฬห์', 'Chonlada Ritvirulh', 'ผู้ช่วยศาสตราจารย์ ', 'chonlada.ri@kmitl.ac.th', '$2y$10$AmcnOdn5hgB0YJlNz/cgb./15Jtx/OcCk7pMroDaX5iQO6WII4.D6', '0816925458', 7, 0, ''),
(244, 'นางสุภารัตน์ รักชลธี', 'Suparat Rukchonlatee', 'ผู้ช่วยศาสตราจารย์ ', 'suparat.ru@kmitl.ac.th ', '$2y$10$STWwxo79K2mVctuayPpcb.azqRzNviPo24cFVvKADIKDaaDtg7hOi', '0818207671', 7, 0, ''),
(245, 'นางจุฑารัตน์ ปรัชญาวรากร', 'Jutarat Prachayawarakorn', 'รองศาสตราจารย์', 'jutarat.si@kmitl.ac.th', '$2y$10$od1s3yss9b7iC0Mi0SOlGufT.z5n0vype.pJCYW8womnpjxOJzfb.', '0815624623', 7, 0, ''),
(246, 'นายภัทธาวุธ มนต์วิเศษ', 'Pathavuth Monvisade', 'รองศาสตราจารย์ ', 'pathavuth.mo@kmitl.ac.th', '$2y$10$UlHHGmdh.K8hwBlfz6UFruxDmumotSTqG0AfMLSoQfEj8TttK/ewS', '0816925761', 7, 0, ''),
(247, 'นางสาวปุณณมา ศิริพันธ์โนน', 'Punnama Siriphannon', 'รองศาสตราจารย์', 'punnama.si@kmitl.ac.th', '$2y$10$iNbfSbrc5J4qXQFQPyrF/uzTCzArRwQbcbAzec/kZ2Jmec70r0qMK', '0815513233', 7, 0, ''),
(248, 'นางดวงกมล กลีสัน', 'Duangkamol Gleeson', 'รองศาสตราจารย์', 'duangkamol.gl@kmitl.ac.th', '$2y$10$/mlCCFzMGbjAX15FeyYiCOcqPyqEr12.Z6pT6x5SGPPP1KbesLfD.', '0816077000', 7, 0, ''),
(249, 'นางสาวกลิ่นสุคนธ์ สุวรรณรัตน์', 'Glinsukol Suwannarat', 'อาจารย์', 'glinsukol.su@kmitl.ac.th', '$2y$10$0m8PGUIUDigGy4X2hMO7T.rXWGy1D.h/HVuQBYYd1TDFSbsZK/hx2', '0815676951', 7, 0, ''),
(250, 'นางชมพูนุท ไชยรักษ์', 'Chompoonut Chaiyaraksa', 'รองศาสตราจารย์', 'chompoonut.ch@kmitl.ac.th', '$2y$10$iFnBzCkk0RzdelACg.FXmuID/BiculY8jZPKW3bpbRhRj6ZUUgdaa', '0971929905', 7, 0, ''),
(251, 'นางสาวรุสรีนา สาและ', 'Rusrina Salaeh', 'นักวิจัยหลังปริญญาเอก', '', '$2y$10$TrijJxPGnHkvLwNuMdg4guhwvhiiUZMo/W1c6zP3OCQbwDlF5O6uy', '', 7, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_st_menu`
--

CREATE TABLE `tb_st_menu` (
  `stm_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_st_menu`
--

INSERT INTO `tb_st_menu` (`stm_id`, `s_id`, `m_id`) VALUES
(1, 3, 3),
(2, 31, 1),
(3, 31, 2),
(4, 31, 3),
(5, 31, 4),
(6, 81, 1),
(7, 23, 1),
(8, 23, 2),
(9, 28, 2),
(10, 52, 4),
(11, 52, 3),
(12, 3, 4),
(14, 112, 1),
(15, 112, 2),
(16, 31, 5),
(17, 31, 6),
(18, 31, 7),
(19, 31, 8),
(20, 3, 7),
(21, 3, 8),
(22, 112, 5),
(23, 112, 6),
(24, 31, 9),
(25, 31, 10),
(26, 3, 9),
(27, 3, 10),
(28, 32, 9),
(29, 32, 3),
(30, 32, 4),
(31, 52, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_st_status`
--

CREATE TABLE `tb_st_status` (
  `sts_id` int(11) NOT NULL,
  `sts_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_st_status`
--

INSERT INTO `tb_st_status` (`sts_id`, `sts_name`) VALUES
(1, 'Administrator'),
(2, 'Building'),
(3, 'It'),
(4, 'Pr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_a_datastatus`
--
ALTER TABLE `tb_a_datastatus`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `tb_a_repair`
--
ALTER TABLE `tb_a_repair`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tb_a_status`
--
ALTER TABLE `tb_a_status`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `tb_building`
--
ALTER TABLE `tb_building`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tb_c_datastatus`
--
ALTER TABLE `tb_c_datastatus`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `tb_c_repair`
--
ALTER TABLE `tb_c_repair`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tb_c_status`
--
ALTER TABLE `tb_c_status`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tb_e_datastatus`
--
ALTER TABLE `tb_e_datastatus`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `tb_e_repair`
--
ALTER TABLE `tb_e_repair`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tb_e_status`
--
ALTER TABLE `tb_e_status`
  ADD PRIMARY KEY (`es_id`);

--
-- Indexes for table `tb_e_type`
--
ALTER TABLE `tb_e_type`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `tb_l_datastatus`
--
ALTER TABLE `tb_l_datastatus`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `tb_l_repair`
--
ALTER TABLE `tb_l_repair`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tb_l_status`
--
ALTER TABLE `tb_l_status`
  ADD PRIMARY KEY (`ls_id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tb_nature`
--
ALTER TABLE `tb_nature`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tb_r_datastatus`
--
ALTER TABLE `tb_r_datastatus`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `tb_r_repair`
--
ALTER TABLE `tb_r_repair`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tb_r_status`
--
ALTER TABLE `tb_r_status`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_st_menu`
--
ALTER TABLE `tb_st_menu`
  ADD PRIMARY KEY (`stm_id`);

--
-- Indexes for table `tb_st_status`
--
ALTER TABLE `tb_st_status`
  ADD PRIMARY KEY (`sts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_a_datastatus`
--
ALTER TABLE `tb_a_datastatus`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_a_repair`
--
ALTER TABLE `tb_a_repair`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_a_status`
--
ALTER TABLE `tb_a_status`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_building`
--
ALTER TABLE `tb_building`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK คีย์หลัก', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_c_datastatus`
--
ALTER TABLE `tb_c_datastatus`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_c_repair`
--
ALTER TABLE `tb_c_repair`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_c_status`
--
ALTER TABLE `tb_c_status`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_e_datastatus`
--
ALTER TABLE `tb_e_datastatus`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_e_repair`
--
ALTER TABLE `tb_e_repair`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_e_status`
--
ALTER TABLE `tb_e_status`
  MODIFY `es_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_e_type`
--
ALTER TABLE `tb_e_type`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_l_datastatus`
--
ALTER TABLE `tb_l_datastatus`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_l_repair`
--
ALTER TABLE `tb_l_repair`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_l_status`
--
ALTER TABLE `tb_l_status`
  MODIFY `ls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_nature`
--
ALTER TABLE `tb_nature`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_r_datastatus`
--
ALTER TABLE `tb_r_datastatus`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_r_repair`
--
ALTER TABLE `tb_r_repair`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_r_status`
--
ALTER TABLE `tb_r_status`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `tb_st_menu`
--
ALTER TABLE `tb_st_menu`
  MODIFY `stm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_st_status`
--
ALTER TABLE `tb_st_status`
  MODIFY `sts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

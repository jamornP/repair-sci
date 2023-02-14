<!-- Jquery Core Js -->
<script src="/repair-sci/plugins/jquery/jquery.min.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="/repair-sci/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="/repair-sci/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="/repair-sci/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="/repair-sci/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="/repair-sci/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="/repair-sci/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="/repair-sci/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="/repair-sci/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="/repair-sci/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script src="/repair-sci/js/pages/tables/jquery-datatable.js"></script>


<!-- Bootstrap Core Js -->
<script src="/repair-sci/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="/repair-sci/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="/repair-sci/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="/repair-sci/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/repair-sci/plugins/node-waves/waves.js"></script>



<!-- Bootstrap Colorpicker Js -->
<script src="/repair-sci/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

<!-- Dropzone Plugin Js -->
<script src="/repair-sci/plugins/dropzone/dropzone.js"></script>

<!-- Input Mask Plugin Js -->
<script src="/repair-sci/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Multi Select Plugin Js -->
<script src="/repair-sci/plugins/multi-select/js/jquery.multi-select.js"></script>

<!-- Jquery Spinner Plugin Js -->
<script src="/repair-sci/plugins/jquery-spinner/js/jquery.spinner.js"></script>

<!-- Bootstrap Tags Input Plugin Js -->
<script src="/repair-sci/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<!-- noUISlider Plugin Js -->
<script src="/repair-sci/plugins/nouislider/nouislider.js"></script>

<!-- Autosize Plugin Js -->
<script src="/repair-sci/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="/repair-sci/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="/repair-sci/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="/repair-sci/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Custom Js -->
<script src="/repair-sci/js/admin.js"></script>
<script src="/repair-sci/js/pages/index.js"></script>
<script src="/repair-sci/js/pages/tables/jquery-datatable.js"></script>
<script src="/repair-sci/js/pages/ui/notifications.js"></script>
<script src="/repair-sci/js/pages/forms/basic-form-elements.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="/repair-sci/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="/repair-sci/plugins/raphael/raphael.min.js"></script>
<script src="/repair-sci/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="/repair-sci/plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="/repair-sci/plugins/flot-charts/jquery.flot.js"></script>
<script src="/repair-sci/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="/repair-sci/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="/repair-sci/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="/repair-sci/plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="/repair-sci/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Demo Js -->
<script src="/repair-sci/js/demo.js"></script>


<!-- time -->
<script type="text/javascript">
$(function(){
 
 
    var nowDateTime=new Date("<?=date("m/d/Y H:i:s")?>");
    var d=nowDateTime.getTime();
    var mkHour,mkMinute,mkSecond;
     setInterval(function(){
        d=parseInt(d)+1000;
        var nowDateTime=new Date(d);
        mkHour=new String(nowDateTime.getHours());  
        if(mkHour.length==1){  
            mkHour="0"+mkHour;  
        }
        mkMinute=new String(nowDateTime.getMinutes());  
        if(mkMinute.length==1){  
            mkMinute="0"+mkMinute;  
        }        
        mkSecond=new String(nowDateTime.getSeconds());  
        if(mkSecond.length==1){  
            mkSecond="0"+mkSecond;  
        }   
        var runDateTime=mkHour+":"+mkMinute+":"+mkSecond;        
        $("#css_time_run").html(runDateTime);    
     },1000);
 
 
});
</script>






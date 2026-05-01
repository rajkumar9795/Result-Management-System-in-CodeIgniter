

<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url('assetsadmin/css/styles.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assetsadmin/demo/variations/default.css')?>" rel="stylesheet" />     
    <link href="<?php echo base_url('assetsadmin/plugins/datatables/dataTables.css')?>" rel="stylesheet" />        
    <link href="<?php echo base_url('assetsadmin/plugins/codeprettifier/prettify.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assetsadmin/plugins/form-toggle/toggles.css')?>" rel="stylesheet" />
   <link href="<?php echo base_url('AppCss/gcss.css')?>" rel="stylesheet" />
   
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="<?php echo base_url('AppJs/gjs.js?v=' . rand(1000,9999))?>"></script>  
      <?= $this->renderSection('head') ?>
</head>
<body>
  <?= $this->include('admin/shared/topmenu') ?>
    <div id="page-container">
         <?= $this->include('admin/shared/menu') ?>
          <div id="page-content">
            <div id='wrap'>   
              <?= $this->renderSection('content') ?>
            </div>
        </div>
   </div>
    <script src="<?php echo base_url('assetsadmin/js/jquery-1.10.2.min.js')?>"></script>  
    <script src="<?php echo base_url('assetsadmin/js/jqueryui-1.10.3.min.js')?>"></script>    
    <script src="<?php echo base_url('assetsadmin/js/bootstrap.min.js')?>"></script>     
     <script src="<?php echo base_url('assetsadmin/js/enquire.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/js/jquery.cookie.js')?>"></script>          
     <script src="<?php echo base_url('assetsadmin/js/jquery.nicescroll.min.js')?>"></script>
     <script src="<?php echo base_url('assetsadmin/plugins/codeprettifier/prettify.js')?>"></script>      
    <script src="<?php echo base_url('assetsadmin/plugins/easypiechart/jquery.easypiechart.min.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/plugins/sparklines/jquery.sparklines.min.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/plugins/form-toggle/toggle.min.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/plugins/datatables/dataTables.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/demo/demo-datatables.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/js/placeholdr.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/js/application.js')?>"></script>
    <script src="<?php echo base_url('assetsadmin/demo/demo.js')?>"></script>
</body>
</html>    
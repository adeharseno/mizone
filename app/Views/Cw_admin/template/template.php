<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title ?> | Seger Mizone</title>
        <base href="<?php echo base_url() ?>/<?php echo PATH_CW ?>">
        <link rel="icon" href="favicon.ico" type="image/ico">
        <link rel="stylesheet" href="assets/main/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/main/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/main/bower_components/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/main/bower_components/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="assets/main/bower_components/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="assets/main/js/bootstrap-submenu/css/bootstrap-submenu.css">
        <link rel="stylesheet" href="assets/main/dist/css/main.css">        
        <link rel="stylesheet" href="assets/main/bower_components/datatables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="assets/main/bower_components/datatables-tabletools/css/dataTables.tableTools.css">
        <link rel="stylesheet" href="assets/main/bower_components/datatables-colvis/css/dataTables.colVis.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
        <link rel="stylesheet" href="assets/main/bower_components/datatables-responsive/css/responsive.dataTables.scss">
        <link rel="stylesheet" href="assets/main/bower_components/datatables-scroller/css/scroller.dataTables.scss">
        <link href="https://cdn.datatables.net/rowreorder/1.0.0/css/rowReorder.dataTables.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="assets/main/bower_components/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="assets/main/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="assets/main/bower_components/toastr/toastr.min.css">
        <link rel="stylesheet" href="assets/custom/styles/css/style.css">        
        <link rel="stylesheet" href="<?php echo base_url('css/video-js.css'); ?>">        
    </head>
    <body>
        <div id="ui" class="ui ui-aside-none">
            <header id="header" class="ui-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <a href="<?php echo base_url('cw_admin/slider'); ?>" class="navbar-brand">
                                    <span class="logo"><img src="../images/logo.png" alt=""/></span>
                                </a>
                            </div>
                            <div class="navbar-collapse nav-responsive-disabled">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../" target="_blank" title="Live Page"><i class="ti-direction"></i></a></li>
                                    <li><a href="javascript:;" class="js-click-filemanager" title="File Manager"><i class="ti-image"></i></a></li>
                                    <li><a href="account/edit/<?php echo session()->get("user_id") ?>" title="Update Account"><?php echo session()->get("user_full_name") ?></a></li>
                                    <li><a href="dashboard/logout" title="logout"><i class="ti-power-off"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <nav class="navbar navbar-inverse yamm navbar-default hori-nav " role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#main-navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="main-navigation">
                                <ul class="nav navbar-nav">
                                    <!-- <li><a href="dashboard">Dashboard</a></li> -->
                                    <li><a href="slider">Slider</a></li>
                                    <li><a href="products">Mizone Products</a></li>
                                    <li><a href="account">Account</a></li>
                                    <!-- <li><a href="video_section">Video</a></li> -->
                                    <!-- <li><a href="sosmed">Social Media</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div id="content" class="ui-content ui-content-aside-overlay">
                <div class="ui-content-body">
                    <div class="container">
                        <div class="row hidden">
                            <div class="col-md-12">
                                <ul class="breadcrumb pull-right">
                                    <li>Home</li>
                                    <li><a href="#" class="active">Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php echo $_content ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="js-add-modal-filemanager"></div>
        
        <div class="modal fade js-modal-delete"  style="display: none;">
            <div class="modal-dialog modal-sm" >
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Delete <?php echo $class_name ?><?php echo ($class_name) ? "s" : "" ?>?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-inna btn-outlined" data-dismiss="modal">CANCEL</button>
                        <button type="button" class="btn btn-inna btn-outlined js-action-table" find="js-table" url="<?php echo $class_name ?>/delete">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/main/js/modernizr-custom.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.2/dist/jquery.min.js"></script>
        <script src="assets/main/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/main/bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="assets/main/bower_components/autosize/dist/autosize.min.js"></script>
        <script src="assets/main/js/bootstrap-submenu/js/bootstrap-submenu.js"></script>
        <script src="assets/main/js/bootstrap-hover-dropdown.js"></script>
        <script src="assets/main/js/horizontal-timeline/js/jquery.mobile.custom.min.js"></script>
        <script src="assets/main/js/horizontal-timeline/js/main.js"></script>
        <script src="assets/main/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/main/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
        <script src="assets/main/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/main/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
        <script src="assets/main/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
        <script src="assets/main/bower_components/datatables-scroller/js/dataTables.scroller.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.2.2/js/dataTables.rowReorder.min.js"></script>
        <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js"></script>        
        <script src="assets/main/bower_components/select2/dist/js/select2.min.js"></script>
        <script src="assets/main/dist/js/main.js"></script>
        <script src="assets/main/bower_components/toastr/toastr.min.js"></script>
        <script src="assets/main/js/init-toastr-notification.js"></script>
        <script src="assets/main/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/main/js/init-colorpicker.js"></script>
        <script src="assets/custom/js/jszip.js"></script>
        <script src="assets/custom/js/app.js"></script>
        <script src="assets/custom/js/script.js"></script>
        
        <script src="<?php echo base_url('js/videojs-ie8.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/video.js'); ?>"></script>
        <script src="<?php echo base_url('js/Youtube.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/main.min.js'); ?>"></script>
        
        <script type="text/javascript">
            var mainFolder = "<?php echo base_url(); ?>";
        </script>

        <?php if (file_exists(FCPATH . PATH_CW . "assets/custom/js/page/".$class_name.".js")): ?>
            <script type="text/javascript" src="assets/custom/js/page/<?php echo $class_name ?>.js?version=<?php echo time(); ?>"></script>    
        <?php endif ?>

        <script type="text/javascript">
            $(function(){
                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-bottom-center",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "4000",
                  "timeOut": "4000",
                  "extendedTimeOut": "4000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                <?php 
                    $info_message = get_flashdata("info_message"); 
                    if ($info_message){
                        ?>
                        toastr["info"]("<?php echo $info_message ?>");
                        <?php        
                    }
                ?>
                <?php 
                    $session = session();
                    $success_message = $session->getFlashdata('success_message');
                    if ($success_message){
                        ?>
                        toastr["success"]("<?php echo $success_message ?>");
                        <?php        
                    }
                ?>
            })
        </script>
    </body>
</html>

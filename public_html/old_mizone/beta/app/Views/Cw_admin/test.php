<!DOCTYPE html>
<html>
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin</title>
        <base href="<?php echo base_url()  ?><?php echo PATH_CW ?>">
        <link rel="stylesheet" href="assets/main/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/main/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/main/bower_components/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/main/bower_components/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="assets/main/bower_components/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="assets/main/bower_components/select2/dist/css/select2.min.css">

        <link rel="stylesheet" href="assets/main/dist/css/main.css">
        <link rel="stylesheet" href="assets/custom/styles/css/style.css">

        

        

        
    </head>
    <body>

        <div class="sign-in-wrapper">
            <div class="sign-container">
                <div class="text-center">
                    <h2 class="logo"><img src="../assets/images/all/logo.png" width="130px" alt=""/></h2>
                    
                </div>

                <form class="sign-in-form js-form-login" role="form" action="test" method="post" autocomplete="off" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" required="" name="username" value="<?php echo $data_post["username"] ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    </div>
                    <a href="javascript:;" class="btn btn-info btn-block mt25 btn-inna js-send">Login</a>
<?php 
if (isset($this->session->flashdata) && $this->session->flashdata("error_message") <> "") { echo $this->session->flashdata("error_message"); } 
else { echo "------"; }
?>
                </form>
                <div class="text-center copyright-txt">
                    <small>Copyright © 2017</small>

                </div>
            </div>
        </div>


        <script src="assets/main/bower_components/jquery/dist/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>        

        <script src="assets/main/js/modernizr-custom.js"></script>
        
        <script src="assets/main/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/main/bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="assets/main/bower_components/autosize/dist/autosize.min.js"></script>
        <script src="assets/main/bower_components/select2/dist/js/select2.min.js"></script>

        <script src="assets/main/dist/js/main.js"></script>
    
        <script src="assets/custom/js/app.js"></script>
        <script src="assets/custom/js/page/login.js"></script>

    </body>


</html>

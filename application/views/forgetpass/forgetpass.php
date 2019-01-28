<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url('login/')?>images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo site_url('login/')?>images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="<?php echo site_url('LoginPage/forgetpasscheck')?>" method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="text" name="phone" placeholder="เบอร์โทร">
                    <span class="focus-input100" data-placeholder="&#xf195;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <select class="input100" name="question">
                        <option value="1" style="color: #0b2e13">สัตว์เลี้ยงตัวแรกชื่อ</option>
                        <option value="2" style="color: #0b2e13">ชื่อเพื่อนสนิท</option>
                        <option value="3" style="color: #0b2e13">อาหารที่ชอบ</option>
                    </select>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="text" name="anwser" placeholder="คำตอบ">
                    <span class="focus-input100" data-placeholder="&#xf192;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="pass" placeholder="รหัสผ่านใหม่">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="row">
                    <div class="col-md-6" align="center">
                        <button type="submit" class="btn btn-info">ยืนยัน</button>
                    </div>
                    <div class="col-md-6" align="center">
                        <button class="btn btn-danger" onclick="backpage();">ย้อนกลับ</button>
                    </div>
                </div>


            </form>
            <br/><br/>

        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
<script>
    function backpage()
    {
        window.location.href = "<?php echo site_url('LoginPage/login')?>";
    }
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url('login/')?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('login/')?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('login/')?>vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url('login/')?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('login/')?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('login/')?>vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url('login/')?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('login/')?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('login/')?>js/main.js"></script>

</body>
</html>
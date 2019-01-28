<!DOCTYPE html>
<html lang="en">
<head>
    <title>Colored an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/') ?>css/style.css" rel='stylesheet' type='text/css'/>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/font.css" type="text/css"/>
    <link href="<?php echo base_url('assets/') ?>css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="<?php echo base_url('assets/') ?>js/jquery2.0.3.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/modernizr.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.cookie.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/screenfull.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/bootstrap.js"></script>
    <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }


            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });
        });
    </script>
    <!-- charts -->
    <script src="<?php echo base_url('assets/') ?>js/raphael-min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/morris.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/morris.css">
    <!-- //charts -->
    <!--skycons-icons-->
    <script src="<?php echo base_url('assets/') ?>js/skycons.js"></script>
    <script src="<?php echo base_url('assets/vue/vue.js') ?>"></script>
    <!--//skycons-icons-->
</head>
<body>
<br>
<div class="container" id="form-register">
    <h2 align="center">สมัครสมาชิก</h2><br>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-6" style="padding-left: 0">
                <div class="form-group">
                    <label>คำนำหน้า</label>
                    <select class="form-control" id="title"></select>
                </div>
            </div>
            <div class="col-md-6" style="padding-right: 0">
                <div class="form-group">
                    <label>ตำแหน่ง</label>
                    <select class="form-control" id="position">

                    </select>
                </div>
            </div>
            <div class="col-md-12" style="padding-left: 0; padding-right: 0; padding-top: 15px">
                <div class="form-group">
                    <label>บ้านเลขที่</label>
                    <input type="text" class="form-control" v-model="noaddress">
                </div>
                <div class="form-group">
                    <label>ตำบล</label>
                    <select class="form-control" id="tumbol"></select>
                </div>
                <div class="form-group">
                    <label>ชื่อเข้าสู่ระบบ</label>
                    <input type="text" class="form-control" v-model="userlogin">
                </div>
                <div class="form-group">
                    <label>คำถาม</label>
                    <select class="form-control" id="questiondetail">
                        <option value="1" style="color: #0b2e13">สัตว์เลี้ยงตัวแรกชื่อ</option>
                        <option value="2" style="color: #0b2e13">ชื่อเพื่อนสนิท</option>
                        <option value="3" style="color: #0b2e13">อาหารที่ชอบ</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>ชื่อ สกุล</label>
                <input type="text" class="form-control" v-model="name">
            </div>
            <div class="form-group">
                <label>เบอร์ติดต่อ</label>
                <input type="text" class="form-control" v-model="tel">
            </div>
            <div class="form-group">
                <label>หมู่บ้าน</label>
                <select class="form-control" id="moo"></select>
            </div>
            <div class="form-group">
                <label>รหัสผ่าน</label>
                <input type="text" class="form-control" v-model="pwd">
            </div>
            <div class="form-group">
                <label>คำตอบ</label>
                <input type="text" class="form-control" id="anwserdetail">
            </div>
        </div>
        <div class="col-md-12" style="padding-top: 15px">
            <div class="form-group">
                <label>รายละเอียดอื่นๆ</label>
                <textarea type="text" rows="2" class="form-control" v-model="detail"></textarea>
            </div>
            <button class="btn btn-success" @click="insertdata();">สมัครสมาชิก</button>
            <button class="btn btn-danger" onclick="backpage();">ย้อนกลับ</button>
        </div>

    </div>

</div>


<script src="<?php echo base_url('assets/') ?>js/proton.js"></script>
<script>
    $('#btnupdate').hide();
    new Vue({
        el: "#form-register",
        data: {
            dataposition: "",
            noaddress: "",
            name: "",
            tel: "",
            detail: "",
            pk : "",
            userlogin : "",
            pwd : "",

        },
        mounted: function () {
            $.getJSON("<?php echo site_url('GetJSON/qmoo')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#moo').append('<option value="' + v['mo_id'] + '">' + v["mo_name"] + '</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qtumbol')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#tumbol').append('<option value="' + v['tu_id'] + '">' + v["tu_name"] + '</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qtitle')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#title').append('<option value="' + v['ti_id'] + '">' + v["ti_name"] + '</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qposition')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#position').append('<option value="' + v['po_id'] + '">' + v["po_name"] + '</option>');

                });
            });
        },
        methods: {
            insertdata: function () {
                $.post("<?php echo site_url('LoginPage/register')?>", {
                    title: $('#title').val(),
                    position: $('#position').val(),
                    name: this.name,
                    noaddress: this.noaddress,
                    tel: this.tel,
                    moo: $('#moo').val(),
                    tumbol: $('#tumbol').val(),
                    detail: this.detail,
                    username : this.userlogin,
                    pwd : this.pwd,
                    questiondetail:$('#questiondetail').val(),
                    anwserdetail:$('#anwserdetail').val()
                });
                reload();
            }

        }

    });
    function reload()
    {
        location.reload();
    }
    function backpage()
    {
        window.location.href = "<?php echo site_url('LoginPage/Login')?>";
    }
</script>
</body>
</html>
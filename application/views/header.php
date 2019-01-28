<!DOCTYPE html>
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
    <script src="<?php echo base_url('assets/vue/vue.js')?>"></script>
    <!--//skycons-icons-->
</head>
<body class="dashboard-page">
<script>
    var theme = $.cookie('protonTheme') || 'default';
    $('body').removeClass(function (index, css) {
        return (css.match(/\btheme-\S+/g) || []).join(' ');
    });
    if (theme !== 'default') $('body').addClass(theme);
</script>
<nav class="main-menu">
    <ul>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-cogs" aria-hidden="true"></i>
				<span class="nav-text">
					จัดการทั่วไป
				</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/moo')?>">
                        จัดการหมู่บ้าน
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/tumbol')?>">
                        จัดการตำบล
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/position')?>">
                        จัดการตำเหน่ง
                    </a>
                </li>
            </ul>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-home nav_icon" aria-hidden="true"></i>
				<span class="nav-text">
					รับผู้ป่วย
				</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/groupproject')?>">
                        กลุ่มโครงการ
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/index')?>">
                        รับผู้ป่วยเข้า
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="<?php echo site_url('welcome/register')?>">
                <i class="fa fa-bar-chart nav_icon"></i>
					<span class="nav-text">
						จัดการสมาชิก
					</span>
            </a>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-check-square-o nav_icon"></i>
				<span class="nav-text">
				จัดการออกเยี่ยม
				</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/projectjoin')?>">เข้าร่วมโครงการ</a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/carlenda')?>">ตารางออกตรวจ</a>
                </li>

                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/fishishforvolunteer')?>">ผลกาตรวจเยี่ยม</a>
                </li>

            </ul>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-file-text-o nav_icon"></i>
                <span class="nav-text">จัดการผู้ป่วย</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/schedule')?>">
                        จัดเส้นทาง
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/leave')?>">
                        จัดการออกเยี่ยม
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/infodocter')?>">
                        ออกตรวจเยี่ยมหมอ
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/resultdoctor')?>">
                        ผลการออกเยี่ยมหมอ
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/ambulance')?>">ส่งต่อโรงพยาบาล</a>
                </li>
                <li>
                    <a class="subnav-text" href="<?php echo site_url('welcome/outofproject')?>">ออกโครงการ</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="<?php echo site_url('ReportData/reportinfomation')?>">
                <i class="icon-font nav-icon"></i>
					<span class="nav-text">
					รายงานการตรวจ
					</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('ReportData/reporthospital')?>">
                <i class="icon-table nav-icon"></i>
					<span class="nav-text">
					รายงานส่งต่อโรงบาล
					</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('ReportData/outofproject')?>">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
					<span class="nav-text">
					รายงานคนออกโครงการ
					</span>
            </a>
        </li>
<!--        <li>-->
<!--            <a href="error.html">-->
<!--                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>-->
<!--					<span class="nav-text">-->
<!--					Error Page-->
<!--					</span>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li class="has-subnav">-->
<!--            <a href="javascript:;">-->
<!--                <i class="fa fa-list-ul" aria-hidden="true"></i>-->
<!--                <span class="nav-text">Extras</span>-->
<!--                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>-->
<!--            </a>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <a class="subnav-text" href="faq.html">FAQ</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="subnav-text" href="blank.html">Blank Page</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
    </ul>
    <ul class="logout">
        <li>
            <a href="<?php echo site_url('LoginPage/logout')?>">
                <i class="icon-off nav-icon"></i>
			<span class="nav-text">
			Logout
			</span>
            </a>
        </li>
    </ul>
</nav>
<section class="wrapper scrollable">
    <nav class="user-menu">
        <a href="javascript:;" class="main-menu-access">
            <i class="icon-proton-logo"></i>
            <i class="icon-reorder"></i>
        </a>
    </nav>
    <section class="title-bar">
        <div class="logo">
            <h1><a href="index.html"><img src="<?php echo base_url('assets/')?>images/logo.png" alt=""/>Colored</a></h1>
        </div>
        <div class="full-screen">
            <section class="full-top">
                <button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
            </section>
        </div>
        <div class="w3l_search">
            <form action="#" method="post">
                <input type="text" name="search" value="Search" onfocus="this.value = '';"
                       onblur="if (this.value == '') {this.value = 'Search';}" required="">
                <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="header-right">
            <div class="profile_details_left">
                <div class="header-right-left">
                    <!--notifications of menu start -->
                    <ul class="nofitications-dropdown">
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="fa fa-envelope"></i><span class="badge">3</span></a>
                            <ul class="dropdown-menu anti-dropdown-menu w3l-msg">
                                <li>
                                    <div class="notification_header">
                                        <h3>You have 3 new messages</h3>
                                    </div>
                                </li>
                                <li><a href="#">
                                        <div class="user_img"><img src="<?php echo base_url('assets/')?>images/1.png" alt=""></div>
                                        <div class="notification_desc">
                                            <p>Lorem ipsum dolor amet</p>
                                            <p><span>1 hour ago</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                                <li class="odd"><a href="#">
                                        <div class="user_img"><img src="<?php echo base_url('assets/')?>images/2.png" alt=""></div>
                                        <div class="notification_desc">
                                            <p>Lorem ipsum dolor amet </p>
                                            <p><span>1 hour ago</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="user_img"><img src="<?php echo base_url('assets/')?>images/3.png" alt=""></div>
                                        <div class="notification_desc">
                                            <p>Lorem ipsum dolor amet </p>
                                            <p><span>1 hour ago</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                                <li>
                                    <div class="notification_bottom">
                                        <a href="#">See all messages</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-bell"></i><span class="badge blue">3</span></a>
                            <ul class="dropdown-menu anti-dropdown-menu agile-notification">
                                <li>
                                    <div class="notification_header">
                                        <h3>You have 3 new notifications</h3>
                                    </div>
                                </li>
                                <li><a href="#">
                                        <div class="user_img"><img src="<?php echo base_url('assets/')?>images/2.png" alt=""></div>
                                        <div class="notification_desc">
                                            <p>Lorem ipsum dolor amet</p>
                                            <p><span>1 hour ago</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                                <li class="odd"><a href="#">
                                        <div class="user_img"><img src="<?php echo base_url('assets/')?>images/1.png" alt=""></div>
                                        <div class="notification_desc">
                                            <p>Lorem ipsum dolor amet </p>
                                            <p><span>1 hour ago</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="user_img"><img src="<?php echo base_url('assets/')?>images/3.png" alt=""></div>
                                        <div class="notification_desc">
                                            <p>Lorem ipsum dolor amet </p>
                                            <p><span>1 hour ago</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                                <li>
                                    <div class="notification_bottom">
                                        <a href="#">See all notifications</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-tasks"></i><span class="badge blue1">15</span></a>
                            <ul class="dropdown-menu anti-dropdown-menu agile-task">
                                <li>
                                    <div class="notification_header">
                                        <h3>You have 8 pending tasks</h3>
                                    </div>
                                </li>
                                <li><a href="#">
                                        <div class="task-info">
                                            <span class="task-desc">Database update</span><span
                                                class="percentage">40%</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="bar yellow" style="width:40%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="task-info">
                                            <span class="task-desc">Dashboard done</span><span
                                                class="percentage">90%</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="bar green" style="width:90%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="task-info">
                                            <span class="task-desc">Mobile App</span><span class="percentage">33%</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="bar red" style="width: 33%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="task-info">
                                            <span class="task-desc">Issues fixed</span><span
                                                class="percentage">80%</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="bar  blue" style="width: 80%;"></div>
                                        </div>
                                    </a></li>
                                <li>
                                    <div class="notification_bottom">
                                        <a href="#">See all pending tasks</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="profile_details">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="main-grid">
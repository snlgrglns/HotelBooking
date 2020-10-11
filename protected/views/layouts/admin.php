<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/dist/css/admin-custom.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>UGUST</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>AUGUST</b>LAKE RESORT</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success" id="cont1"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><a href="<?php echo Yii::app()->request->baseUrl; ?>/contact/admin">You have <span id="cont2"></span> not viewed messages</a></li>
                        </ul>
                    </li><!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning" id="not"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><a href="<?php echo Yii::app()->request->baseUrl; ?>/customerinfo/notviewed">You have <span id="bel_not"></span> not viewed customers.</a></li>
                            <li class="header"><a href="<?php echo Yii::app()->request->baseUrl; ?>/customerinfo/pending">You have <span id="pending"></span> pending customers.</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger" id="task"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/customerinfo/pickup">
                                            <h3>
                                                <span id="pick"></span> pick up at airport today
                                            </h3>
                                        </a>
                                    </li>

                                    <li><!-- Task item -->
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/customerinfo/arriving">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                You have arriving <span id="arrv"></span> Customers
                                            </h3>
                                        </a>
                                    </li><!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/customerinfo/leaving">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                You have <span id="leav"></span> leaving
                                            </h3>
                                        </a>
                                    </li><!-- end task item -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo ucwords(strtolower(Yii::app()->user->fullname))?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-footer">
                                <?php echo CHtml::link('Change Password',array('admin/chpw'), array('class'=>'btn btn-default btn-flat')); ?>

                                <?php echo CHtml::link('Sign out',array('site/logout'), array('class'=>'btn btn-default btn-flat')); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="treeview">
                    <a href="#"><i class='fa fa-gear'></i> <span>Settings</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><?php echo CHtml::link('User',array('admin/admin')); ?></li>
                        <li><?php echo CHtml::link('Contents',array('contents/admin')); ?></li>
                        <li><?php echo CHtml::link('Hotel Name',array('address/admin')); ?></li>
                        <li><?php echo CHtml::link('Logo',array('logo/admin')); ?></li>
                        <li><?php echo CHtml::link('Slider',array('slider/admin')); ?></li>
                        <li><?php echo CHtml::link('Room',array('room/admin')); ?></li>
                        <li><?php echo CHtml::link('Services',array('services/admin')); ?></li>
                        <li><?php echo CHtml::link('Testimonials',array('testimonials/admin')); ?></li>
                        <li><?php echo CHtml::link('Staff',array('staff/admin')); ?></li>
                    </ul>
                </li>
                <li><a href="#"><i class='fa fa-link'></i> <span>Another Link</span></a></li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-edit'></i> <span>Bookings</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><?php echo CHtml::link('Booked Rooms',array('bookedroom/admin')); ?></li>
                        <li><?php echo CHtml::link('Customers',array('customerinfo/admin')); ?></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-edit'></i> <span>Restaurant</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><?php echo CHtml::link('Logo',array('restrologo/admin')); ?></li>
                        <li><?php echo CHtml::link('Slider',array('restroslider/admin')); ?></li>
                        <li><?php echo CHtml::link('Left Moving Image',array('restroleftimg/admin')); ?></li>
                        <li><?php echo CHtml::link('About Restro',array('restroaboutus/admin')); ?></li>
                        <li><?php echo CHtml::link('Opening Times',array('restroopeninghrs/admin')); ?></li>
                        <li><?php echo CHtml::link('Testimonials',array('testimonials/adminrestro')); ?></li>
                        <li><?php echo CHtml::link('Menu Category',array('restromenucategory/admin')); ?></li>
                        <li><?php echo CHtml::link('Menu Items',array('restromenuitems/admin')); ?></li>
                    </ul>
                </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--<ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
            $room = Room::model()->findAllByAttributes(array('status'=>1));
            if(!empty($room)){
                ?>
                <form action="<?php echo Yii::app()->request->baseUrl; ?>/admin/check" method="GET" class="clearfix checkAvail">
                    <div class="form-group"><input type="text" class="datepicker" placeholder="Arrival" id="arrival" name="arrival" required> <i class="fa fa-calendar"></i></div>
                    <div class="form-group"><input type="text" class="datepicker" placeholder="Departure" id="departure" name="departure" required><i class="fa fa-calendar"></i></div>
                    <div class="form-group"><input type="submit" class="btn btn-danger" name="check" value="Check Availability"></div>
                </form>

            <?php } ?>

            <!-- Your Page Content Here -->
            <?php echo $content; ?>

        </section><!-- /.content -->
        <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        Copyright &copy; 2015 <a href="http://www.augustlakeresort.com">AugustLakeResort</a>. All Rights Reserved
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<!--<script src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/adminfiles/selectedJs/jQuery-2.1.4.min.js"></script>-->
<!-- Bootstrap 3.3.2 JS -->
<!--<script src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/adminfiles/selectedJs/bootstrap.min.js" type="text/javascript"></script>-->
<!-- AdminLTE App -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/selectedJs/app.min.js" type="text/javascript"></script>
<script src='<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/dist/js/demo.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/modernizr.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/template.js"></script>

</body>
</html>
<script type="text/javascript">
    $( "#arrival" ).datepicker({ dateFormat: "yy-mm-dd", minDate: +1,
        onSelect: function (dateStr) {
            var min = $(this).datepicker('getDate'); // Get selected date
            var bbb = $("#arrival").val();
            var aaa = new Date(new Date(bbb).getTime()+86400000);
            $("#departure").datepicker('option', 'minDate', aaa); // Set other min, default to today
        }
    });
    $( "#departure" ).datepicker({ dateFormat: "yy-mm-dd", minDate: +1,
        onSelect: function (dateStr) {
            var max = $(this).datepicker('getDate'); // Get selected date
            $('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
        }
    });

    function updateTime() {
        var prevnot = $("#not").html();
        setTimeout("updateTime()",30000);
        $.post("<?php echo Yii::app()->request->baseUrl; ?>/admin/getnot",function(data){
            var com_data = jQuery.parseJSON(data);
            var newCust = com_data.countNewCust;
            var notViewed = com_data.countNotViewed;
            var arriving = com_data.arrivingCount;
            var leaving = com_data.leavingCount;
            var contact = com_data.contactCount;
            var pick = com_data.pickCount;
            $('#pick').html(pick);
            $('#task').html(arriving+leaving+pick);
            $('#cont1,#cont2').html(contact);
            $('#arrv').html(arriving);
            $('#leav').html(leaving);
            $("#not").html(newCust+notViewed);
            $("#bel_not").html(notViewed);
            $("#pending").html(newCust);
        });
    }
    updateTime();
</script>

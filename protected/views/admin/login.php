<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AugustLakeResort</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/index2.html"><b>AugustLake</b>Resort</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php
        /* @var $this SiteController */
        /* @var $model LoginForm */
        /* @var $form CActiveForm  */

        $this->pageTitle=Yii::app()->name . ' - Login';
        $this->breadcrumbs=array(
            'Login',
        );
        ?>

        <div class="form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>

            <div class="form-group has-feedback">
                <?php echo $form->textField($model,'username',array('class'=>'form-control', 'placeholder'=>'Username or Email')); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?php echo $form->error($model,'username'); ?>
            </div>

            <div class="form-group has-feedback">
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>'Password')); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo $form->error($model,'password'); ?>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <?php echo $form->checkBox($model,'rememberMe'); ?>
                        <?php echo $form->label($model,'rememberMe'); ?>
                        <?php echo $form->error($model,'rememberMe'); ?>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <?php echo CHtml::submitButton('Login', array('class'=>'btn btn-primary btn-block btn-flat')); ?>
                </div><!-- /.col -->
            </div>
            <?php $this->endWidget(); ?>
        </div><!-- form -->

<!--        <a href="#">I forgot my password</a><br>-->
<!--        <a href="register.html" class="text-center">Register a new membership</a>-->

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
<?php //echo CHtml::link('New User',array('admin/admin')); ?>
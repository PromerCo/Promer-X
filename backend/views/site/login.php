<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\captcha\Captcha;
?>
<style>
    /** Logo in*/
    .login-page, .register-page {
        background: #000000;
    }
    .login-logo a, .register-logo a {
        color: #fff;
    }
    .login-box-body, .register-box-body {
        background: #000;
        padding: 20px;
        border-top: 0;
        color: #fff;
    }
    .btn-primary {
        background-color: #000000;
        border-color: #ffffff;
    }
    .btn-primary {
        background-color: #000000;
        border-color: #ffffff;
    }
    .btn-primary:hover, .btn-primary:active, .btn-primary.hover {
        background-color: #ffffff;
    }
    .btn-primary:hover {
        color: #000;
        background-color: #ffffff;
        border-color: #ffffff;
    }
    .form-control {
        border-radius: 0;
        box-shadow: none;
        border-color: #ffffff;
    }
    .btn-primary.focus, .btn-primary:focus {
        color: #fff;
        background-color: #000000;
        border-color: #ffffff;
    }
</style>
<div class="login-box">
  <div class="login-logo">
    <a href="<?=Url::toRoute('site/login')?>"><b>Promer X</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">

    </p>
	<?php $form = ActiveForm::begin(['id' => 'login-form', 'action'=>Url::toRoute('site/login')]); ?>
    <!-- <form action="../../index2.html" method="post">   -->
      <div class="form-group has-feedback">
        <input name="username" id="username" type="text" class="form-control" placeholder="用户名" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" id="password" type="password" class="form-control" placeholder="密码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="captcha" id="captcha" type="text" class="form-control" placeholder="验证码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo Captcha::widget(['name'=>'captchaimg','captchaAction'=>'site/captcha','imageOptions'=>['id'=>'captchaimg', 'title'=>'换一个', 'alt'=>'换一个', 'style'=>''],'template'=>'{image}']); ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input name="remember" id="remember" value="y" type="checkbox" /> &nbsp;记住我的登录
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button id="login_btn" type="button" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
    <!-- </form>  -->
    <?php ActiveForm::end(); ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
$('#login_btn').click(function (e) {
    e.preventDefault();
	$('#login-form').submit();
});
$('#captchaimg').click(function (e) {
	$.ajax({
		   type: "get",
	        url: "<?=Url::toRoute(['site/captcha', 'refresh'=>1])?>",
	        dataType: 'json',
	        cache: false,
	        success: function (data) {
	            $("#captchaimg").attr('src', data.url);
	        }
	    });
});
$('#login-form').bind('submit', function(e) {
	e.preventDefault();
    $(this).ajaxSubmit({
    	type: "post",
    	dataType:"json",
    	url: "<?=Url::toRoute('site/login')?>",
    	success: function(value) 
    	{
        	if(value.errno == 0){
        		window.location.reload();
        	}
        	else if(value.errno == 1){
        		$('#captcha').attr({'data-placement':'top', 'data-content':'<span class="text-danger">' + value.msg + '</span>', 'data-toggle':'popover'}).addClass('popover-show').popover({html : true }).popover('show');
        	}
        	else{
            	$('#username').attr({'data-placement':'top', 'data-content':'<span class="text-danger">' + value.msg + '</span>', 'data-toggle':'popover'}).addClass('popover-show').popover({html : true }).popover('show');
        	}

    	}
    });
});
</script>
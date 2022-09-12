<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="shortcut icon" href="./assets/img/favicon.png">
<link rel="stylesheet" href="./assets/css/layui.css" />
<link rel="stylesheet" href="./assets/css/style.css" />
<script type="text/javascript" src="./assets/jquery-3.6.1.min.js"></script>

<script>
setTimeout(function() { $('.bodyload').fadeOut(); }, 10);
</script>

</head>

<body>

<div class="layui-row layui-col-space5 login-page">
    <div class="layui-col-md4">
     </div>
    <div class="layui-col-md4">

    <a class="back_button" onclick="history.back()" href="javascript:void(0)">
            <svg style="position: absolute; z-index: 9; margin: 8px 18px;" width="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg" class="Icon-sc-c98r68-0 bmqiTo Icon-sc-c98r68-1 kMfJYW">
                <path fill="#000" fill-rule="evenodd" clip-rule="evenodd" d="M10.28 19.28a.75.75 0 01-1.06 0l-7-7a.751.751 0 01-.072-.083h-.001A.742.742 0 012 11.753v-.004-.004a.748.748 0 01.22-.526l7-7 .084-.073a.75.75 0 01.976.073l.073.084a.75.75 0 01-.073.976L4.561 11H20.75l.102.007a.75.75 0 01-.102 1.493H4.561l5.72 5.72.072.084a.75.75 0 01-.073.976z" fill="#101928"></path>
          </svg>
        </a>

      <div class="layui-card layui-panel">
        <div class="layui-card-header login-head">

           <img class="mb-3" src="./uploads/global/favicon.png" alt="favicon" style="height: 24px">
           <strong>Login Panel</strong>
  
        </div>
        <div class="layui-card-body">
        
            <form id="login" class="layui-form" name="form" method="post">

                <div class="layui-form-item">
                <label class="layui-form-label">Email</label>
                <div class="layui-input-block">
                <input id="email" type="email" name="email" lay-verify="email" autocomplete="off" placeholder="Email" class="email layui-input">
                </div>
                </div>

                <div class="layui-form-item">
                <label class="layui-form-label">Password</label>
                <div class="layui-input-block">
                <input id="password" type="password" name="password" lay-verify="password" autocomplete="off" placeholder="Password" class="password layui-input">
                </div>
                </div>

                <div class="layui-form-item">
                <label class="layui-form-label"></label>
                <div class="layui-input-block">

                <div class="layui-input-block" style="margin-left: 0; display: flex; align-items: center; justify-content: space-between;">
                <input type="checkbox" name="like1[write]" lay-skin="primary" title="Remember Password" checked="">
                <div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary">
                    <span>Remember Password</span>
                    <i class="layui-icon layui-icon-ok"></i>
                </div>
                <a href="./forget-password"><strong>Forget Password</strong></a>
                </div>

                    </div>
                </div>

                <div class="layui-form-item">
                <label class="layui-form-label">Language</label>
                <div class="layui-input-inline">
                    <select name="language">
                    <option value="en" selected>English</option>
                    <option value="ar">Arabic</option>
                    </select>

                </div>
                </div>

                <div class="layui-form-item">
                <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="">Login</button>
                <button type="reset" class="layui-btn layui-btn-primary">Signup</button>
                </div>
                </div>

            </form>

            <div style="height:.25em;margin-bottom:25px">
              <progress class="pure-material-progress-linear"/></progress>
            </div>

      </div>

      </div>
    </div>
    <div class="layui-col-md4">
     </div>
  </div>
 
<script src="./assets/layui.js"></script>
<style>
body{background-color: #6d6e76;overflow: hidden;}
.layui-form-item .layui-form-checkbox[lay-skin="primary"]{margin-top:0!important}
</style>
<script>

$("progress").hide();

// 使用组件
layui.use(['layer', 'form'], function(){
      var layer = layui.layer;
      var form = layui.form;
});

$("#login").submit(function() {
      event.preventDefault();

      // SHOW ANIMATION
      $("progress").show();

      // GET FORM PARAMS AND VALUES
      var emailData = $('.email').val();
      var passwordData = $('.password').val();

      // VALIDATION
      if(emailData.length === 0 || emailData.length === 0 ){
        alert('Email and password both required to login')
        document.getElementById("submit").classList.remove('button--loading');
      } else {

        $.ajax({
          url: "<?=api_url?>login",
          type: 'POST',
          dataType: "json",
          data: {
            email: emailData,
            password : passwordData
          },
        }).done(function(res) {
          console.log(res.data);
          $("progress").hide();
          if(res.status == 'true'){

        // USER SESSION 
        $.ajax({
          url: "<?=root?>login",
          type: 'POST',
          dataType: "json",
          data: {
            user_id: res.data.user_id,
            user_status : res.data.status,
            user_type : res.data.type,
          },
        }).done(function(res) {
          console.log(res.data);
        });

            // alert(response.data.id)
            // sessionStorage.setItem('user_id', user_id);

            // REDIRECT ON SUCCESSFUL SIGNUP
            window.location.href = "./dashboard";

            } else { // LOGIN ERROR
              layer.msg('Email or password invalid please try again');
            } })
        }
    });

</script>
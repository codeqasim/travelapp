<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="shortcut icon" href="./assets/img/favicon.png">
<link rel="stylesheet" href="./assets/css/app.css" />
<script type="text/javascript" src="./assets/js/jquery-3.6.1.min.js"></script>

<script>
setTimeout(function() { $('.bodyload').fadeOut(); }, 10);
</script>

</head>

<body>

<div class="bodyload">
<div class="rotatingDiv"></div>
</div>

<div class="layui-row layui-col-space5 login-page">
    <div class="layui-col-md4">
     </div>
    <div class="layui-col-md4">
      <div class="grid-demo">

      <div class="layui-card layui-panel">
        <div class="layui-card-header login-head">

           <img class="mb-3" src="./uploads/global/favicon.png" alt="favicon" style="height: 24px">
           <strong>Login Panel</strong>
  
        </div>
        <div class="layui-card-body">
        
            <form class="layui-form" name="form" action="./login" method="post" onsubmit="submission()">

            <div class="layui-form-item">
            <label class="layui-form-label">Email</label>
            <div class="layui-input-block">
            <input type="email" name="email" lay-verify="email" autocomplete="off" placeholder="Email" class="layui-input">
            </div>
            </div>

            <div class="layui-form-item">
            <label class="layui-form-label">Password</label>
            <div class="layui-input-block">
            <input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="Email" class="layui-input">
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


        </div>
      </div>


      </div>
    </div>
    <div class="layui-col-md4">
     </div>
  </div>




        <a class="back_button" onclick="history.back()" href="javascript:void(0)">
            <svg width="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg" class="Icon-sc-c98r68-0 bmqiTo Icon-sc-c98r68-1 kMfJYW">
                <path fill="#fff" fill-rule="evenodd" clip-rule="evenodd" d="M10.28 19.28a.75.75 0 01-1.06 0l-7-7a.751.751 0 01-.072-.083h-.001A.742.742 0 012 11.753v-.004-.004a.748.748 0 01.22-.526l7-7 .084-.073a.75.75 0 01.976.073l.073.084a.75.75 0 01-.073.976L4.561 11H20.75l.102.007a.75.75 0 01-.102 1.493H4.561l5.72 5.72.072.084a.75.75 0 01-.073.976z" fill="#101928"></path>
            </svg>
        
        <div class="card-body p-3">

            

            <!-- Login submission form-->
            <form name="form" action="./login" method="post" onsubmit="submission()">

                <mwc-textfield id="email"    required="" name="email"    class="mb-3 email w-100"    label="Email"    icon="email"          outlined="" type="text"></mwc-textfield>
                <mwc-textfield id="password" required="" name="password" class="mb-3 password w-100" label="Password" icon="visibility_off" outlined="" type=""></mwc-textfield>

                <mwc-select required="" outlined="" icon="flag" label="Language" name="user_language" class="mb-3 w-100">
                <mwc-list-item value="en" selected>English</mwc-list-item>
                <mwc-list-item value="ar"> Arabic</mwc-list-item>
                </mwc-select>

                <mwc-linear-progress class="d-none" indeterminate></mwc-linear-progress>
                <script>
                function submission() {
                    document.querySelector('.d-none').classList.remove('d-none');

                    let email = $("#email").val();
                    if (email == "") { alert("Email is required to login"); }

                    let pass = $("#password").val();
                    if (pass == "") { alert("Password is required to login"); }

                }
                </script>

                <div class="d-flex align-items-center justify-content-between">
                    <mwc-formfield label="Remember"><mwc-checkbox name=""></mwc-checkbox></mwc-formfield>

                    <div class="form-group d-flex align-items-center justify-content-betweenmb-0">
                    <a class="small fw-500 text-decoration-none" href="./forget-password">Forgot Password?</a>
                    </div>

                </div>

                <button id="submit" class="mt-3 dark btn btn-primary btn-lg mdc-ripple-upgraded btn-block" type="submit"><span class="button__text">Log in</span></button>

            </form>
    
    <div class="text-center mb-5">
        <a class="" href="./signup">Need an account? Sign up!</a>
    </div>

<script src="./assets/js/layui.js"></script>

<style>body{background-color: #fafafa;}</style>
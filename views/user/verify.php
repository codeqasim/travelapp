<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Verification</title>
<link rel="shortcut icon" href="./assets/img/favicon.png">
<link rel="stylesheet" href="./assets/css/app.css" />
<script type="text/javascript" src="./assets/js/jquery-3.6.0.min.js"></script>

<script>
setTimeout(function() { $('.bodyload').fadeOut(); }, 10);
</script>

</head>

<body class="nav-fixed">

<div class="bodyload">
<div class="rotatingDiv"></div>
</div>

<div class="bg-primary">
   <!-- Layout content-->
   <div id="layoutAuthentication_content">
       <!-- Main page content-->
       <main style="height:100vh">
           <!-- Main content container-->
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                     <div class="row g-0 mt-5 mt-xl-10">
                        <div class="col-md-5">
                           <a class="back_button" onclick="history.back()" href="javascript:void(0)">
                              <svg width="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg" class="Icon-sc-c98r68-0 bmqiTo Icon-sc-c98r68-1 kMfJYW">
                                 <path fill="#fff" fill-rule="evenodd" clip-rule="evenodd" d="M10.28 19.28a.75.75 0 01-1.06 0l-7-7a.751.751 0 01-.072-.083h-.001A.742.742 0 012 11.753v-.004-.004a.748.748 0 01.22-.526l7-7 .084-.073a.75.75 0 01.976.073l.073.084a.75.75 0 01-.073.976L4.561 11H20.75l.102.007a.75.75 0 01-.102 1.493H4.561l5.72 5.72.072.084a.75.75 0 01-.073.976z" fill="#101928"></path>
                              </svg>
                           </a>
                        </div>
                        <div class="col-md-7">
                         </div>
                     </div>
                       <div class="card card-raised shadow-10 mt-3 mb-4">
                           <div class="card-body p-3">
                               <!-- Auth header with logo image-->
                               <div class="text-center">
                                   <img class="mb-3" src="./uploads/global/favicon.png" alt="favicon" style="height: 48px">
                                   <p class="display-6 mb-0">Account Not Verified</p>
                                   <div class="subheading-1 mb-5">Please enter your email and once you receive the activation link activate your account</div>
                               </div>

                               <!-- Login submission form-->
                               <form id="verify" name="form" method="post">
                                 <mwc-textfield id="email"    required="" name="email"    class="mb-3 email w-100"    label="Email"    icon="email"          outlined="" type="text"></mwc-textfield>
                                 <mwc-linear-progress class="d-none" indeterminate></mwc-linear-progress>
                                   <button id="submit" class="mt-3 dark btn btn-primary btn-lg mdc-ripple-upgraded btn-block" type="submit"><span class="button__text">Activate</span></button>
                               </form>
                           </div>
                       </div>

                       <div class="text-center mb-5"><a class="small fw-500 text-decoration-none link-white" href="./login">Back to <strong>Login</strong></a></div>
                   </div>
               </div>
           </div>
       </main>
   </div>

</div>
</div>

<script src="./assets/js/toast.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script type="module" src="./assets/js/material.js"></script>
<script src="./assets/js/scripts.js"></script>
<script src="./assets/js/sb-customizer.js"></script>
<sb-customizer project="material-admin-pro"></sb-customizer>

<script>

$("#verify").submit(function() {
      event.preventDefault();

      document.querySelector('.d-none').classList.remove('d-none');

        let email = $("#email").val();
        if (email == "") { 
            event.preventDefault(); 
            alert("Email is required to activate"); 
            window.location.href = "<?=root?>verify";
        }

        $.ajax({
        url: "<?=root?>activate",
        type: 'POST',
        dataType: "json",
        data: {
        email: email,
        },
        }).done(function(res) {
        console.log(res);
        // window.location.href = "<?=root?>login#verification";
        });

})

</script>

<header class="bg-dark row">
    <div class="px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-white py-3 mb-0 display-6">Settings</h1>
            <div class="ms-4">

            </div>
        </div>
    </div>
</header>

<form action="<?=root?>settings" method="post" onsubmit="submission()" enctype="multipart/form-data">

<div class="py-4 px-2">

<div class="row gx-3">
  <div class="col-lg-8">
     <div class="card card-raised mb-3" style="min-height:760px;">
      <div class="card-body p-5">
        <div class="card-title">Main settings</div>
        <div class="card-subtitle mb-4">Application name and tags</div>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Business Name</label>
          <div class="col-md-9">
            <mwc-textfield name="business_name" label="Business Name" outlined="" value="<?=$app->business_name?>"></mwc-textfield>
          </div>
        </div>
        <!-- <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Domain Name</label>
          <div class="col-md-9">
            <mwc-textfield name="site_url" label="Site URL" outlined="" value=""></mwc-textfield>
          </div>
        </div>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">License Key</label>
          <div class="col-md-9">
            <mwc-textfield name="license_key" label="License Key" outlined="" value=""></mwc-textfield>
          </div>
        </div> -->
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">API AppKey</label>
          <div class="col-md-9">
            <mwc-textfield name="api_key" label="API AppKey" outlined="" value=""></mwc-textfield>
            <div style="width: 100%; text-align: left; background: #eee; padding: 6px;">API URL : <a target="_blank" href=""><strong>https://api.phptravels.com</strong></a>
        </div>
          </div>
        </div>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Website Offline</label>
          <div class="col-md-9">
            <mwc-select outlined="" label="Status" name="site_offline" class="site_offline">
              <mwc-list-item value="1"> Yes</mwc-list-item>
              <mwc-list-item value="0"> No</mwc-list-item>
            </mwc-select>
          </div>
        </div>
        <script>
            // ENABLE DISABLE OFFLINE MESSAGE BOX
            $('.site_offline').val(<?=$app->site_offline?>)
            if (<?=$app->site_offline?> == 1) {
                $('.offline_message').attr('disabled', false)
            } else {
                $('.offline_message').attr('disabled', true)
            }
        </script>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Offline Message</label>
          <div class="col-md-9">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Message" name="offline_message" id="offmsg" style="height: 100px" readonly=""><?=$app->offline_message?></textarea>
              <label for="">Site Offline Message</label>
            </div>
          </div>
        </div>
         <div class="text-end">
          <button class="btn-block btn btn-primary mdc-ripple-upgraded" type="submit"> <i class="leading-icon material-icons">save</i> Update Settings</button>
        </div>
      </div>
    </div>
    <div class="card card-raised mb-3">
      <div class="card-body p-5">
        <div class="card-title">SEO</div>
        <div class="card-subtitle mb-4">SEO and meta tags</div>
        <div class="row form-group mb-2">
          <label class="col-md-3 control-label text-left">Meta Title</label>
          <div class="col-md-9">
            <label class="pure-material-textfield-outlined">
            <input name="home_title" type="text" placeholder="Home Title" class="form-control" value="<?=$app->home_title?>">
            <span>Home Title</span>
            </label>
          </div>
        </div>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Meta Description</label>
          <div class="col-md-9">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Description of Homepage" name="meta_description" style="height: 100px"><?=$app->meta_description?></textarea>
              <label for="">Message</label>
            </div>
          </div>
        </div>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">XML SiteMap</label>
          <div class="col-md-9">
            <div class="row">
              <label class="col-md-6"><a class="btn-block btn btn-warning w-100 mdc-ripple-upgraded" target="_blank" href="../sitemap.xml">Sitemap</a></label>
              <label class="col-md-6"><button class="btn-block btn btn-primary mdc-ripple-upgraded" type="submit"> <i class="leading-icon material-icons">save</i> Update Settings</button></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-raised mb-3">
      <div class="card-body p-5">
        <div class="card-title">Accounts</div>
        <div class="card-subtitle mb-4">Users and accounts settings</div>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Guest Booking</label>
          <div class="col-md-9">
            <mwc-select outlined="" label="Guest Booking" name="guest_booking">
              <mwc-list-item value="1"> Yes</mwc-list-item>
              <mwc-list-item value="0"> No</mwc-list-item>
            </mwc-select>
            <small>if selected yes only registered users can book</small>
          </div>
        </div>
        <script>
            $("[name='guest_booking']").val(<?=$app->guest_booking?>)
        </script>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Users Registration</label>
          <div class="col-md-9">
            <mwc-select outlined="" label="Status" name="user_registration">
              <mwc-list-item value="1"> Yes</mwc-list-item>
              <mwc-list-item value="0"> No</mwc-list-item>
            </mwc-select>
          </div>
        </div>
        <script>
            $("[name='user_registration']").val(<?=$app->user_registration?>)
        </script>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Suppliers Registration</label>
          <div class="col-md-9">
            <mwc-select outlined="" label="Status" name="supplier_registration">
              <mwc-list-item value="1"> Yes</mwc-list-item>
              <mwc-list-item value="0"> No</mwc-list-item>
            </mwc-select>
          </div>
        </div>
        <script>
            $("[name='supplier_registration']").val(<?=$app->supplier_registration?>)
        </script>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Agents Registration</label>
          <div class="col-md-9">
            <mwc-select outlined="" label="Status" name="agent_registration">
              <mwc-list-item value="1"> Yes</mwc-list-item>
              <mwc-list-item value="0"> No</mwc-list-item>
            </mwc-select>
          </div>
        </div>
        <script>
            $("[name='agent_registration']").val(<?=$app->agent_registration?>)
        </script>
        <div class="text-end">
          <button class="btn-block btn btn-primary mdc-ripple-upgraded" type="submit"> <i class="leading-icon material-icons">save</i> Update Settings</button>
        </div>
      </div>
    </div>
    <div class="card card-raised mb-3">
      <div class="card-body p-5">
        <div class="card-title">System Settings</div>
        <div class="card-subtitle mb-4">System settings and configurations</div>
        <div class="row form-group mb-3">
          <label class="col-md-3 control-label text-left">Tracking &amp; Analytics</label>
          <div class="col-md-9">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Paste your tracking &amp; analytics code here." name="javascript" style="height: 100px"><?=$app->javascript?></textarea>
              <label for="">Tracking Code</label>
            </div>
          </div>
        </div>
        <div class="text-end">
          <button class="btn-block btn btn-primary mdc-ripple-upgraded" type="submit"> <i class="leading-icon material-icons">save</i> Update Settings</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card card-raised mb-3" style="min-height:760px;">
      <div class="card-body p-5">
        <div class="card-title">Branding</div>
        <div class="card-subtitle mb-1">Business logo and favicon.</div>
        <!-- Account privacy optinos-->
        <div class="card p-3 mb-3">
          <label><strong>Business Logo</strong></label>
          <div class="caption fst-italic text-muted mb-4">Only PNG file supported max size 1 MB</div>
          <img src="<?=$app->logo?>?v<?=rand(0,99999999999)?>" class="hlogo_preview_img img-fluid">
          <hr>
          <input type="file" class="btn btn-light mdc-ripple-upgraded" id="hlogo" name="logo">
        </div>
        <div class="card p-3 mb-3">
          <label><strong>Favicon</strong></label>
          <div class="caption fst-italic text-muted mb-4">Only PNG file supported max size 1 MB</div>
          <img src="<?=$app->favicon?>?v<?=rand(0,99999999999)?>" class="favimage_preview_img img-fluid" style="max-width:60px">
          <hr>
          <input type="file" class="btn btn-light mdc-ripple-upgraded" id="favimage" name="favicon">
        </div>
        <div class="text-end">
          <button class="btn-block btn btn-primary mdc-ripple-upgraded" type="submit"> <i class="leading-icon material-icons">save</i> Update Settings</button>
        </div>
        <!--
          <div class="mb-4">
          <mwc-formfield label="On"><mwc-radio name="twoFactorAuth" checked=""></mwc-radio></mwc-formfield>
          <mwc-formfield label="Off"><mwc-radio name="twoFactorAuth"></mwc-radio></mwc-formfield>
          </div>
          <mwc-textfield class="w-100" label="SMS Number" outlined="" type="tel" value="407-555-0187"></mwc-textfield>
          -->
      </div>
    </div>

    <!-- <div class="card card-raised mb-3">
      <div class="card-body p-4">
        <div class="card p-3 mb-3">
          <label><strong>Homepage Cover</strong></label>
          <div class="caption fst-italic text-muted mb-4">Only JPG file supported max size 1 MB</div>
          <img src="../uploads/global/cover.jpg?v<?=rand(0,99999999999)?>" class="coverimage_preview_img img-fluid" style="max-width:100%">
          <hr>
          <input type="file" class="btn btn-light mdc-ripple-upgraded" id="coverimage" name="coverimage">
        </div>
        <div class="text-end">
          <button class="btn-block btn btn-primary mdc-ripple-upgraded" type="submit"> <i class="leading-icon material-icons">save</i> Update Settings</button>
        </div>
      </div>
    </div> -->

    <div class="card card-raised mb-3">
      <div class="card-body p-5">
        <div class="card-title">Language &amp; Currencies</div>
        <div class="card-subtitle mb-4">Configure default settings</div>
        <div class="row form-group mb-3">
          <label class="col-md-5 control-label text-left">Multi Language</label>
          <div class="col-md-7">
            <mwc-select outlined="" label="Multi Language" name="multi_language" class="">
              <mwc-list-item value="1"> Yes</mwc-list-item>
              <mwc-list-item value="0"> No</mwc-list-item>
            </mwc-select>
          </div>
        </div>
        <script>
            $("[name='multi_language']").val(<?=$app->multi_language?>)
        </script>
        <div class="row form-group mb-3">
          <label class="col-md-5 control-label text-left">Default Language</label>
          <div class="col-md-7">
            <mwc-select outlined="" label="Default Language" name="default_language">
                <mwc-list-item value="ar"> Arabic</mwc-list-item>
                <mwc-list-item value="de"> German</mwc-list-item>
                <mwc-list-item value="en"> English</mwc-list-item>
                <mwc-list-item value="es"> Spanish</mwc-list-item>
                <mwc-list-item value="fa"> Farsi</mwc-list-item>
                <mwc-list-item value="fr"> French</mwc-list-item>
                <mwc-list-item value="ru"> Russian</mwc-list-item>
                <mwc-list-item value="tr"> Turkish</mwc-list-item>
                <mwc-list-item value="vi"> Vietnamese</mwc-list-item>
            </mwc-select>
          </div>
        </div>
        <script>
            $("[name='default_language']").val("<?=$app->default_language?>")
        </script>
        <div class="row form-group mb-3">
          <label class="col-md-5 control-label text-left">Multi Currency</label>
          <div class="col-md-7">
            <mwc-select outlined="" label="Muti Currency" name="multi_currency" class="">
              <mwc-list-item value="1"> Yes</mwc-list-item>
              <mwc-list-item value="0"> No</mwc-list-item>
            </mwc-select>
          </div>
        </div>
        <script>
            $("[name='multi_currency']").val(<?=$app->multi_currency?>)
        </script>
        <div class="text-end">
          <button class="btn-block btn btn-primary mdc-ripple-upgraded" type="submit"> <i class="leading-icon material-icons">save</i> Update Settings</button>
        </div>
      </div>
    </div>

    <div class="card card-raised mb-5">
      <div class="card-body p-4">
        <div class="card-title">Social Links</div>
        <div class="card-subtitle mb-4">Social media pages links</div>

        <mwc-textfield class="mb-3" name="social_facebook" label="Facebook" outlined icon="link" value="<?=$app->social_facebook ?>"></mwc-textfield>
        <mwc-textfield class="mb-3" name="social_twitter" label="Twitter" outlined icon="link" value="<?=$app->social_twitter?>"></mwc-textfield>
        <mwc-textfield class="mb-3" name="social_linkedin" label="LinkedIn" outlined icon="link" value="<?=$app->social_linkedin?> "></mwc-textfield>
        <mwc-textfield class="mb-3" name="social_instagram" label="Instagram" outlined icon="link" value="<?=$app->social_instagram?>"></mwc-textfield>
        <mwc-textfield class="mb-3" name="social_google" label="Google GMB" outlined icon="link" value="<?=$app->social_google?>"></mwc-textfield>
        <mwc-textfield class="mb-3" name="social_whatsapp" label="Whatsapp" outlined icon="link" value="<?=$app->social_whatsapp?>"></mwc-textfield>

        <div class="text-end mt-2">
          <button class="btn-block btn btn-primary mdc-ripple-upgraded" type="submit"> <i class="leading-icon material-icons">save</i> Update Settings</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

</form>

<script>
  $(function(){
     offstatus();
  // mailserver options
  var mailserver = $("#mailserver").val();
  if(mailserver == "php"){
  $(".smtp").hide();
   }else{
  $(".smtp").show();
  }
  // mailserver options
  $("#mailserver").on('change', function() {
  var mserver = $(this).val();
  if(mserver == "php"){
  $(".smtp").hide();
  }else{
  $(".smtp").show();
  }
  });

  // OFFLINE OPTION SELECTION
  $(".site_offline").on('change', function() {
    offstatus();
  });

  $("#hlogo").change(function(){

  var preview = $('.hlogo_preview_img');
  preview.fadeOut();

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("hlogo").files[0]);

  oFReader.onload = function (oFREvent) {
  preview.attr('src', oFREvent.target.result).fadeIn();
  };

  });

  $("#favimage").change(function(){
  var abc = $(this).attr('name');

  var preview = $('.favimage_preview_img');
  preview.fadeOut();

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("favimage").files[0]);

  oFReader.onload = function (oFREvent) {
  preview.attr('src', oFREvent.target.result).fadeIn();
  };

  });

  // COVERIMAGE
  $("#coverimage").change(function(){
  var abc = $(this).attr('name');

  var preview = $('.coverimage_preview_img');
  preview.fadeOut();

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("coverimage").files[0]);

  oFReader.onload = function (oFREvent) {
  preview.attr('src', oFREvent.target.result).fadeIn();
  };

  });


  $("#wmlogo").change(function(){

  var preview = $('.wmlogo_preview_img');
  preview.fadeOut();

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("wmlogo").files[0]);

  oFReader.onload = function (oFREvent) {
  preview.attr('src', oFREvent.target.result).fadeIn();
  };

  });

  $(".testEmail").on('click',function(){
    var id = $(".testemailtxt").val();
    $.post("https://phptravels.net/api/admin/ajaxcalls/testingEmail", {email: id}, function(resp){
    alert(resp);
    console.log(resp);
    });
  })

  });

  // function themeinfo(){
  // var id = $(".theme").val();

  // $.post("https://phptravels.net/api/admin/ajaxcalls/ThemeInfo", {theme: id}, function(resp){
  // var obj = jQuery.parseJSON(resp);

  // $("#themename").html(obj.Name);
  // $("#themedesc").html(obj.Description);
  // $("#themeauthor").html(obj.Author);
  // $("#themeversion").html(obj.Version);
  // $("#screenshot").prop("src",obj.screenshot);

  // });
  // }

  function submission(){
    $('.bodyload').fadeIn(150);
  }

  function offstatus(){
  var status = $(".site_offline").val();
  if(status == "1"){
    $("#offmsg").prop("readonly",false);
  }else{
    $("#offmsg").prop("readonly",true);
  }
  }
</script>
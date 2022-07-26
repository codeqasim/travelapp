<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require_once 'core.php';

// REDIRECT IF USER IS NOT LOGGED IN
if(!isset($_SESSION['admin_user_login']) == true ){ header("Location: login"); exit; }

// INCLUDE HEADER FILE
$title = 'Module Settings';
include 'header.php';

// FOR THE GET REQUEST DATA
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
// GET ALL DATA
$data = $db->select('modules', '*',[
    'id' => $_GET['m']
] );

$module = (object)($data[0]);

// CONDITION TO CHECK FOR STATUS
if ($module->status == 1) {
  $check = "checked=''";
} else {
  $check = "";
}

}

// print_r($_POST);
// die;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db->update('modules', [
        'b2c_markup' => $_POST['b2c_markup'],
        'b2b_markup' => $_POST['b2b_markup'],
        'b2e_markup' => $_POST['b2e_markup'],
        'c1' => $_POST['c1'],
        'c2' => $_POST['c2'],
        'c3' => $_POST['c3'],
        'c4' => $_POST['c4'],
        'c4' => $_POST['c4'],
        'dev_mode' => $_POST['dev_mode'],
        'payment_mode' => $_POST['payment_mode'],
        'currency' => $_POST['currency'],
        'module_color' => $_POST['module_color'],

    ], [
        'id' => $_POST['id']
    ]);

    echo "<meta http-equiv=\"refresh\" content=\"0;URL=modules.php#updatesetttings\">";
    die;
}

?>

<header class="bg-dark row">
    <div class="container-xl px-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-white py-3 mb-0 display-6" style="text-transform:capitalize"><?=$module->name?> Settings</h1>
            <div class="ms-4">

            </div>
        </div>
    </div>
</header>

<div class="container-xl py-4">
  <form action="settings-module" method="POST">
    <div class="card p-5">
    <div class="panel-heading">

    <div class="pull-right mb-5 d-flex gap-2 align-items-center">
    <label class="form-check-label" for="module">Status</label>
    <div class="form-check form-switch">
      <label class="form-check-label" for="module"></label>
      <input <?=$check?> style="width: 40px; height: 20px;cursor:pointer" class="form-check-input" data-status="<?=$module->status?>" data-value="<?=$_GET['m'] ?>" data-item="<?=$module->name?>" id="checkedbox" type="checkbox">
    </div>
    </div>

      <div class="pull-left mb-5">
        <a href="javascript:window.history.back();" data-toggle="tooltip" data-placement="top" title="Previous Page" class="btn btn-warning mdc-ripple-upgraded d-flex align-items-center gap-2"><i class="fa fa-share-square-o mt-1"></i>  Back</a>  </div>
      <div class="clearfix"></div>
    </div>
      <div class="panel-body">
      <div class="tab-content form-horizontal">

        <div class="row form-group mb-5">

        <div class="col-md-4">
        <mwc-textfield class="w-100" type="number" name="b2c_markup" label="B2C Markup %" outlined="" value="<?=$module->b2c_markup?>"></mwc-textfield>
        <small class="text-muted"> write numebr 1 - 100</small>
        </div>

        <div class="col-md-4">
        <mwc-textfield class="w-100" type="number" name="b2b_markup" label="B2B Markup %" outlined="" value="<?=$module->b2b_markup?>"></mwc-textfield>
        <small class="text-muted"> write numebr 1 - 100</small>
        </div>

        <div class="col-md-4">
        <mwc-textfield class="w-100" type="number" name="b2e_markup" label="B2E Markup %" outlined="" value="<?=$module->b2e_markup?>"></mwc-textfield>
        <small class="text-muted"> write numebr 1 - 100</small>
        </div>

    </div>

        <p><strong>API CREDENTIALS</strong></p>

        <div class="row form-group mb-4 mt-4">

        <div class="col-md-3">
        <mwc-textfield class="w-100 demo" type="text" name="c1" label="Credential 1" outlined="" value="<?=$module->c1?>"></mwc-textfield>
        </div>

        <div class="col-md-3">
        <mwc-textfield class="w-100 demo" type="text" name="c2" label="Credential 2" outlined="" value="<?=$module->c2?>"></mwc-textfield>
        </div>

        <div class="col-md-3">
        <mwc-textfield class="w-100 demo" type="text" name="c3" label="Credential 3" outlined="" value="<?=$module->c2?>"></mwc-textfield>
        </div>

        <div class="col-md-3">
        <mwc-textfield class="w-100" type="text" name="c4" label="Credential 4" outlined="" value="<?=$module->c4?>"></mwc-textfield>
        </div>

        </div>

        <div class="row form-group mb-3">

        <div class="col-md-3">

        <mwc-select outlined="" label="Dev Mode" name="dev_mode" class="w-100">
          <mwc-list-item value="1"> Production</mwc-list-item>
          <mwc-list-item value="0"> Development</mwc-list-item>
        </mwc-select>

        <script>
            $("[name='dev_mode']").val("<?=$module->dev_mode?>")
        </script>

        </div>

        <div class="col-md-4">

            <mwc-select outlined="" label="Payment Mode" name="payment_mode" class="w-100">
                <mwc-list-item value="1">Merchant API - Booking on Site</mwc-list-item>
                <mwc-list-item value="0"> Affiliate API - Booking on other site</mwc-list-item>
            </mwc-select>

        <script>
        $("[name='payment_mode']").val("<?=$module->payment_mode?>")
        </script>

        </div>

        <div class="col-md-2">

        <mwc-select outlined="" label="Currency" name="currency" class="w-100">
            <mwc-list-item value="USD">USD</mwc-list-item>
            <mwc-list-item value="PKR">PKR</mwc-list-item>
        </mwc-select>

        <script>
        $("[name='currency']").val("<?=$module->currency?>")
        </script>

        </div>

        <div class="col-md-3 d-flex">
            <label for="" class="d-flex gap-3 align-items-center w-100">Color
          <input style="height: 40px; padding: 6px;" type="color" id="module_color" name="module_color" class="form-control" value="<?=$module->module_color?>">
          </label>
        </div>
        </div>
      </div>
    </div>

    <div class="mt-3">
    <input type="hidden" name="id" value="<?=$_GET['m']?>">
    <button type="submit" class="btn btn-primary mdc-ripple-upgraded"><i class="fa fa-save mx-2"></i> Submit</button>
    </div>
  </form>

<style>
.form-horizontal .control-label {   max-height: 60px;}
</style>

<script>
document.getElementById("module_color").value = "<?=$module->module_color?>";

// $('body').bind('copy',function(e) {
// e.preventDefault(); return false;
// });
</script>

<script>

$('[id=checkedbox]').on('click', function() {

    var status = $(this).data("status");
    var id = $(this).data("value");
    var item = $(this).data("item");

    var isChecked = this.checked;

    // CONDITION TO CHECK THE STATUS
    if (isChecked == true) { var checks = 1 } else { var checks = 0 }

    var form = new FormData();
    form.append("id", id);
    form.append("status", checks);

    var settings = {
    "url": "./modules.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form
    };

    $.ajax(settings).done(function (response) {
    console.log(response);

        // ALERT POPUP MESSAGE
        vt.success("Module status updated successfully",{
            title:"Module Updated",
            position: "top-center",
            callback: function (){
        } })

    });

  });

</script>

</div>

<?php include 'footer.php'; ?>
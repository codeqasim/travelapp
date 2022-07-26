<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require_once 'core.php';

// REDIRECT IF USER IS NOT LOGGED IN
if(!isset($_SESSION['admin_user_login']) == true ){ header("Location: login.php"); exit; }

// INCLUDE HEADER FILE
$title = 'Modules';
include 'header.php';

// GET ALL SETTINGS DATA
$modules = $db->select('modules', '*', );

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db->update('modules', [
        'status' => $_POST['status'],
    ], [
        'id' => $_POST['id']
    ]);

    echo json_encode('status updated successfully');
    exit;

}
?>

<header class="bg-dark row">
    <div class="container-xl px-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-white py-3 mb-0 display-6">Modules</h1>
            <div class="ms-4">

            </div>
        </div>
    </div>
</header>

<div class="row mt-1 g-3">

<?php foreach($modules as $m) { ?>
<div class="col-md-4 col-lg-6 col-xxl-3 mb-4 mb-lg-3 mb-3 modules_<?=$m['name'] ?>">
    <div class="card card-quick-link card-raised ripple-gray mdc-ripple-upgraded">
        <div class="card-body pb-1">
            <img class="card-quick-link-img" src="./assets/img/modules/<?=$m['name'] ?>.png" style="border-radius: 6px;">
            <div class="card-title text-truncate mb-1" style="text-transform:capitalize"> <?=$m['name'] ?> </div>
            <p class="card-text" style="line-height: 15px;"><small>To configure or setup credentials click on settings</small></p>
        </div>
        <div class="card-actions">

        <span data-bs-toggle="tooltip" data-bs-placement="top" title="" style="background:<?=$m['module_color'] ?>;width: 15px; height: 15px; position: absolute; z-index: 1; top: 14px; right: 18px; border-radius: 12px;" data-bs-original-title="Module Color" aria-label="Module Color"></span>

        <a href="./settings-module.php?m=<?=$m['id'] ?>">
        <button class="btn btn-danger btn-sm pull-left mdc-ripple-upgraded" style="text-transform:capitalize;font-weight:100;letter-spacing:0px">
        <svg class="m-1" opacity="0.8" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
        Settings</button>
        </a>

        <label style="margin-right: -80px;" class="form-check-label" for="module_<?=$m['id'] ?>">Status</label>

        <label class="ellipsis pull-right">

      <?php

        // CONDITION TO CHECK FOR STATUS
        if ($m['status'] == 1) {
            $check = "checked=''";
        } else {
            $check = "";
        }

      ?>

      <div class="form-check form-switch">
      <label class="form-check-label" for="module_<?=$m['id'] ?>"></label>
      <input <?=$check?> style="width: 40px; height: 20px;cursor:pointer" class="form-check-input" data-status="<?=$m['status']?>" data-value="<?=$m['id'] ?>" data-item="<?=$m['name'] ?>" id="checkedbox" type="checkbox">
      </div>

        </label>

        </div>

    </div>
</div>
<?php } ?>

</div>

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
            callback: function (){ //
        } })

    });


  });

</script>

<?php include 'footer.php'; ?>
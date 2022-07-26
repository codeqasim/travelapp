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

<div class="row mt-3">

<?php foreach($modules as $m) { ?>
<div class="col-md-4 col-lg-6 col-xxl-3 mb-4 mb-lg-3 mb-3 modules_<?=$m['name'] ?>">
    <div class="card card-quick-link card-raised ripple-gray mdc-ripple-upgraded" style="--mdc-ripple-fg-size:164px; --mdc-ripple-fg-scale:1.949; --mdc-ripple-fg-translate-start:-49.8px, -72.2px; --mdc-ripple-fg-translate-end:54.925px, -9.75px;">
        <div class="card-body">
            <img class="card-quick-link-img" src="./assets/img/modules/<?=$m['name'] ?>.png" style="border-radius: 6px;">
            <div class="card-title text-truncate mb-2"> <?=$m['name'] ?> </div>
            <p class="card-text">To configure or setup credentials click on settings</p>
        </div>
        <div class="card-actions">

        <span data-bs-toggle="tooltip" data-bs-placement="top" title="" style="background:#000;width: 15px; height: 15px; position: absolute; z-index: 1; top: 14px; right: 18px; border-radius: 12px;" data-bs-original-title="Module Color" aria-label="Module Color"></span>

        <a href="./settings_module.php?m=<?=$m['id'] ?>">
        <button class="btn btn-danger btn-sm pull-left mdc-ripple-upgraded" style="height:22px;line-height: 12px;margin-right: 5px;"><i class="fa fa-cog mx-1"></i> Settings</button>
        </a>

        <label class="form-check-label" for="module_<?=$m['id'] ?>">Status</label>

        <label class=" ellipsis pull-right">

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
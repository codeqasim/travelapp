<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require_once '_core.php';

// REQUIRED IF USER IS NOT LOGGED IN
if($_SESSION['user_type'] !== "admin" ){

    if($_SESSION['user_id'] == $_GET['id'] ){} else {
    echo "<script>alert('Access Not Allowed')</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard\">";
    exit; }

}

// GET USER DATA
$data = $db->select('phptravels_users', '*',[ 'id' => $_GET['id'] ]);
$user = $data[0];

// REDIECT IF NO USER FOUND WITH ID
if (empty($user)) {
    echo "<script>alert('User Not Found')</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard\">";
    exit;
}

// INCLUDE HEADER FILE
$title = 'Profile';
include 'header.php'; ?>

<header class="bg-dark row">
    <div class="px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-white py-3 mb-0 display-6">Profile</h1>
            <div class="ms-4">
            </div>
        </div>
    </div>
</header>

<div class="card card-raised mb-5 mt-3">
    <div class="card-body p-5">
        <div class="card-title">Account Details</div>
        <div class="card-subtitle mb-4">Review and update your account information below.</div>
        <form>
             <!-- Form Row-->
            <div class="row mb-4">
                <div class="col-md-6"><mwc-textfield class="w-100" name="first_name" label="First Name" outlined="" value="<?=$user['first_name']?>"></mwc-textfield></div>
                <div class="col-md-6"><mwc-textfield class="w-100" name="last_name" label="Last Name" outlined="" value="<?=$user['last_name']?>"></mwc-textfield></div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6"><mwc-textfield class="w-100" name="email" label="Email" outlined="" value="<?=$user['email']?>"></mwc-textfield></div>
                <div class="col-md-6"><mwc-textfield class="w-100" name="password" label="Password" outlined="" value=""></mwc-textfield></div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6"><mwc-textfield class="w-100" name="address1" label="Address 1" outlined="" value="<?=$user['address1']?>"></mwc-textfield></div>
                <div class="col-md-6"><mwc-textfield class="w-100" name="address2" label="Address 2" outlined="" value="<?=$user['address2']?>"></mwc-textfield></div>
            </div>



            <!-- Form Group (email address)-->
            <div class="mb-4"><mwc-textfield class="w-100" label="Location" outlined="" type="email" value="name@example.com"></mwc-textfield></div>
            <!-- Form Row-->
            <div class="row mb-4">
                <!-- Form Group (phone number)-->
                <div class="col-md-6"><mwc-textfield class="w-100" label="SMS Number" outlined="" type="tel" value="407-555-0187"></mwc-textfield></div>
                <!-- Form Group (birth month)-->
                <div class="col-md-6">
                    <mwc-select class="w-100" outlined="" label="Birth Month">
                        <mwc-list-item value="January" selected="" mwc-list-item="" tabindex="0" aria-disabled="false" role="option" aria-selected="true">January</mwc-list-item>
                        <mwc-list-item value="February" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">February</mwc-list-item>
                        <mwc-list-item value="March" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">March</mwc-list-item>
                        <mwc-list-item value="April" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">April</mwc-list-item>
                        <mwc-list-item value="May" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">May</mwc-list-item>
                        <mwc-list-item value="June" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">June</mwc-list-item>
                        <mwc-list-item value="July" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">July</mwc-list-item>
                        <mwc-list-item value="August" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">August</mwc-list-item>
                        <mwc-list-item value="September" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">September</mwc-list-item>
                        <mwc-list-item value="October" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">October</mwc-list-item>
                        <mwc-list-item value="November" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">November</mwc-list-item>
                        <mwc-list-item value="December" mwc-list-item="" tabindex="-1" aria-disabled="false" role="option">December</mwc-list-item>
                    </mwc-select>
                </div>
            </div>
             <div class=""><button class="btn btn-primary mdc-ripple-upgraded" type="button">Save changes</button></div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
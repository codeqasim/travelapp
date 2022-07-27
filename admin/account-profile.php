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

// COUNTRIES & CURRENCIES DATA
$countries = $db->select('phptravels_countries', '*', [ 'status' => 1 ]);
$currencies = $db->select('phptravels_currencies', '*', [ 'status' => 1 ]);

// GET USER DATA
$data = $db->select('phptravels_users', '*',[ 'id' => $_GET['id'] ]);
$user = $data[0];

// REDIECT IF NO USER FOUND WITH ID
if (empty($user)) {
    echo "<script>alert('User Not Found')</script>";
    redirect('dashboard');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db->update('phptravels_users', [
        'first_name' => $_POST['first_name'],

    ], [
        'id' => $_POST['id']
    ]);

}

// INCLUDE HEADER FILE
$title = 'Profile';
include 'header.php'; ?>

<header class="bg-dark row">
    <div class="px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-white py-3 mb-0 display-6"><?=T::profile?></h1>
            <div class="ms-4">
            </div>
        </div>
    </div>
</header>

<div class="card card-raised mb-5 mt-3">
    <div class="card-body p-5">
        <div class="card-title"><?=T::account_details?></div>
        <div class="card-subtitle mb-4"><?=T::account_details2?></div>

        <form action="account-profile.php" method="post" onsubmit="submission()" enctype="multipart/form-data">

        <div class="row">
        <div class="col-md-8">

             <div class="row mb-4">
                <div class="col-md-6"><mwc-textfield icon="person" class="w-100" name="first_name" label="<?=T::first_name?>" outlined="" value="<?=$user['first_name']?>"></mwc-textfield></div>
                <div class="col-md-6"><mwc-textfield icon="person" class="w-100" name="last_name" label="<?=T::last_name?>" outlined="" value="<?=$user['last_name']?>"></mwc-textfield></div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12"><mwc-textfield icon="email" class="w-100" name="email" label="<?=T::email?>" outlined="" value="<?=$user['email']?>"></mwc-textfield></div>
             </div>

            <div class="row mb-4">
                 <div class="col-md-12"><mwc-textfield icon="password" class="w-100" name="password" label="<?=T::password?>" outlined="" value=""></mwc-textfield></div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12"><mwc-textfield icon="phone" class="w-100" name="email" label="<?=T::mobile?>" outlined="" value="<?=$user['mobile']?>"></mwc-textfield></div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12"><mwc-textfield icon="map" class="w-100" name="address1" label="<?=T::address1?>" outlined="" value="<?=$user['address1']?>"></mwc-textfield></div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12"><mwc-textfield icon="map" class="w-100" name="address2" label="<?=T::address2?>" outlined="" value="<?=$user['address2']?>"></mwc-textfield></div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12">

                <mwc-select icon="flag" name="country_code" class="w-100" outlined="" label="<?=T::country?>">

                    <?php if(empty($user['country_code'])) {?>
                    <mwc-list-item value="country" selected=""><?=T::select_country?></mwc-list-item>
                    <?php } ?>

                    <?php foreach($countries as $country) { ?>
                        <mwc-list-item value="<?=$country['iso']?>" ><?=$country['name']?></mwc-list-item>
                    <?php } ?>

                </mwc-select>
                <script>
                    $("[name='country_code']").val("<?=$user['country_code']?>")
                </script>

            </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <p><strong><?=T::financial_details?></strong></p>
                <hr class="mb-4 mt-1">

                <div class="row mb-4">
                 <div class="col-md-12"><mwc-textfield type="number" icon="account_balance_wallet" class="w-100" name="balance" label="<?=T::wallet_balance?>" outlined="" value="<?=$user['balance']?>"></mwc-textfield></div>
                </div>

                <div class="row mb-0">

                <mwc-select icon="payments" name="currency" class="w-100" outlined="" label="<?=T::currency?>">

                    <?php if(empty($user['currency'])) {?>
                    <mwc-list-item value="currency" selected=""><?=T::select_currency?></mwc-list-item>
                    <?php } ?>

                    <?php foreach($currencies as $currency) { ?>
                        <mwc-list-item value="<?=$currency['id']?>" ><?=$currency['name']?></mwc-list-item>
                    <?php } ?>

                </mwc-select>
                <script>
                    $("[name='currency']").val("<?=$user['currency']?>")
                </script>
            </div>
            </div>

            <div class="card p-3 mt-3">
                <p><strong>Agency Details</strong></p>
                <hr class="mb-4 mt-1">

                <div class="row mb-4">
                 <div class="col-md-12"><mwc-textfield type="text" icon="store" class="w-100" name="company_name" label="<?=T::agency_name?>" outlined="" value="<?=$user['company_name']?>"></mwc-textfield></div>
                </div>

                <div class="row mb-4">
                 <div class="col-md-12"><mwc-textfield type="number" icon="phone" class="w-100" name="company_phone" label="<?=T::phone?>" outlined="" value="<?=$user['company_phone']?>"></mwc-textfield></div>
                </div>

                <div class="row mb-0">
                 <div class="col-md-12"><mwc-textfield type="email" icon="email" class="w-100" name="company_email" label="<?=T::email?>" outlined="" value="<?=$user['company_email']?>"></mwc-textfield></div>
                </div>

         </div>

        </div>

            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <div>
            <button class="btn btn-primary mdc-ripple-upgraded" type="submit"><?=T::savechanges?></button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
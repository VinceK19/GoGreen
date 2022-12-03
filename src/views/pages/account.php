<?php 
require_once(PATH_COMPONENTS."title-box.php");

$user = $data["user"];
$edit = $data["mode"] == "edit"
?>
<div class="container pt-5 pb-5">
<form method="post" action="<?= BASE_URL."account/updateProfile" ?>">
    <div class="row justify-content-between">
        <div class="p-3">
            <h2><b><?= strtoupper($user["username"]) ?>'S <small>PROFILE</small></b></h2>
        </div>
        <div class="p-3">
        <?php if ($edit) { ?>
            <button type="submit" class="btn hvr-hover">Save</button>
        <?php } else { ?>
            <a href="<?= BASE_URL."account/profile/edit"?>" class="btn hvr-hover">Edit</a>
        <?php } ?>
        </div>
        
    </div>    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="first_name" class="mb-0">First Name</label>
            <input type="text" class="form-control" name="first_name" value="<?= $user["first_name"]?>" placeholder="First Name" data-required="true" <?= $edit? "" : "readonly"?>>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6">
            <label for="last_name" class="mb-0">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="<?= $user["last_name"]?>" placeholder="Last Name" data-required="true" <?= $edit? "" : "readonly"?>>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="phone" class="mb-0">Phone Number</label>
            <input type="number" class="form-control" name="phone" value="<?= $user["phone"]?>" placeholder="Phone Number" data-required="true" <?= $edit? "" : "readonly"?>> 
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="email" class="mb-0">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $user["email"]?>" placeholder="Email" data-required="true" <?= $edit? "" : "readonly"?>> 
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="address" class="mb-0">Address</label>
            <input type="text" class="form-control" name="address" value="<?= $user["address"]?>" placeholder="Address" data-required="true" <?= $edit? "" : "readonly"?>> 
            <div class="help-block with-errors"></div>
        </div>
    </div>
</form>
</div>
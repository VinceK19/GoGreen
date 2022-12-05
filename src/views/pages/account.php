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
            <h2><a href="<?= BASE_URL."account/order"?>">View my orders</a></h2>
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
            <input type="text" class="form-control" name="first_name" value="<?= $user["first_name"]?>" placeholder="First Name" required <?= $edit? "" : "readonly"?>>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6">
            <label for="last_name" class="mb-0">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="<?= $user["last_name"]?>" placeholder="Last Name" required <?= $edit? "" : "readonly"?>>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="phone" class="mb-0">Phone Number</label>
            <input type="number" class="form-control" name="phone" value="<?= $user["phone"]?>" placeholder="Phone Number" required <?= $edit? "" : "readonly"?>> 
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="email" class="mb-0">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $user["email"]?>" placeholder="Email" required <?= $edit? "" : "readonly"?>> 
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="address" class="mb-0">Address</label>
            <input type="text" class="form-control" name="address" value="<?= $user["address"]?>" placeholder="Address" required <?= $edit? "" : "readonly"?>> 
            <div class="help-block with-errors"></div>
        </div>
    </div>
</form>


        <form action="<?= BASE_URL."account/changePassword"?>" method="POST">
        <h2><b>Change Password</b></h2>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="old_password" class="mb-0">Current Password</label>
                <input type="password" class="form-control" name="old_password" value="" placeholder="Current Password" required <?= $edit? "" : "readonly"?>>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="new_password" class="mb-0">New Password</label>
                <input type="password" class="form-control" name="new_password" value="" placeholder="New Password" required <?= $edit? "" : "readonly"?>>
                <div class="help-block with-errors"></div>
            </div>
        </div>
            <button type="submit" class="btn hvr-hover">Comfirmed</button>
        </form>
        
</div>
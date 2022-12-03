<?php 
require_once(PATH_COMPONENTS."title-box.php");
?>
<div class="container pt-5 pb-5">
    <div class="row align-items-center">
        <div class="col-sm-12 col-lg-4 p-3 text-center">
            <h2>Already have an account?</h2>
            <a class="btn hvr-hover" href="<?= BASE_URL."account/login"?>">Sign in here</a>               
        </div>
        <div class="col-sm-12 col-lg-8 mb-3 border-left border-dark">
            <div class="border-bottom border-dark">
                <h2><b>Sign Up</b></h2>
            </div>
            <form method="post" action="<?= BASE_URL."account/register" ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username" class="mb-0">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username"  data-minlength="8"> 
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password" class="mb-0">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" data-test="true"> 
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="first_name" class="mb-0">First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" data-required="true">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name" class="mb-0">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" data-required="true">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone" class="mb-0">Phone number</label>
                        <input type="number" class="form-control" name="phone" placeholder="Phone Number" data-required="true"> 
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="mb-0">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" data-required="true"> 
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address" class="mb-0">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address" data-required="true"> 
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <button type="submit" class="btn hvr-hover">Create</button>
            </form>
        </div>        
    </div>
</div>
<script src="<?= BASE_URL?>public/js/validator.js"></script>
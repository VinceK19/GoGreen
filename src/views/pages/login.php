<?php 
require_once(PATH_COMPONENTS."title-box.php");
?>
<div class="container pt-5 pb-5">
    <div class="row align-items-center">
        <div class="col-sm-12 col-lg-8 p-3 border-right border-dark">
            <h2 class="border-bottom border-dark"><b>Account Login</b></h2>
            <form method="post" action="<?= BASE_URL."account/login" ?>" role="form">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="username" class="mb-0">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" data-equals="foo"> 
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password" class="mb-0">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" data-required="true">
                        <div class="help-block with-errors"></div> 
                    </div>
                        
                </div>
                <button type="submit" class="btn hvr-hover">Login</button>                    
                
            </form>
        </div>        
        <div class="col-sm-12 col-lg-4 p-3 text-center">
            <h2>Don't have an account?</h2>
            <a class="btn hvr-hover" href="<?= BASE_URL."account/register"?>">Sign up here</a>               
        </div>

    </div>
</div>
<script src="<?= BASE_URL ?>public/js/validator.js"></script>

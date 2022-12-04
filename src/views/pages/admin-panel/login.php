<div class="container">
<form action="<?= BASE_URL."admin/login"?>" method="post">
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title-all">
            <h1>Admin Login</h1>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Passworld">
        </div>
        <div class="d-flex justify-content-end">
            <input class="btn btn-secondary " type="submit" value="Login">
        </div>
    </div>    
</div>
    
</form>
</div>


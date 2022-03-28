<!--------- LOGIN FORM ---------->
<section class="login">
    <div class="container">
        <div class="wrapper">
            <div class="box-shadow mt-5 mb-5">
                <div class="row mt-4">
                    <div class="col-12 text-center login-image"><img src="<?=base_url()?>images/recipe-ideas-logo.png" alt="recipe-logo" class="recipe-logo"></div>
                </div>
                <form action="<?=base_url()?>account/loginUser" method="POST">
                    <div class="mb-3 mt-4">
                        <label class="form-label">Username</label>
                        <input type="text" name="login_username" class="form-control" value="<?=set_value('login_username')?>">
                        <?php echo form_error('login_username', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="login_password" class="form-control" value="<?=set_value('login_password')?>">
                        <?php echo form_error('login_password', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <?php 
                        if(isset($_SESSION['login'])){
                            if($_SESSION['login'] == "failed"){
                            ?>
                            <div class="mb-3">
                                <div class="alert alert-danger text-center">Incorrect Username and Password</div>
                            </div>
                            <?php
                            }
                            unset($_SESSION['login']);
                        }
                    ?>
                    
                    <input type="submit" class="btn btn-primary mt-2" value="Login">
                    <p class="login-register text-center mt-4">Doesn't have an account yet? Click <a href="<?=base_url()?>registration/registerView">here</a> to register</p>
                </form>
            </div>
        </div>
    </div>
</section>
    
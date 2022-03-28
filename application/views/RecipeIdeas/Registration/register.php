<!--------- REGISTRATION FORM ---------->
<section class="register login">
    <div class="container">
        <div class="wrapper">
            <div class="box-shadow mt-5 mb-5">
                <div class="row mt-4">
                    <div class="col-12 text-center login-image"><img src="<?=base_url()?>images/recipe-ideas-logo.png" alt="recipe-logo" class="recipe-logo"></div>
                </div>
                <form action="<?=base_url()?>registration/registerUser" method="POST" enctype="multipart/form-data">
                    <?php 
                        if($this->session->has_userdata('register')){
                            if($this->session->userdata('register') == "success"){
                                ?>
                                <script>
                                    Swal.fire(
                                        'Registered Successfully',
                                        'Verification code has been sent to your email!',
                                        'success'
                                    )
                                </script>
                                <div class="mb-3 mt-4">
                                    <div class="alert alert-success text-center">Registered Successfully</div>
                                </div>
                                <?php
                            }
                            $this->session->unset_userdata('register');
                        }
                    ?>
                    <div class="mb-3 mt-4">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="fullname" class="form-control" value="<?=set_value('fullname')?>">
                        <?php echo form_error('fullname', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="<?=set_value('email')?>">
                        <?php echo form_error('email', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?=set_value('username')?>">
                        <?php echo form_error('username', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="<?=set_value('password')?>">
                        <?php echo form_error('password', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" value="<?=set_value('cpassword')?>">
                        <?php echo form_error('cpassword', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Choose your Image</label>
                        <input type="file" name="userfile" class="form-control" onchange="previewFile(this);">
                        <?php echo form_error('userfile', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <div class="text-center">
                            <img id="previewImgReg" class="border" src="<?=base_url()?>images/default-recipe-image.png" alt="Placeholder">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary mt-2" value="Register">
                    <p class="login-register text-center mt-4">Already have an account? Click <a href="<?=base_url()?>account/loginView">here</a> to login</p>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImgReg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
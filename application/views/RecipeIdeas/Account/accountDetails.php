<?php $data=$result[0];?>
<section class="account-info login">
    <div class="container">
        <div class="box-shadow mt-5 mb-5">
            <div class="row">
                <div class="col text-center mt-3 mb-3">
                    <h3>Account Details</h3>
                </div>
            </div>
            <div class="wrapper">
                <div class="row m-auto">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-12 text-center mb-4"><img src="<?=base_url()?>uploads/Users/<?=$data->user_image_name?>" alt="user_image" class="account-image"></div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-12 text-start">Fullname: <?=$data->user_fullname?></div>
                            <div class="col-12 text-start">Email: <?=$data->user_email?></div>
                            <div class="col-12 text-start">Username: <?=$data->user_username?></div>
                            <div class="col-12 text-start">
                                Verified: <?=$data->user_verified?>
                                <?php 
                                    if($data->user_verified == "No"){
                                        echo '<span class="not-verified"><i class="far fa-times-circle"></i></span>';
                                    } else {
                                        echo '<span class="verified"><i class="far fa-check-circle"></i></span>';
                                    }
                                ?>
                            </div>
                            <div class="col-12 text-start">Saved Recipe: <?=$recipes?></div>
                            <div class="col-12 text-start">Posted Recipe: <?=$postedRecipes?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="box-shadow mt-5 mb-5">
            <div class="row">
                <div class="col text-center mt-3 mb-3">
                    <h3>Reset Password</h3>
                </div>
            </div>
            <div class="wrapper">
                <form action="<?=base_url()?>account/resetPassword" method="POST">
                    <div class="mb-2" id="resetPassword">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="curr-password" class="form-control">
                        <?php echo form_error('curr-password', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Enter New Password</label>
                        <input type="password" name="new-password" class="form-control">
                        <?php echo form_error('new-password', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirm-password" class="form-control">
                        <?php echo form_error('confirm-password', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <?php
                        if($this->session->has_userdata('resetPassword')){
                            if($this->session->userdata('resetPassword') == "success"){
                                ?>
                                    <script>
                                        Swal.fire(
                                            'Password Changed Successfully',
                                            '',
                                            'success'
                                        )
                                    </script>
                                    <div class="mb-3 ">
                                        <div class="alert alert-success text-center">Password Changed Successfully</div>
                                    </div>
                                <?php
                            }
                            $this->session->unset_userdata('resetPassword');
                        }
                    ?>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-success resetPassword" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
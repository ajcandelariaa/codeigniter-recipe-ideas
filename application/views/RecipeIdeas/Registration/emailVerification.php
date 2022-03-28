<section class="email-verification login">
    <div class="container">
        <div class="box-shadow mt-5">
            <div class="row">
                <div class="col text-center">
                    <h5>Email Verification</h5>
                </div>
            </div>
            
            <div class="row">
                <form action="<?=base_url()?>registration/emailVerification/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>" method="POST">
                    <div class="mb-3 mt-4">
                        <label class="form-label">Verification Code</label>
                        <input type="text" name="verificationCode" class="form-control" value="<?=set_value('verificationCode')?>">
                        <?php echo form_error('verificationCode', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <?php 
                        if($this->session->has_userdata('verified')){
                            if($this->session->userdata('verified') == "valid"){
                                ?>
                                <div class="mb-3">
                                    <div class="alert alert-success text-center">You are now verified</div>
                                </div>
                                <?php
                            } else if($this->session->userdata('verified') == "invalid"){
                                ?>
                                <div class="mb-3">
                                    <div class="alert alert-danger text-center">Incorrect Code</div>
                                </div>
                                <?php
                            } else if($this->session->userdata('verified') == "existing"){
                                ?>
                                <div class="mb-3">
                                    <div class="alert alert-danger text-center">You are already verified</div>
                                </div>
                                <?php
                            }
                            $this->session->unset_userdata('verified');
                        }
                    ?>
                    <input type="submit" class="btn btn-success" value="Verify">
                </form>
            </div>
        </div>
    </div>
</section>
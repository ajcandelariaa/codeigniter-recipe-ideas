<section class="posted-recipes">
    <div class="container">
        <div class="wrapper">
            <div class="box-shadow mt-5 mb-5">
                <?php 
                    if($this->session->has_userdata('post_status')){
                        if($this->session->userdata('post_status') == "deleted"){
                            ?>
                            <script>
                                Swal.fire(
                                    'Post Deleted',
                                    '',
                                    'success'
                                )
                            </script>
                            <?php
                        }
                        $this->session->unset_userdata('post_status');
                    }
                ?>
                <div class="row mt-3">
                    <div class="col-12 text-center"><h3>My Posted Recipes</h3></div>
                </div>
                <div class="row text-center mt-4 mb-3">
                    <div class="col"><strong>Recipe Image</strong></div>
                    <div class="col"><strong>Recipe Name</strong></div>
                    <div class="col"><strong>Recipe Category</strong></div>
                    <div class="col"><strong>Date Posted</strong></div>
                    <div class="col"><strong>Time Posted</strong></div>
                    <div class="col"><strong>Delete</strong></div>
                </div>
                
                <?php
                    if(empty($posts)){
                        ?>
                        <div class="row text-center mt-4">
                            <div class="col">
                                <div class="alert alert-danger">You have no posted recipe yet.</div>
                            </div>
                        </div>
                        <?php
                    } else {
                        for($i=0; $i<count($posts); $i++){
                        ?>
                            <div class="row text-center mt-2 d-flex align-items-center">
                                <div class="col"><img src="<?=base_url()?>uploads/Foods/<?=$recipes[$i][0]->recipe_image?>" class="border rounded" width="150px" alt="food-image"></div>
                                <div class="col"><?=$recipes[$i][0]->recipe_name?></div>
                                <div class="col"><?=$recipes[$i][0]->recipe_category?></div>
                                <div class="col"><?=$posts[$i]->recipe_post_date?></div>
                                <div class="col"><?=$posts[$i]->recipe_post_time?></div>
                                <div class="col"><a href="<?=base_url()?>recipe/deletePost/<?=$posts[$i]->recipe_post_id?>/<?=$recipes[$i][0]->recipe_id?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></div>
                            </div>
                        <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>
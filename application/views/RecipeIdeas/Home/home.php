<!--------- LIST OF RECIPES ---------->
<section class="recipes">
    <div class="container">
        <div class="wrapper mb-5">
            <div class="mt-5">
                <?=$links;?>
            </div>
            <?php
            if (empty($posts)){
                ?>
                <div class="box-shadow mt-4">
                        <div class="text-center">
                            <div class="alert alert-danger">There are no posts as of now</div>
                        </div>
                    </div>
                <?php
            } else {
                for($i=0; $i<count($posts); $i++){
                    ?>
                    <div class="box-shadow mt-4">
                        <div class="wrapper-information">
                            <div class="left-info">
                                <img src="<?=base_url()?>uploads/Foods/<?=$recipes[$i][0]->recipe_image?>" class="recipe-food-image border rounded" alt="food-image">
                            </div>
                            <div class="right-info">
                                <div class="recipe-name"><?=$recipes[$i][0]->recipe_name?></div>
                                <div class="recipe-time-posted"><span class="clock-icon"><i class="far fa-clock"></i></span>Posted: <?=$posts[$i]->recipe_post_date?> | <?=$posts[$i]->recipe_post_time?> |<a href="<?=base_url()?>home/viewDetailsPostHomeView/<?=$posts[$i]->recipe_post_id?>" target="_blank"><i class="fas fa-info-circle"></i> View Details</a> |</div>
                                <div class="recipe-category">Recipe Category: <?=$recipes[$i][0]->recipe_category?></div>
                                <div class="recipe-description"><?=$recipes[$i][0]->recipe_description?></div>
                                <div class="recipe-author">
                                    <img src="<?=base_url()?>uploads/Users/<?=$users[$i][0]->user_image_name?>" class="image-fluid recipe-author-image" alt="recipe-author-image">
                                    <span class="recipe-author-name"><?=$users[$i][0]->user_fullname?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="mt-4">
                <?=$links;?>
            </div>
        </div>
    </div>
</section>
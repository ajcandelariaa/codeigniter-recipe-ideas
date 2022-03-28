<!--------- LIST OF RECIPES ---------->
<section class="recipes">
    <div class="container">
        <div class="wrapper mb-5">
            <div class="box-shadow mt-5">
                <div class="wrapper-information">
                    <div class="left-info">
                        <img src="<?=base_url()?>uploads/Foods/<?=$recipes[0][0]->recipe_image?>" class="recipe-food-image border rounded" alt="food-image">
                        <div class="recipe-author">
                            <img src="<?=base_url()?>uploads/Users/<?=$users[0][0]->user_image_name?>" class="image-fluid recipe-author-image" alt="recipe-author-image">
                            <span class="recipe-author-name"><?=$users[0][0]->user_fullname?></span>
                        </div>
                        <div class="mt-3"><span class="clock-icon"><i class="fas fa-clock"></i></span>Posted: <?=$posts[0]->recipe_post_date?> | <?=$posts[0]->recipe_post_time?></div>
                        <div class="mt-2">
                            <span><i class="fas fa-tags"></i></span>
                            Category: <?=$recipes[0][0]->recipe_category?>
                        </div>
                        <div class="mt-2">
                            <span><i class="fas fa-user-friends"></i></span>
                            Serving: <?=$recipes[0][0]->recipe_servings?> people
                        </div>
                        <div class="mt-2">
                            <span><i class="fas fa-clock"></i></span>
                            Preparation Time: <?=$recipes[0][0]->recipe_prep_time?> minutes
                        </div>
                        <div class="mt-2">
                            <span><i class="fas fa-clock"></i></span>
                            Cooking Time: <?=$recipes[0][0]->recipe_cook_time?> minutes
                        </div>
                        <div class="mt-2">
                            <span><i class="fas fa-clock"></i></span>
                            Total Time: <?=$recipes[0][0]->recipe_prep_time + $recipes[0][0]->recipe_cook_time?> minutes
                        </div>
                    </div>
                    <div class="right-info">
                        <div class="recipe-name"><?=$recipes[0][0]->recipe_name?></div>
                        <div class="recipe-description"><?=$recipes[0][0]->recipe_description?></div>
                        <div class="row mt-4">
                            <div class="col-12"><h5>Ingredients</h5></div>
                            <div class="col-12">
                                <ul>
                                <?php
                                    for($i=0; $i<count($ingredients[0]); $i++){
                                        ?>
                                        <li><?=$ingredients[0][$i]->recipe_ingredient_text?></li>
                                        <?php
                                    }
                                ?>
                                </ul>
                            </div>
                        </div>
                            <div class="col-12 mt-4"><h5>How to Cook:</h5></div>
                            <div class="col-12">
                                <ul>
                                <?php
                                    for($i=0; $i<count($steps[0]); $i++){
                                        ?>
                                        <li><?=$steps[0][$i]->recipe_step_text?></li>
                                        <?php
                                    }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
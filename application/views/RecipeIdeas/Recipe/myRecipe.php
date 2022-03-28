<div class="container my-recipe">
    <div class="row mt-5">
        <div class="col-12 text-center text-white"><h3>My Recipe</h3></div>
    </div>
    <?php 
        if($this->session->has_userdata('share_status') || $this->session->has_userdata('edit_status')){
            if($this->session->userdata('share_status') == "limit"){
                ?>
                <script>
                    Swal.fire(
                        'You can\'t post your recipe unless you are verified',
                        '',
                        'error'
                    )
                </script>
                <?php
            } else if($this->session->userdata('share_status') == "success"){
                ?>
                <script>
                    Swal.fire(
                        'Recipe Posted',
                        '',
                        'success'
                    )
                </script>
                <?php
            } else if($this->session->userdata('share_status') == "deleted"){
                ?>
                <script>
                    Swal.fire(
                        'Recipe Deleted',
                        '',
                        'success'
                    )
                </script>
                <?php
            } else if($this->session->userdata('edit_status') == "edited"){
                ?>
                <script>
                    Swal.fire(
                        'Recipe Edited',
                        '',
                        'success'
                    )
                </script>
                <?php
                $this->session->unset_userdata('edit_status');
            }
            $this->session->unset_userdata('share_status');
        }
    ?>
    <?php 
        if(empty($config)){
            ?>
            <div class="text-center mt-3">
                <div class="alert alert-danger">You don't have any recipes as of now</div>
            </div>
            <?php
        } else {
            foreach ($config as $recipes){             
                $recipe = $recipes[0];
                $recipeIng = $recipes[1];
                $recipeStep = $recipes[2];
                ?>
                <div class="box-shadow mt-5">
                    <div class="wrapper-information">
                        <div class="left-info">
                            <img src="<?=base_url()?>uploads/Foods/<?=$recipe[0]->recipe_image?>" class="recipe-food-image border rounded" alt="food-image">
                            <div class="mt-2">
                                <span><i class="fas fa-tags"></i></span>
                                Posted: <?=$recipe[0]->recipe_posted?>
                                <?php 
                                    if($recipe[0]->recipe_posted == "No"){
                                        echo '<span class="not-verified"><i class="far fa-times-circle"></i></span>';
                                    } else {
                                        echo '<span class="verified"><i class="far fa-check-circle"></i></span>';
                                    }
                                ?>
                            </div>
                            <div class="mt-2">
                                <span><i class="fas fa-tags"></i></span>
                                Category: <?=$recipe[0]->recipe_category?>
                            </div>
                            <div class="mt-2">
                                <span><i class="fas fa-user-friends"></i></span>
                                Serving: <?=$recipe[0]->recipe_servings?> people
                            </div>
                            <div class="mt-2">
                                <span><i class="fas fa-clock"></i></span>
                                Preparation Time: <?=$recipe[0]->recipe_prep_time?> minutes
                            </div>
                            <div class="mt-2">
                                <span><i class="fas fa-clock"></i></span>
                                Cooking Time: <?=$recipe[0]->recipe_cook_time?> minutes
                            </div>
                            <div class="mt-2 mb-3">
                                <span><i class="fas fa-clock"></i></span>
                                Total Time: <?=$recipe[0]->recipe_prep_time + $recipe[0]->recipe_cook_time?> minutes
                            </div>
                            <?php 
                                if ($recipe[0]->recipe_posted == "Yes"){ ?>
                                    <button class="btn btn-secondary" disabled>Posted</button>
                                    <?php 
                                } else { 
                                    ?>
                                    <a href="<?=base_url()?>recipe/shareRecipe/<?=$recipe[0]->recipe_id?>" class="btn btn-success">Post</a>
                                    <?php 
                                }
                                ?>
                                <a href="<?=base_url()?>recipe/editRecipeView/<?=$recipe[0]->recipe_id?>" target="_blank" class="btn btn-warning">Edit</a>
                                <a href="<?=base_url()?>recipe/deleteRecipe/<?=$recipe[0]->recipe_id?>" class="btn btn-danger btn-delete">Delete</a>
                        </div>
                        <div class="right-info">
                            <div class="recipe-name"><?=$recipes[0][0]->recipe_name?></div>
                            <div class="recipe-description"><?=$recipe[0]->recipe_description?></div>
                            <div class="row mt-4">
                                <div class="col-12"><h5>Ingredients</h5></div>
                                <div class="col-12">
                                    <ul>
                                    <?php
                                       foreach ($recipeIng[0] as $ingredient){
                                        if($ingredient == "none"){
                                            echo "<li>NA</li>";
                                        } else {
                                            if($ingredient->recipe_ingredient_text == ""){
                                                echo "<li>NA</li>";
                                            } else{
                                                echo "<li>$ingredient->recipe_ingredient_text</li>";
                                            }
                                        }
                                    }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 mt-4"><h5>How to Cook:</h5></div>
                            <div class="col-12">
                                <ol>
                                <?php
                                    foreach ($recipeStep[0] as $step){
                                        if($step == "none"){
                                            echo "<li>NA</li>";
                                        } else {
                                            if($step->recipe_step_text == ""){
                                                echo "<li>NA</li>";
                                            } else{
                                                echo "<li>$step->recipe_step_text</li>";
                                            }
                                        }
                                    }
                                ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    ?>
</div>

<script>
    $('.btn-delete').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Delete Recipe?',
            text: 'Are you sure you want to delete?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) =>{
            if(result.value){
                document.location.href = href;
            }
        })
    })
</script>
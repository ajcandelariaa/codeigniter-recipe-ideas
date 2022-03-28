<section class="add-recipe edit-recipe mt-5">
    <div class="container">
        <div class="box-shadow mb-5">
            <div class="wrapper">
                <?php 
                    if($this->session->has_userdata('addRecipe')){
                        if($this->session->userdata('addRecipe') == "success"){
                            ?>
                            <div class="mb-3">
                                <div class="alert alert-success text-center">Recipe Saved</div>
                            </div>
                            <?php
                        }
                        $this->session->unset_userdata('addRecipe');
                    }
                ?>
                <div class="row">
                    <div class="col-12 text-center add-recipe-title mt-3"><h3>Edit Recipe</h3></div>
                </div>
                <form action="<?=base_url()?>recipe/editRecipeDatabase/<?=$config[0][0]->recipe_id?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-4">
                        <label class="form-label"><h6>Recipe Name:</h6></label>
                        <input type="text" name="recipe-name" class="form-control" value="<?=$config[0][0]->recipe_name?>">
                        <?php echo form_error('recipe-name', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h6>Recipe Description:</h6></label>
                        <textarea name="recipe-description" class="form-control" rows=4><?=$config[0][0]->recipe_description?></textarea>
                        <?php echo form_error('recipe-description', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><h6>Preperation Time:</h6> </label>
                                <input type="number" name="recipe-prep-time" min="1" placeholder="minutes" class="form-control" value="<?=$config[0][0]->recipe_prep_time?>">
                                <?php echo form_error('recipe-prep-time', "<div class='text-danger'> ", "</div>"); ?>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><h6>Cook Time:</h6> </label>
                                <input type="number" name="recipe-cook-time" min="1" placeholder="minutes" class="form-control" value="<?=$config[0][0]->recipe_cook_time?>">
                                <?php echo form_error('recipe-cook-time', "<div class='text-danger'> ", "</div>"); ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label"><h6>Servings:</h6> </label>
                                <input type="number" name="recipe-servings" min="1" placeholder="people" class="form-control" value="<?=$config[0][0]->recipe_servings?>">
                                <?php echo form_error('recipe-servings', "<div class='text-danger'> ", "</div>"); ?>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><h6>Recipe Category:</h6></label>
                                <select name="recipe-category" class="form-select">
                                <?php
                                    $options = array('Main Dish', 'Appetizer', 'Dessert', 'Soup', 'Salad');
                                    $output = '';
                                    foreach ($options as $option){
                                        if($option == $config[0][0]->recipe_category){
                                            echo '<option selected="selected" value="'.$option.'">'.$option.'</option>';
                                        } else {
                                            echo '<option value="'.$option.'">'.$option.'</option>';
                                        }
                                    }
                                    for($i=0; $i<count($options); $i++) {
                                    $output .= '<option ' 
                                                . ( $_GET['sel'] == $options[$i] ? 'selected="selected"' : '' ) . '>' 
                                                . $options[$i] 
                                                . '</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="mb-3">
                        <h6 class="text-start">Edit Recipe Ingredients:</h6>
                        <table id="ingredients_table" width="100%">
                            <?php 
                                $countConfig1 = 1;
                                foreach($config[1] as $recipe_text){
                                    ?>
                                    <tr>
                                        <td style="width:90%;">
                                            <textarea class='form-control mt-2'  name='ingredient[]' placeholder='Enter Ingredient' rows="1"><?=$recipe_text->recipe_ingredient_text?></textarea>
                                        </td>
                                        <?php if($countConfig1 != 1) { ?>
                                        <td style="width:10%; padding-left: 5px;">
                                            <a href="<?=base_url()?>recipe/removeRecipeIngredient/<?=$recipe_text->recipe_ingredient_id?>/<?=$config[0][0]->recipe_id?>" class="mt-2 btn btn-warning"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php
                                    $countConfig1++;
                                }
                            ?>
                        </table>
                        <div class="text-center">
                            <input type="button" class="mt-2 btn btn-success" onclick="add_row_ingredient();" value="Add More Ingredient">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <h6 class="text-start">Edit Recipe Steps:</h6>
                        <table id="step_table" width="100%">
                            <?php 
                                $countConfig2 = 1;
                                foreach($config[2] as $recipe_text){
                                    ?>
                                    <tr>
                                        <td style="width:90%;">
                                            <textarea class='form-control mt-2'  name='step[]' placeholder='Enter Step' rows="1"><?=$recipe_text->recipe_step_text?></textarea>
                                        </td>
                                        <?php if($countConfig2 != 1) { ?>
                                        <td style="width:10%; padding-left: 5px;">
                                            <a href="<?=base_url()?>recipe/removeRecipeStep/<?=$recipe_text->recipe_step_id?>/<?=$config[0][0]->recipe_id?>" class="mt-2 btn btn-warning"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php
                                    $countConfig2++;
                                }
                            ?>
                        </table>
                        <div class="text-center">
                            <input type="button" class="mt-2 btn btn-success" onclick="add_row_step();" value="Add More Step">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h6>Recipe Image:</h6></label>
                        <input type="file" name="userfile" class="form-control" onchange="previewFile(this);">
                    </div>
                    <div class="mb-3 text-center">
                        <img src="<?=base_url()?>uploads/Foods/<?=$config[0][0]->recipe_image?>" class="border" alt="recipe_image" width="360px" height="250px" id="previewImg">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-warning" value="SAVED CHANGES">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php 
    if($this->session->has_userdata('edit_recipe')){
        if($this->session->userdata('edit_recipe') == "stepDeleted"){
            ?>
            <script>
                Swal.fire(
                    'Step Deleted',
                    '',
                    'success'
                )
            </script>
            <?php
        } else if($this->session->userdata('edit_recipe') == "ingredientDeleted"){
            ?>
            <script>
                Swal.fire(
                    'Ingredient Deleted',
                    '',
                    'success'
                )
            </script>
            <?php
        }
        $this->session->unset_userdata('edit_recipe');
    }
?>
<script type="text/javascript">
    function add_row_ingredient(){
        var rowno = $("#ingredients_table tr").length;
        rowno += 1;
        $("#ingredients_table tr:last").after(`
            <tr id='ingr_row`+rowno+`'>
                <td style="width:90%";><textarea class='form-control mt-2'  name='ingredient[]' placeholder='Enter Ingredient' rows="1"></textarea></td>
                <td style="width:10%; padding-left: 5px;"><button class="mt-2 btn btn-danger" onclick="delete_row_ingredient('ingr_row`+rowno+`')"><i class="far fa-trash-alt"></i></button></td>
            </tr>
        `);
    }
    function delete_row_ingredient(rowno){
        $('#'+rowno).remove();
    }

    function add_row_step(){
        var rowno = $("#step_table tr").length;
        rowno += 1;
        $("#step_table tr:last").after(`
            <tr id='step_row`+rowno+`'>
                <td style="width:90%";><textarea class="form-control mt-2" name="step[]" placeholder="Enter Step" rows="1"></textarea></td>
                <td style="width:10%; padding-left: 5px;"><button class="mt-2 btn btn-danger" onclick="delete_row_step('step_row`+rowno+`')"><i class="far fa-trash-alt"></i></button></td>
            </tr>
        `);
    }
    function delete_row_step(rowno){
        $('#'+rowno).remove();
    }
</script>
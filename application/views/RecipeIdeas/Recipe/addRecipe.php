<section class="add-recipe mt-5">
    <div class="container">
        <div class="box-shadow mb-5">
            <div class="wrapper">
                <?php 
                    if($this->session->has_userdata('addRecipe')){
                        if($this->session->userdata('addRecipe') == "success"){
                            ?>
                            <script>
                                Swal.fire(
                                    'Recipe Added',
                                    '',
                                    'success'
                                )
                            </script>
                            <?php
                        }
                        $this->session->unset_userdata('addRecipe');
                    }
                ?>
                <div class="row">
                    <div class="col-12 text-center add-recipe-title mt-3"><h3>Create Recipe</h3></div>
                </div>
                <form action="<?=base_url()?>recipe/addRecipeDatabase" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-4">
                        <label class="form-label"><h6>Recipe Name</h6></label>
                        <input type="text" name="recipe-name" class="form-control" value="<?=set_value('recipe-name')?>">
                        <?php echo form_error('recipe-name', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h6>Recipe Description</h6></label>
                        <textarea name="recipe-description" class="form-control" rows=4><?=set_value('recipe-description')?></textarea>
                        <?php echo form_error('recipe-description', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><h6>Preperation Time:</h6> </label>
                                <input type="number" name="recipe-prep-time" min="1" placeholder="minutes" class="form-control" value="<?=set_value('recipe-prep-time')?>">
                                <?php echo form_error('recipe-prep-time', "<div class='text-danger'> ", "</div>"); ?>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><h6>Cook Time:</h6> </label>
                                <input type="number" name="recipe-cook-time" min="1" placeholder="minutes" class="form-control" value="<?=set_value('recipe-cook-time')?>">
                                <?php echo form_error('recipe-cook-time', "<div class='text-danger'> ", "</div>"); ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label"><h6>Servings:</h6> </label>
                                <input type="number" name="recipe-servings" min="1" placeholder="people" class="form-control" value="<?=set_value('recipe-servings')?>">
                                <?php echo form_error('recipe-servings', "<div class='text-danger'> ", "</div>"); ?>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><h6>Category</h6></label>
                                <select name="recipe-category" class="form-select">
                                    <option value="" selected>---</option>
                                    <option value="Main Dish">Main Dish</option>
                                    <option value="Appetizer">Appetizer</option>
                                    <option value="Dessert">Dessert</option>
                                    <option value="Soup">Soup</option>
                                    <option value="Salad">Salad</option>
                                </select>
                                <?php echo form_error('recipe-category', "<div class='text-danger'> ", "</div>"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                    </div>

                    <div class="mb-3 mt-4">
                        <h6 class="text-start">Recipe Ingredients</h6>
                        <table id="ingredients_table" width="100%">
                            <tr id="ingr_row1">
                                <td><textarea class='form-control mt-2'  name='ingredient[]' placeholder='Enter Ingredient' rows="1"></textarea></td>
                            </tr>
                        </table>
                        <div class="text-center mt-2">
                            <input type="button" class="mt-2 btn btn-success" onclick="add_row_ingredient();" value="Add Ingredient">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <h6 class="text-start">Recipe Steps:</h6>
                        <table id="step_table" width="100%">
                            <tr id="step_row1">
                                <td style="width:90%;"><textarea class="form-control mt-2" name="step[]" placeholder="Enter Step" rows="1"></textarea></td>
                            </tr>
                        </table>
                        <div class="text-center mt-2">
                            <input type="button" class="mt-2 btn btn-success" onclick="add_row_step();" value="Add Step">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h6>Recipe Image</h6></label>
                        <input type="file" name="userfile" class="form-control" onchange="previewFile(this);">
                        <?php echo form_error('userfile', "<div class='text-danger'> ", "</div>"); ?>
                    </div>
                    <div class="text-center">
                        <img width="360px" height="250px" id="previewImg" class="border" src="<?=base_url()?>images/default-recipe-image.png" alt="Placeholder">
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="submit" class="btn btn-warning text-dark" value="SUBMIT">
                    </div>
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
                $("#previewImg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

    function add_row_ingredient(){
        var rowno = $("#ingredients_table tr").length;
        rowno += 1;
        $("#ingredients_table tr:last").after(`
            <tr id='ingr_row`+rowno+`'>
                <td style="width:90%;"><textarea class='form-control mt-2'  name='ingredient[]' placeholder='Enter Ingredient' rows="1"></textarea></td>
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
                <td style="width:90%;"><textarea class="form-control mt-2" name="step[]" placeholder="Enter Step" rows="1"></textarea></td>
                <td style="width:10%; padding-left: 5px;"><button class="mt-2 btn btn-danger" onclick="delete_row_step('step_row`+rowno+`')"><i class="far fa-trash-alt"></i></button></td>
            </tr>
        `);
    }
    function delete_row_step(rowno){
        $('#'+rowno).remove();
    }
</script>
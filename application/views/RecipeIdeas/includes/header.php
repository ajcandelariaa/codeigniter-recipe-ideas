<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url()?>styles/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="<?=base_url()?>/js/sweetalert2.all.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <link rel="shortcut icon" type="image/jpg" href="<?=base_url()?>images/favicon.png" width="200px"/>
</head>
<body>
<!--------- HEADER ---------->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <p class="navbar-brand" style="margin-bottom: 0px"><img src="<?=base_url()?>images/recipe-ideas-logo.png" alt="recipe-logo" class="recipe-logo"></p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php 
                    if($this->uri->segment(2) == "viewDetailsPostHomeView" || $this->uri->segment(2) == "viewDetailsPostIndexView" || $this->uri->segment(2) == "editRecipeView"){
                        
                    } else if($this->uri->segment(2) == "emailVerificationView"){
                        ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Email Verification</a>
                        </li>
                        <?php
                    } else if($this->session->userdata('logged_user')){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="home"){?> active <?php } ?>" href="<?=base_url()?>home/home">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <?php 
                                if($this->uri->segment(2)=="accountDetailsView" || 
                                    $this->uri->segment(2)=="myRecipeView" || 
                                    $this->uri->segment(2)=="postedRecipeView" ||
                                    $this->uri->segment(2)=="addRecipeView") {
                                    ?>
                                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- <span class="user-icon-navbar"><img src="<?=base_url()?>images/Users/aj.jpg" alt="user-icon"></span>  -->
                                        PROFILE
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- <span class="user-icon-navbar"><img src="<?=base_url()?>images/Users/aj.jpg" alt="user-icon"></span>  -->
                                        PROFILE
                                    </a>
                                    <?php
                                }
                            ?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item <?php if($this->uri->segment(2)=="accountDetailsView"){?> bg-active <?php } ?>" href="<?=base_url()?>account/accountDetailsView"><i class="far fa-user-circle"></i> Account Details</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item <?php if($this->uri->segment(2)=="myRecipeView"){?> bg-active <?php } ?>" href="<?=base_url()?>recipe/myRecipeView"><i class="fas fa-list"></i> My Recipe</a>
                                </li>
                                <li>
                                    <a class="dropdown-item <?php if($this->uri->segment(2)=="postedRecipeView"){?> bg-active <?php } ?>" href="<?=base_url()?>recipe/postedRecipeView"><i class="fas fa-blog"></i> Posted Recipes</a>
                                </li>
                                <li>
                                    <a class="dropdown-item <?php if($this->uri->segment(2)=="addRecipeView"){?> bg-active <?php } ?>" href="<?=base_url()?>recipe/addRecipeView"><i class="fas fa-utensils"></i> Create Recipe</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?=base_url()?>account/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)==NULL || $this->uri->segment(2)=="index"){?> active <?php } ?>" href="<?=base_url()?>">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="loginView"){?> active <?php } ?>" href="<?=base_url()?>account/loginView">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="registerView"){?> active <?php } ?>" href="<?=base_url()?>registration/registerView">REGISTER</a>
                        </li>
                    <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
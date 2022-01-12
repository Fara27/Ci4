<main>
  <div class="container">
    
    <!--Section: Main info-->
    <section class="mt-5 wow fadeIn">
    <br>
    <h4 class="h4 mb-3"><?=$title?></h4>
    <?php 
        //echo "<pre>";
        ////print_r($viewCat);
        //echo "</pre>";
    ?>
    <?php //if($user): ?>
      <?php //foreach($user as $u): ?>
        <h4 class="h3 mb-3"><?=$u_email?></h4>
      <?php //endforeach; ?>
    <?php //else: ?>
      <p><?=$slogan?></p>
    <?php //endif; ?>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-header">
              <h4 class="h4 mb-4">Delete Category  <a href="<?php echo base_url('category') ?>" type="submit" name="submit" class="btn btn-green float-right">View Category</a></h4>
            </div>   
            <div class="card-body">
              <h5 class="dark-grey-text text-left"> 
                 
                    
                    <strong>Delete Category with ID: <?=$viewCat->cat_id?></strong>
                  </h5>
                  <hr>
                  <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?php echo session()->getFlashdata('msg');?>
                    </div>
                  <?php endif;?>
                 
                  <?= \Config\Services::validation()->listErrors(); ?>
                <!-- Form -->
                <form name="delete-category" action="<?=base_url()?>/category/delete/<?=$viewCat->cat_id?>" method="post" >
                  <!-- Heading -->
                 
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="cat_name" value="<?=$viewCat->cat_name?>" id="cat_name" class="form-control">
                    <input type="hidden" name="cat_id" value="<?=$viewCat->cat_id?>" id="cat_id" class="form-control">
                    <label for="cat_name">Category name</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                    <textarea type="text" name="cat_description" value="<?=$viewCat->cat_description?>" id="cat_description" class="md-textarea"><?=$viewCat->cat_description?></textarea>
                    <label for="cat_description">Category description</label>
                  </div>  

                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-indigo">Delete Category</button>
                  </div>
                  
                </form>
                <!-- Form -->
            </div>   
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 col-xl-6 mb-4">

          <!--Card-->
          <div class="card">
            <div class="card-header">
              <h4 class="h4 mb-4">Category created <?=$viewCat->created_at?></h4>
            </div>   
              <!--Card content-->
              <div class="card-body">
                <p>
                  Display all the available Sub-Categories under this Category
                 
                <?php
              

                   // echo "<pre>";
                  // print_r($this->request->getVar());
                    //print_r($this->request->getPost());
                   // print_r($viewCat);
                   // echo "</pre>";
                ?>
                </p>     
              </div>

            </div>
          <!--/.Card-->

          </div>
          <!--Grid column-->

      </div>
      <!--Grid row-->

      </section>
      <!--Section: Main info-->
     
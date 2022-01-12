<main>
  <div class="container">
    
    <!--Section: Main info-->
    <section class="mt-5 wow fadeIn">
    <br>
    <h4 class="h4 mb-3"><?=$title?></h4>
    <?php 
      echo "<pre>";
      //print_r($user);
      echo "</pre>";
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
              <h4 class="h4 mb-4">Manage Category</h4>
            </div>   
            <div class="card-body">
              <h5 class="dark-grey-text text-left">
                    <strong>Add New Category:</strong>
                  </h5>
                  <hr>
                  <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?php echo session()->getFlashdata('msg');?>
                    </div>
                  <?php endif;?>
                 
                  <?= \Config\Services::validation()->listErrors(); ?>
                <!-- Form -->
                <form name="category" action="<?=base_url()?>/category" method="post" >
                  <!-- Heading -->
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="cat_name" value="<?php ?>" id="cat_name" class="form-control">
                    <label for="cat_name">Category name</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                    <textarea type="text" name="cat_description" id="cat_description" class="md-textarea"></textarea>
                    <label for="cat_description">Category description</label>
                  </div>  

                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-indigo">Add Category</button>
                  </div>
                </form>
                <!-- Form -->
            </div>   
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 col-xl-5 mb-4">

          <!--Card-->
          <div class="card">
            <div class="card-header">
              <h4 class="h4 mb-4">Categories and Sub-Category List</h4>
            </div>   
              <!--Card content-->
              <div class="card-body">
                <p>
                  Display all the available Categories and Sub-Categories

                <?php
                $link = base_url('category/edit');
                $link1 = base_url('category/delete');
                  foreach($viewCat as $cat):
                    ?>
                    <ul>
                      <li>
                        <?=$cat->cat_name ?> - 
                        <a class="btn btn-default btn-sm btn-edit" href="<?=$link?>/<?=$cat->cat_id?>">Edit </a> 
                        <a class="btn btn-danger btn-sm btn-delete" href="<?=$link1?>/<?= $cat->cat_id;?>">Delete </a> 
                      </li>
                    </ul>
                  <?php
                  endforeach;

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
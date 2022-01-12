<main>
  <div class="container">
    <br><br><br>
    <h4 class="h4 mb-3"><?=$title?></h4>
    <!--Section: Main info-->
    <section class="mt-5 wow fadeIn">

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="https://mdbootstrap.com/img/Marketing/mdb-press-pack/mdb-main.jpg" class="img-fluid z-depth-1-half" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 col-xl-5 mb-4">

          <!--Card-->
          <div class="card">
            <?php if(isset($validation)):?>
              <div class="alert alert-danger" role="alert">
                  <strong>Validation error</strong>
                  <?= $validation->listErrors(); ?>
              </div>
              <?php endif; ?>

              <?php if(isset($_SESSION['message_noti'])):?>
                  <div class="alert alert-success" role="alert">
                      <?= $_SESSION['message_noti'] ?>
                  </div>
              <?php endif; ?>

              <?php if(isset($_SESSION['message_error'])):?>
                  <div class="alert alert-danger" role="alert">
                      <?= $_SESSION['message_error'] ?>
                  </div>
              <?php endif; ?>
        

              <!--Card content-->
              <div class="card-body">
              <?= \Config\Services::validation()->listErrors(); ?>
                <!-- Form -->
                <form name="registration" action="<?=base_url()?>/user/store" method="post" >
                  <!-- Heading -->
                  <h4 class="dark-grey-text text-center">
                    <strong>Sign Up:</strong>
                  </h4>
                  <hr>

                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="u_name" value="<?php ?>" id="u_name" class="form-control">
                    <label for="form3">User name</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="f_name" id="f_name" class="form-control">
                    <label for="form3">First name</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="l_name" id="l_name" class="form-control">
                    <label for="form3">Last name</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="o_name" id="o_name" class="form-control">
                    <label for="form3">Other names</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="text" name="email" id="email" class="form-control">
                    <label for="form2">Your email</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-phone prefix grey-text"></i>
                    <input type="text" name="phone" id="phone" class="form-control">
                    <label for="form3">Your phone</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="pword" id="pword" class="form-control">
                    <label for="form3">Password</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="pword0" id="pword0" class="form-control">
                    <label for="form3">Re-Type Password</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <select name="u_type" id="u_type" class="form-control">
                        <option value=""></option>
                        <option value="User">User</option>
                        <option value="Customer">Customer</option>
                        <option value="Supplier">Supplier</option>
                    </select>
                    <label for="form3">Select User Type</label>
                  </div>

               <!--   <div class="md-form">
                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                    <textarea type="text" id="form8" class="md-textarea"></textarea>
                    <label for="form8">Your message</label>
                  </div>  -->

                  <div class="text-center">
                    <button class="btn btn-indigo">Sign Up</button>
                    <hr>
                    <fieldset class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label for="checkbox1" class="form-check-label dark-grey-text">Subscribe me to the newsletter</label>
                    </fieldset>
                   
                    <p>Already have an account? <a href="/user/login">Login Here</a></p>

                  </div>

                </form>
                <!-- Form -->

              </div>

            </div>
          <!--/.Card-->

          </div>
          <!--Grid column-->

      </div>
      <!--Grid row-->

      </section>
      <!--Section: Main info-->
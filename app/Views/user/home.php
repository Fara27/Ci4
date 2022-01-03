  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-6 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold">User Registration</h1>

            <hr class="hr-light">

            <p>
              <strong>Best & free guide of responsive web design</strong>
            </p>

            <p class="mb-4 d-none d-md-block">
              <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                available. Create your own, stunning website.</strong>
            </p>

            <a href="#" class="btn btn-indigo btn-lg">Start free tutorial
              <i class="fas fa-graduation-cap ml-2"></i>
            </a>

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

                <!-- Form -->
                <form name="registration">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Complete the form:</strong>
                  </h3>
                  <hr>

                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="u_name" id="u_name" class="form-control">
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
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="phone" id="phone" class="form-control">
                    <label for="form3">Your phone</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="password" name="pword" id="pword" class="form-control">
                    <label for="form3">User name</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="password" name="pword0" id="pword0" class="form-control">
                    <label for="form3">User name</label>
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
                   
                    <p>Already have an account? <a href="">Login Here</a></p>

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

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->
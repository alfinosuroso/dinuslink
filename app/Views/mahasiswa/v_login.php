
<!doctype html>
<html lang="en">
  <head>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
    .gradient-custom-2 {
    /* fallback for old browsers */
    background: #fccb90;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(90deg, rgba(20,51,255,1) 0%, rgba(75,169,255,1) 0%, rgba(46,126,255,1) 48%, rgba(30,84,255,1) 77%, rgba(20,51,255,1) 100%);;
    }

    @media (min-width: 768px) {
    .gradient-form {
    height: 100vh !important;
    }
    }
    @media (min-width: 769px) {
    .gradient-custom-2 {
    border-top-right-radius: .3rem;
    border-bottom-right-radius: .3rem;
    }
    }
  </style>
  <body>
  <?php
$nim = [
    'name' => 'nim',
    'id' => 'nim',
    'class' => 'form-control'
];

$password = [
    'name' => 'password',
    'id' => 'password',
        'class' => 'form-control'
    ];
    ?>
    <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
            <div class="row g-0">
                <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                    <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                        style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">We are Dinus Link</h4>
                    </div>

                    <!-- <form>
                    <p>Please login to your account</p> -->

                    <?php
                        if (session()->getFlashData('failed')) {
                        ?>
                            <div class="col-12 alert alert-danger" role="alert">
                                <hr>
                                <p class="mb-0">
                                    <?= session()->getFlashData('failed') ?>
                                </p>
                            </div>
                        <?php
                        }
                    ?>

                    <?= form_open('login', 'class = "row g-3 needs-validation"') ?>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label for="yourUsername" class="form-label">Nim</label>
                            <div class="input-group has-validation">
                                <?= form_input($nim) ?>
                                <div class="invalid-feedback">Please enter your nim.</div>
                            </div>
                    </div>


                    <div data-mdb-input-init class="form-outline mb-4">
                        <label for="yourPassword" class="form-label">Password</label>
                            <?= form_password($password) ?>
                            <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                        <?= form_submit('submit', 'Login', ['class' => 'btn btn-primary btn-block fa-lg gradient-custom-2 px-3 rounded-3 me-3']) ?>
                   
                        <a class="text-muted" href="#!">Forgot password?</a>
                    </div>
                    
                    <?= form_close() ?>   

                    <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Don't have an account?</p>
                        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-info">Create new</button>
                    </div>

                    <!-- </form> -->

                </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">We are more than just a connector</h4>
                    <p class="small mb-0">Dinus Link was created to help Udinus students find teammates and competition events that suit their interests and talents. This system not only makes it easier for students to find teammates, but also helps in expanding their network of relationships and connections in their areas of interest.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

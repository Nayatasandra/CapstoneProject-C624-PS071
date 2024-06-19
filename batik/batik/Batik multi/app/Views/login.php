<?= $this->extend('layout/template_login'); ?>
<?= $this->section('content_login'); ?>

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-8 col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->

                <div class="p-2">
                    <div class="login-logo">
                        <div class="row">

                            <div class="flex flex-row mx-auto max-w-screen lg:flex-row justify-between">

                                <div class="col-md-12 text-center">


                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <h3 class="text-center"><strong>LOGIN</strong></h3>
                        </div>
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                        <?php endif; ?>
                        <form action='<?= base_url('home/auth'); ?>' method="post">
                            <div class="Form-group col-sm-12 text-left">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder='' aria-describedby="helpid">
                            </div>
                            <div class="Form-group col-sm-12 text-left">
                                <label for="pass">Password</label>
                                <input type="password" name="pass" id="pass" class="form-control" placeholder='' aria-describedby="helpid">
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-user ">Login</button> | <a class="btn btn-secondary" href="register">Register</a> | <a class="btn btn-info" href="/home" <?= base_url(); ?>">Home</a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>


<?= $this->endSection(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arsip | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
</head>
<body>
    <div class="container-fluid">
        <section class="vh-100">
            <div class="container py-2 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <form action="" method="post">
                                        @csrf
                                        <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                        <p class="text-white-50 mb-5">Please Fill this form!</p>
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <input type="text" id="typeUser" name="name" class="form-control form-control-lg" />
                                            <label class="form-label" for="typeUser">Name</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <input type="text" id="typeEmail" name="email" class="form-control form-control-lg" />
                                            <label class="form-label" for="typeEmail">Email</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                            <label class="form-label" for="typePasswordX">Password</label>
                                        </div>
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
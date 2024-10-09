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
                        <div class="card bg-light" style="border-radius: 1rem;">
                            <div class="card-body px-3 py-2 text-center">
                                <div class="mb-md-5 mt-md-4 pb-3">
                                    <form action="{{ route('login.post') }}" method="POST">
                                        @csrf
                                        <img src="img/logo4.png" class="img-fluid px-5 py-3 mb-4" width="70%" alt="">
                                        <div class="form-outline mb-4">
                                            <input type="text" id="typeUser" name="email" class="form-control form-control-lg" placeholder="email" required/>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" placeholder="password" required/>
                                        </div>
                                        <button class="btn btn-outline-primary btn-lg w-100" type="submit">Login</button>
                                    </form>
                                    @if (session('Gagal'))
                                        <div class="alert alert-danger mt-3" role="alert">
                                            {{ session('Gagal') }}
                                        </div>
                                    @endif
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
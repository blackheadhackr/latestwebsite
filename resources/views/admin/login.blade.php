<!DOCTYPE html>
<html lang="en">

<head>
    <title>How To Create</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        a {
            text-decoration: none;
        }

        .login-page {
            width: 100%;
            height: 100vh;
            display: inline-block;
            display: flex;
            align-items: center;
        }

        .form-right i {
            font-size: 100px;
        }
    </style>

</head>

<body>

    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    {{-- <h3 class="mb-3">Login Now</h3> --}}
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="{{route('login-sub')}}" method="POST" class="row g-4">
                                      @csrf
                                        <div class="col-12">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" class="form-control @error('username') {{'is-invalid'}}@enderror" placeholder="Enter Username" name="username">
                                            </div>
                                            <span class="text-danger">@error('username') {{$message}} @enderror</span>
                                        </div>

                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="text" class="form-control @error('password') {{'is-invalid'}}@enderror" placeholder="Enter Password" name="password">
                                            </div>
                                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                                                
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <a href="#" class="float-end text-primary">Forgot Password?</a>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-primary px-4 float-end mt-4">login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                    <i class="bi bi-currency-rupee"></i>
                                    <h2 class="fs-1">Welcome to <br> Jokespoint</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->

</body>

</html>

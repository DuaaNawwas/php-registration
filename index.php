<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styling/style.css">
</head>

<body>



    <!-- Hero -->
    <div class="container my-5">
        <div class="row p-4  pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg justify-content-around">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1">Welcome!</h1>
                <p class="lead">Would you like to join us?</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <button data-bs-target="#registrationFormModal" data-bs-toggle="modal" type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" style="background-color: #75312D; border:none;">Register</button>
                    <button data-bs-target="#loginFormModal" data-bs-toggle="modal" type="button" class="btn btn-outline-secondary btn-lg px-4">Login</button>
                </div>
            </div>
            <div class="col-lg-4   p-0 overflow-hidden">
                <img class="rounded-lg-3 w-100 " src="./images/hero.svg" alt="">
            </div>
        </div>
    </div>


    <!-- modals -->
    <div class="modal fade" id="registrationFormModal" aria-hidden="true" aria-labelledby="registrationFormLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12">
                            <div class="card text-black w-100" style="border: none">
                                <div class="card-body p-md-4">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                                                Sign up
                                            </p>

                                            <form class="mx-1 mx-md-4" id="registrationForm">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="name-registration">Full Name</label>
                                                        <div class="d-flex flex-wrap" id="flex-name">
                                                            <input type="text" name="fname" id="fname-registration" class="form-control" placeholder="First Name" />

                                                            <input type="text" name="sname" id="sname-registration" class="form-control" placeholder="Second Name" />

                                                            <input type="text" name="tname" id="tname-registration" class="form-control" placeholder="Third Name" />

                                                            <input type="text" name="lname" id="lname-registration" class="form-control" placeholder="Last Name" />
                                                            <small id="name-small"></small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="image-registration">Your Image</label>
                                                        <input type="file" name="image" id="image-registration" class="form-control" />
                                                        <small></small>
                                                    </div>
                                                </div> -->
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="email-registration">Your Email</label>
                                                        <input type="text" name="email" id="email-registration" class="form-control" />
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="phone-registration">Phone Number</label>
                                                        <input type="tel" name="phone" id="phone-registration" class="form-control" />
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="dob-registration">Date of Birth</label>
                                                        <input type="date" name="dob" id="dob-registration" class="form-control" />
                                                        <small></small>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="password-registration">Password</label>
                                                        <input name="password" type="password" id="password-registration" class="form-control" />
                                                        <small></small>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="password-confirm-registration">Repeat your password</label>
                                                        <input type="password" name="passwordConfirm" id="password-confirm-registration" class="form-control" />
                                                        <small></small>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="submit" id="registerBtn" class="btn btn-md" style="
                                  background-color: #161050 !important;
                                  color: white;
                                ">
                                                        Register
                                                    </button>
                                                </div>
                                                <p class="text-center">
                                                    Already have an account?
                                                    <a href="" data-bs-target="#loginFormModal" data-bs-toggle="modal">Login!</a>
                                                </p>
                                            </form>
                                        </div>
                                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center justify-content-around order-1 order-lg-2">
                                            <img src="./images/register.svg" class="img-fluid w-75" alt="Sample image" style="border-radius: 25px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loginFormModal" aria-hidden="true" aria-labelledby="loginFormLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12">
                            <div class="card text-black w-100" style="border: none">
                                <div class="card-body p-md-4">
                                    <div class="row justify-content-center flex-row-reverse">
                                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center justify-content-around order-1 order-lg-2">
                                            <img src="./images/login.svg" class="img-fluid w-75" alt="Sample image" style="border-radius: 25px" />
                                        </div>
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                                                Login
                                            </p>

                                            <form class="mx-1 mx-md-4" id="loginForm" method="post">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="email-login">Your Email</label>
                                                        <input type="email" name="email-login" id="emailLogin" class="form-control" />
                                                        <small></small>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="password-login">Password</label>
                                                        <input type="password" id="password-login" name="passwordLogin" class="form-control" />
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <small id="err"></small>

                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="submit" id="loginBtn" class="btn btn-md" style="
                                  background-color: #161050 !important;
                                  color: white;
                                ">
                                                        Login
                                                    </button>
                                                </div>
                                                <p class="text-center">
                                                    Not registered yet?
                                                    <a href="" data-bs-target="#registrationFormModal" data-bs-toggle="modal">Sign up!</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- js -->
    <script src="./js/app.login.js"></script>
    <script src="./js/app.register.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
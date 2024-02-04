
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Register for admin</h3>
                                </div>
                                <div class="card-body">
                                    <form id="myForm" action="check.php" method="post" onsubmit="return validateForm()">
                                        <div class="form-floating mb-3">
                                            <!-- <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" /> -->
                                            <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                                            <label for="inputAccout">username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <!-- <input class="form-control" id="inputPassword" type="password" placeholder="Password" /> -->
                                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div>
                                        <input type="submit" value="Submit">
                                        </div>

                                    </form>
                                </div>
                                <script>
                                    function validateForm() {
                                        var username = document.getElementById('username').value;
                                        var password = document.getElementById('password').value;
                                        
                                        var error = "";

                                        if (username === "") {
                                            error += "username không có data.\n";
                                        }
                                        if (password === "") {
                                            error += "password không có data.\n";
                                        }
                                        if(password.lenght < 8 || password.lenght > 16){
                                            error += "password sai định dạng từ 8 tới 16 ký tự";
                                        }
                                      
                                        if (error !== "") {
                                            alert(error);
                                            return false;
                                        }
                                        return true;
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
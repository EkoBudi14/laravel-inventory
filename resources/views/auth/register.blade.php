<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory-Management-System</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label style="font-size: 16px" for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input style="font-size: 16px" type="text" name="name" id="name" placeholder="Your Name" required=""/>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" for="email"><i class="zmdi zmdi-email"></i></label>
                                <input style="font-size: 16px" type="email" name="email" id="email" placeholder="Your Email" required=""/>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input style="font-size: 16px" type="password" name="password" id="password" placeholder="Password" required=""/>
                            </div>
                            
                            <div class="form-group">
                                <label style="font-size: 16px" for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input style="font-size: 16px" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required=""/>
                            </div>
                            <div class="form-group">
                                <label style="padding-left: 10px; padding-right: 20px;" for="email"></label>
                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                    <option>&nbsp;&nbsp;&nbsp;&nbsp; --Choose Role--</option>
                                    <option>Admin</option>
                                    <option>Employee</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input style="font-size: 16px" type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                            
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('frontend') }}/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
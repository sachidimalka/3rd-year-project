<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Learnalot</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/learners/public/css/teach-register.css">

    <!-- Main css -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        $(".work-experience").hide()
        $(".education-details").hide()
       // $("#reset").hide()
        $("#submit").hide()
        $("#back-1").hide()
        $("#next-2").hide()
        $("#back-2").hide()
        
       $("#next-1").click(function(){
           $(".main-block").hide();
           $(".work-experience").show()
           $("#next-1").hide()
           $("#next-2").show()
           //$("#reset").show()
           $("#back-1").show()
          // $("#first-name").prop('required',true);
       });
       $("#next-2").click(function(){
           $(".main-block").hide();
           $(".education-details").show()
           $(".work-experience").hide()
           $("#next-1").hide()
           $("#next-2").hide()
           $("#back-1").hide()
           //$("#reset").show()
           $("#submit").show()
           $("#back-2").show()
           $("#submit").show()
       });
        $("#back-1").click(function(){
           $(".main-block").show();
           $(".education-details").hide()
           $(".work-experience").hide()
           $("#next-1").show()
           $("#next-2").hide()
           $("#back-1").hide()
           //$("#reset").show()
           $("#submit").hide()
           $("#back-2").hide()
       });
        $("#back-2").click(function(){
           $(".main-block").hide();
           $(".education-details").hide()
           $(".work-experience").show()
           $("#next-1").hide()
           $("#next-2").show()
           $("#back-1").show()
           //$("#reset").show()
           $("#back-2").hide()
           $("#submit").hide()
       });
       
       $( "#submit" ).click(function() {
           var formData = $('#register-form').serialize();
           $.ajax({
                type: "POST",
                url: 'add-teachers',
                data: formData,
                success: function (data) {
                    
                }
            });

     
    });
});
    
    
    
    </script>
    <style>
            .main-button{
        text-align:right;
        padding:10px;
    }
    .main-button a{
       padding:10px;
    }
    </style>
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="/learners/public/images/signup.jpg" alt="">
                </div>
                <div class="signup-form">
                    <div class="row">
                    <div class="main-button">
                        <a href="{{url('/login')}}">SIGN IN</a>
                        <a href="{{url('/register-teacher')}}">SIGN UP</a>
                </div>
                    </div>
                    <form method="POST" class="register-form" id="register-form">
                        @csrf
                        <h1>Teachers registration form</h1>
                        <div class="main-block">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">First Name :</label>
                                <input type="text" name="first_name" id="first_name" required/>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name :</label>
                                <input type="text" name="last_name" id="last_name" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input type="text" name="address" id="address" required/>
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">Gender :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="male" checked>
                                <label for="male">Male</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="female">
                                <label for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="state">State :</label>
                              <!--  <div class="form-select">
                                    <select name="state" id="state">
                                        <option value=""></option>
                                        <option value="us">America</option>
                                        <option value="uk">English</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>-->
                              <input type="text" name="state" id="state" required/>
                            </div>
                            <div class="form-group">
                                <label for="city">City :</label>
                                <!--<div class="form-select">
                                    <select name="city" id="city">
                                        <option value=""></option>
                                        <option value="losangeles">Los Angeles</option>
                                        <option value="washington">Washington</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>-->
                                <input type="city" name="city" id="state" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">DOB :</label>
                            <input type="date" name="birth_date" id="birth_date">
                        </div>
                        <div class="form-group">
                            <label for="course">Course :</label>
                            <div class="form-select">
                                <select name="course" id="course">
                                    <option value=""></option>
                                    <option value="training_teacher">Training Teacher</option>
                                    <option value="lecture">Lectures</option>
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number :</label>
                            <input type="text" name="contact_number" id="contact_number">
                        </div>
                            
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email :</label>
                              <input type="email" name="email" id="email" required/>
                            </div>
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="passsword" required/>
                            </div>
                        </div>
                         </div>
                        <div class = "work-experience">
                        <h2>Experience</h2>
                         <div class="form-group">
                            <label for="period">Period:</label>
                            <input type="period" name="period" id="email4" />
                        </div>
                         <div class="form-group">
                            <label for="organization_address">Organization & Address:</label>
                            <input type="text" name="organization_address" id="organization_address" />
                        </div>
                         <div class="form-group">
                            <label for="designation">Designation:</label>
                            <input type="text" name="designation" id="designation" />
                        </div>
                         <div class="form-group">
                            <label for="personal_achievements">Personal Achievements ( if any):</label>
                            <input type="email" name="personal_achievements" id="personal_achievements" />
                        </div>
                        </div>
                        <div class = "education-details">
                        <h2>Education Details</h2>
                         <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="6" cols="60"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="certificate">Your Certificate and Document:</label>
                            <input type="file" name="certificate" id="certificate" />
                        </div>
                        </div>
                        <div class="form-submit">
                            <input type="button" value="Back" class="submit" name="back-1" id="back-1" />
                            <input type="button" value="Back" class="submit" name="back-2" id="back-2" />
                            <input type="button" value="Next" class="submit" name="next-1" id="next-1" />
                            <input type="button" value="Next" class="submit" name="next-2" id="next-2" />
                           <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <input type="button" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
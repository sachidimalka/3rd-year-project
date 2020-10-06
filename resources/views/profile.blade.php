<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Learnalot</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="/learners/public/css/style.css">
        <link rel="stylesheet" href="/learners/public/css/profile.css">
        <style>

            table {
                width:100%;
            }
            .user-details{
                padding:10px 100px;
            }
            .main-navigation{
                /* background-color:red;*/
                background: #aba7a7;
            }
            .navagation-button{
                margin-top:20px;
            }
            .profile-upload{
                margin-top:-60px;  
            }
            .profile-edit-row{
                padding:5px;

            }
            .row-data{
                width:100%; 
            }
            .profile-update{
                text-align:right;
                padding:10px;
            }
            .profile-edit-button{
                text-align:right;
            }
            .success-message{
                text-align:center;
                margin-top:10px;
                background-color:#86FCB6;
                color:black;
            }
            .error-message{
                text-align:center;
                margin-top:10px;
            }
            .main-div {
               padding: 10px 15px;
            }
        </style>
    </head>
    <body>

        <div id="colorlib-page">
            <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
            <aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">

<!--<h1 id="colorlib-logo"><a href="index.html">Sachini Learners<span></span></a></h1>-->
                <img src="/learners/public/images/logo.jpg" style="border-radius: 50%;"alt="Girl in a jacket" width="150" height="150">
                <nav id="colorlib-main-menu" class="navagation-button" role="navigation">
                    <ul>       
                        <li class="colorlib-active"><a href="{{url('/')}}">PROFILE</a></li>
					<li><a href="{{url('calendar')}}">CALENDAR</a></li>
					<li><a href="{{url('student')}}">STUDENT</a></li>
                                        <li><a href="{{url('view-attendance')}}">STUDENT ATTENDANCE</a></li>
					<li><a href="{{url('my-payment')}}">MY PYMENT</a></li>
<!--                        <li><a href="contact.html">Contact</a></li>-->
                    </ul>
                </nav>


            </aside> <!-- END COLORLIB-ASIDE -->
            <div id="colorlib-main">
                <div class="main-navigation"><div class="text-right"><a class="right" href="{{url('logout')}}" data-toggle="tooltip" title="logout"><i class="fa fa-sign-out" style="font-size:30px;color:black;"></i></a></div></div>
                
                
                <div class="main-div">
                <div class="hero-wrap js-fullheight" style="background-image: url(/learners/public/images/cover.jpg);" data-stellar-background-ratio="0.5">
                    <div class="overlay"></div>
                    <div class="js-fullheight d-flex justify-content-center align-items-center">
                        <div class="col-md-8 text text-center">


                            <div class="img mb-4" style="background-image: url(/learners/public/images/img_avatar.png);"></div>

                            <div class="desc">
                                <!--<h2 class="subheading">Hello I'm</h2>-->
                                <h2 class="mb-4">{{$data['name']}} {{$data['last_name']}}</h2>
                                <div class="profile-main-block">
                                    <input type="submit" name="profile-change-btn" id="profile-change-btn" class="fa fa-camera upload-button" value="Change Profile">
                                </div>
                                <div class="profile-edit">
                                    <form id="profile-upload" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                        <input name="profile-image" type="file" id="profile-image">
                                        <input type="text" id="check-image" name="check-image">
                                        <input  type="submit" value="Save" id="profile-upload-btn"/>
                                    </form>
                                    
                                    <!--<p><a href="#" class="btn-custom">More About Me <span class="ion-ios-arrow-forward"></span></a></p>-->
                                </div>
                                    <p class="mb-4">{{$data['description']}}</p>

                            </div>
                        </div>


                    </div>

                </div>
                
                <div class="success-message"></div>
                <div class="error-message"></div>

                <div class="user-details">
                    <div class="profile-info">

                        <div class="text-right"><a href="#" data-toggle="tooltip" title="Edit Profile" name="edit-button" id ="edit-button"><i class="fa fa-pencil-square-o" style="font-size:30px;color:black;"></i></a></div>
                        <table width:"100%">

                               <tr>
                                <td>First Name</td>
                                <td>{{ $data['name']}}</td>

                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{ $data['last_name']}}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>{{ $data['email']}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $data['address']}}</td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>{{ $data['state']}}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{ $data['city']}}</td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td>{{ $data['contact_number']}}</td>
                            </tr>
                            <tr>
                                <td>Birth Date</td>
                                <td>{{ $data['birth_date']}}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td>{{ $data['designation']}}</td>
                            </tr>
                            <tr>
                                <td>Organization Address</td>
                                <td>{{ $data['organization_address']}}</td>
                            </tr>
                            <tr>
                                <td>Experience Period</td>
                                <td>{{ $data['experience_period']}}</td>
                            </tr>

                        </table> 
                    </div>                       
                    <div class="edit"> 
                        <form id="register-update-form">
                            @csrf
                            <table width:"100%">
                                   <input type="hidden" id="hidden_id" name="hidden_id" value="{{ $data['id']}}">
                                <tr >
                                    <td class="profile-edit-row">First Name</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['name']}}" id="first_name" name="first_name" class="row-data"></td>

                                </tr>
                                <tr>
                                    <td class="profile-edit-row">Last Name</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['last_name']}}" id="last_name" name="last_name" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">Email Address</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['email']}}" id="email" name="email" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">Address</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['address']}}" id="address" name="address" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">State</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['state']}}" id="state" name="state" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">City</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['city']}}" id="city" name="city" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">Contact Number</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['contact_number']}}" id="contact_number" name="contact_number" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">Birth Date</td>
                                    <td class="profile-edit-row"><input type="date" value="{{ $data['birth_date']}}" id="birth_date" name="birth_date" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">Designation</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['designation']}}" id="designation" name="designation" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">Organization Address</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['organization_address']}}" id="organization_address" name="organization_address" class="row-data"></td>
                                </tr>
                                <tr>
                                    <td class="profile-edit-row">Experience Period</td>
                                    <td class="profile-edit-row"><input type="text" value="{{ $data['experience_period']}}" id="experience_period" name="experience_period" class="row-data"></td>
                                </tr>

                            </table> 
                            <div class="profile-update">
                                <input type="submit" name="submit" id="submit" value="Update">
                            </div>
                        </form>                   

                    </div>
                </div>
                </div>
            </div>


            <!-- END COLORLIB-MAIN -->
        </div><!-- END COLORLIB-PAGE -->

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="/learners/public/js/main/jquery.min.js"></script>
        <script src="/learners/public/js/main/jquery-migrate-3.0.1.min.js"></script>
        <script src="/learners/public/js/mainpopper.min.js"></script>
        <script src="/learners/public/js/main/bootstrap.min.js"></script>
        <script src="/learners/public/js/main/jquery.stellar.min.js"></script>
        <script src="/learners/public/js/main/aos.js"></script>
        <script src="/learners/public/js/main/main.js"></script>
        <script src="/learners/public/js/profile.js"></script>

    </body>
    <script>
        $(document).ready(function () {
            $(".edit").hide()
            $(".profile-edit").hide()
            $(document).on("click", "a[name = 'edit-button']", function () {
                event.preventDefault()
                $(".edit").show()
                $(".profile-info").hide()
            });

            $("#submit").click(function () {
                event.preventDefault()
                var formData = $('#register-update-form').serialize();
                $.ajax({
                    type: "POST",
                    url: 'update-profile',
                    data: formData,
                    success: function (data) {
                           data = JSON.parse(data);
                           if(data['success']){
                               $(".success-message").html(data['message']);
                           }else{
                               $(".error-message").html(data['message']);
                           }
                           setTimeout(function () {
                        window.location.reload(true);
                    }, 1000);
                    }
                });


            });
            
            $("#profile-change-btn").click(function () {
                $(".profile-edit").show()
                $(".profile-main-block").hide()

            });
            $('#profile-upload-btn').click(function () {
                event.preventDefault()
                var form = $('form')[0]; 
              var formData = new FormData(form);     
              formData.append('tax_file', $('input[type=file]')[0].files[0]);

               //formData.append('image_file', $('input[type=file]')[0].files[0]);
                //var formData = $('#profile-upload').serializeArray();
               
                //var profile_image = $('#profile-image').val();
                //formData.push({name: 'image_path', value:profile_image}); 
                // console.log(formData);
                //
               // formData['profile_image'] = profile_image
                //formData.append('fileName', $('#profile-image')[0].files[0]);
                console.log(formData)
                $.ajax({
                    type: "POST",
                    url: 'upload-profile',
                    data: formData,
                    success: function (data) {
                           data = JSON.parse(data);
                           if(data['success']){
                               $(".success-message").html(data['message']);
                           }else{
                               $(".error-message").html(data['message']);
                           }
                           setTimeout(function () {
                        window.location.reload(true);
                    }, 1000);
                    }
                });


            });
        });
    </script>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Learnalot</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/learners/public/css/calendar/evo-calendar.css"/>
        <link rel="stylesheet" type="text/css" href="/learners/public/css/calendar/evo-calendar.midnight-blue.css"/>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

        <link rel="stylesheet" href="/learners/public/css/style.css">
        <style>

            .add-event{
                text-align:left;
                padding:15px 0px;
            }
            .add-event button{
                padding:0px 20px;
            }
            .form-row{
                width:100%;
            }
            .table-row{
                width:100%;
            }
            .add-event-form{
                padding:50px 18px;
                border: 5px solid;
            }
            .add-block{
                padding: 40px 15px;
            }
            .event-save-block{
                text-align:right;
                padding:5px;
            }
            .table-row-select{
                width:100%;
                padding:6px;
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
        </style>
    </head>
    <body>

        <div id="colorlib-page">
            <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
            <aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
                <img src="/learners/public/images/logo.jpg" style="border-radius: 50%;"alt="Girl in a jacket" width="150" height="150">
                <nav id="colorlib-main-menu" class="navagation-button" role="navigation">
                    <ul>                  
                                        <li><a href="{{url('/')}}">PROFILE</a></li>
					<li class="colorlib-active"><a href="{{url('calendar')}}">CALENDAR</a></li>
					<li><a href="{{url('student')}}">STUDENT</a></li>
                                        <li><a href="{{url('view-attendance')}}">STUDENT ATTENDANCE</a></li>
					<li><a href="{{url('my-payment')}}">MY PYMENT</a></li>
<!--                        <li><a href="contact.html">Contact</a></li>-->
                    </ul>
                </nav>


            </aside> <!-- END COLORLIB-ASIDE -->
            <div id="colorlib-main">
                <div class="main-navigation"><div class="text-right"><a class="right" href="{{url('logout')}}" data-toggle="tooltip" title="logout"><i class="fa fa-sign-out" style="font-size:30px;color:black;"></i></a></div></div>
                <div style="padding:40px 15px;">
                    <div class="main-calendar">
                    <div class="add-event">
                            <button type="button" id="view-event">View Event</button>
                            <button type="button" id="add-event">Add Event</button>
                    </div>
                        <div id="calendar"></div>
                    </div>
                <div class="view-table">
                  <div class="add-event">
                            <button type="button" id="view-calendar">Calendar</button>
                            <button type="button" id="add-event-2">Add Event</button>
                    </div>
                 <table class="table table-striped table-bordered table-hover" id="emp_list">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event Name</th>
                        <th>Student Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                    </div>
                
                <div class="event-form">
                
                <div class="add-block">
                    <div class="add-event">
                <button type="button" id="view-calendar-2">Calendar</button>
                <button type="button" id="view-event-2">view Event</button>
                </div>
                    <div class="success-message"></div>
                    <div class="error-message"></div>
                    
                <div class="add-event-form">
                        
                        <form id="add-event-form">
                            @csrf
                            <table width="100">
                                <tr class="main-row">
                                    <td><label for="event-name">Event Name</label></td>
                                    <td><input type="text" name="event-name" id="event-name" class="table-row"></td>
                                </tr>
                                <tr class="main-row">
                                    <td><label for="event-type">Event Type</label></td>
                                    <td><select  class="table-row-select" name="event-type">
                                        <option value="Select Group" selected="true" disabled="disabled">Select Type</option>
                                        <option value="birthday">Assignment</option>
                                        <option value="holiday">Class Date</option>
                                    </select></td>
                                </tr>
                                <tr class="main-row">
                                    <td><label for="group">Student Group</label></td>
                                    <td><select name="group" id="group" class="table-row-select">
                                        <option value="Select Group" selected="true" disabled="disabled">Select Group</option>
                                        <option value="a2f9a33d84054361b2368602ca9bf9b7">Group A</option>
                                        <option value="ssd2f9a33d84054361b2368602ca9bf9s">Group B</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td><label for="event-date">Event Date</label></td>
                                    <td><input type="date" name="event-date" id="event-date" class="table-row"></td>
                                </tr>
                            </table>
                           <div class="event-save-block"> <input type="button" id="event-save" value="Save"/></div>
                        </form>
                    </div>
                    </div>
                    </div>
                <section class="ftco-section">
                    <div class="container">
                    </div>
                </section>

            </div><!-- END COLORLIB-MAIN -->
        </div><!-- END COLORLIB-PAGE -->

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="/learners/public/js/main/jquery.min.js"></script>
        <script src="/learners/public/js/main/jquery-migrate-3.0.1.min.js"></script>
        <script src="/learners/public/js/mainpopper.min.js"></script>
        <script src="/learners/public/js/main/bootstrap.min.js"></script>
       <!-- <script src="js/jquery.easing.1.3.js"></script>-->
       <!--<script src="js/jquery.waypoints.min.js"></script>-->
        <script src="/learners/public/js/main/jquery.stellar.min.js"></script>
        <!--<script src="js/owl.carousel.min.js"></script>-->
        <!--<script src="js/jquery.magnific-popup.min.js"></script>-->
        <script src="/learners/public/js/main/aos.js"></script>
        <!--<script src="js/jquery.animateNumber.min.js"></script>-->
        <!--<script src="js/bootstrap-datepicker.js"></script>-->
        <!--<script src="js/jquery.timepicker.min.js"></script>-->
        <!--<script src="js/scrollax.min.js"></script>-->
        <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>-->
        <!--<script src="js/google-map.js"></script>-->
        <script src="/learners/public/js/main/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="/learners/public/js/calendar/evo-calendar.js"></script>
        <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
            //$("#calendar").evoCalendar();
            

            $(document).ready(function () {
                $(".view-table").hide()
                $.ajax({
                    type: "POST",
                    url: 'get-event',
                    data: {_token:     '{{ csrf_token() }}'},
                    success: function (data) {
                         data = JSON.parse(data);
                        if(data['success']){
                               $("#calendar").evoCalendar({
                                 calendarEvents: data['data']
            });
                           }else{
                               var event_data =  []
                           }
                   
                    }
                });
            
                
                
                
                $(".event-form").hide()
                $("#add-event, #add-event-2").click(function () {
                    $(".view-table").hide()
                    $(".event-form").show()
                    $(".main-calendar").hide()
                });
                 $("#view-calendar, #view-calendar-2").click(function () {
                     $(".view-table").hide()
                     $(".main-calendar").show()
                     $(".event-form").hide()
                 });
                
                $("#view-event, #view-event-2").click(function () {
                    $(".view-table").show()
                    $('#emp_list').DataTable();
                    $(".main-calendar").hide()
                    $(".event-form").hide()
                    $.ajax({
                    type: "POST",
                    url: 'get-event-list',
                    data: {_token:     '{{ csrf_token() }}'},
                    success: function (data) {
                         data = JSON.parse(data);
                        if(data['success']){
                            var tBody= '';
                               $.each(data['data'], function( index, value ) {
                                    tBody = tBody + "<tr><td>"+value['date']+"</td><td>"+value['name']+"</td><td>"+ value['group_name'] +"</td><td><a>Edit</a> <a>Delete</a></td></tr>";                    
                               });
                               $('#emp_list tbody').html(tBody);
                               console.log(tBody)
                           }else{
                               var event_data =  []
                           }
                   
                    }
                });
                });
                
                $("#event-save").click(function () {
                event.preventDefault()
                var formData = $('#add-event-form').serialize();
                console.log(formData)
                $.ajax({
                    type: "POST",
                    url: 'add-event',
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
              $(function() {
   
 });
        </script>

    </body>
</html>
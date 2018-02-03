<!DOCTYPE HTML>
<html>
   <head>
      <link rel="shortcut icon" href="precis.png">
      <title>Group Study - Place to get together for studies</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="online symmary, text summarization tool, automatic text summary, text mining, text summarizer, text summary, auto summarizer, automatic text summarizer, free summarizer, summarize text, summary generator, text summary, online text summarization, summarizer, summary, summarize, article summarizer, ariticle summarization">
      <meta name="description" content="Library Course Group Study - It is a simple tool to create groups and join groups for knowledge sharing.">
      <link rel="stylesheet" href="//yui.yahooapis.com/pure/0.5.0/pure-min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
      <script src="js/skel.min.js"></script>
      <script src="js/skel-panels.min.js"></script>
      <script src="js/init.js"></script>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script>
         (
         function(i,s,o,g,r,a,m)
         {i['GoogleAnalyticsObject']=r;i[r]=i[r]||
            
            function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
         
         ga('create', 'UA-46290758-1', 'autosummarizer.com');
         ga('send', 'pageview');
         
      </script>
      <script>
        function myFunction() {
            document.getElementById("error").style.visibility = "hidden";
           document.getElementById("loading").style.visibility = "visible";
            $.ajax({
               type: "GET",
               url: "https://shrouded-fjord-25701.herokuapp.com/getGroups",
               contentType: 'application/json; charset=UTF-8',
               success: function(data) {
                   //show content
                   alert(data);
                   // objes = JSON.parse(data)
                   // rows = "<div id='events'><input class='search form-control' placeholder='Search for...'/><table class='table'><thead><tr><th><b>Index</b></th><th><b>Group Id</b></th><th><b>Host Name</b></th><th><b>Course</b></th></tr></thead>";
                   // var i = 1;
                   // for (var group in objes) {
                   //    rows += "<tr><td class='index'><b>" + i + "</b></td><td class='group_id'>" + objes[group].group_id + "</td><td class='latitude'>" + objes[event].lat + "</td><td class='longitude'>" + objes[event].lon + "</td><td class='time'>" + objes[event].time + "</td></tr>";
                   //    i = i + 1;
                   // }
                   // rows += "</tbody></table></div>"
                  //  document.getElementById('position').innerHTML = rows;
                  //  $( "#position" ).show( "slow", function() {
                     
                  // });
                  //  var options = {
                  //     valueNames: [ 'index', 'event_id', 'latitude', 'longitude', 'time' ]
                  //   };
                  //   var userList = new List('events', options);
                  //  document.getElementById("loading").style.visibility = "hidden";
                   return true;
               },
               error: function(xhr, textStatus, err) {
                   document.getElementById("loading").style.visibility = "hidden";
                   document.getElementById("error").style.visibility = "visible";
                   return true;
               }
            });
            return false;
        }
    </script>
      <style>
         .beta
         {
         position:absolute;
         left:2px;
         top:17px;
         z-index:9999;
         }
      </style>
      <div class="beta">
         <a href="index.php">
            <img src="precis.png" alt="automaitc text summarizer beta version" height="65" width="80">
         </a>
      </div>
      <style>
         #reli {
         height:15px;
         width:100%;
         color:black;
         }
         .black-background {background-color:#000000;}
         .white {color:#ffffff;}
      </style>
      <div id="reli">
      </div>
   </head>
   <body class="homepage" onload="return myFunction();">
      <!-- Header -->
      <!-- Featured -->
      <div id="featured">
         <div class="container">
            <header>
               <a href="index.php">
                  <h2 style="color:black;">Group Study</h2>
               </a>
               <h3>Manages groups for anyone to join and study in groups.</h3>
            </header>
            <form onsubmit="return myFunction();" method='POST' action='index.php'>
               <style>
                  textarea#styled {
                  width: 60%;
                  height: 170px;
                  padding: -25px;
                  font-family: Tahoma, sans-serif;
                  }
               </style>
                 <div class="form-group row">
                 </div>
                 <div class="form-group row">
                   <label for="email" class="col-sm-2 col-form-label">Email</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="email">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="uin" class="col-sm-2 col-form-label">UIN</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="uin">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="course" class="col-sm-2 col-form-label">Course Code</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="course">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="startTime" class="col-sm-2 col-form-label">Start Time</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="startTime">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="endTime" class="col-sm-2 col-form-label">End Time</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="endTime">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="endTime" class="col-sm-2 col-form-label">Group Size</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="groupSize">
                   </div>
                 </div>
               <br>
               <br>
               <input type='submit' class="button1" id='smm2' name='submit' value='Create Group'>
         </div>
         </form>
         <style>
            #position {
            width:60%;
            margin:0 auto;
            padding-top: 25px;
            }
         </style>
         <script></script>
         <script>
            $( "#smm" ).click(function() {
               $( "#position" ).hide( "slow", function() {
                  
               });
            });
         </script>
         <br/>
         <br/>
         <div id="loading" style="visibility:hidden;">
            <img src="ajax-loader.gif" style="width:25% ">
            </img>
         </div>
         <div id="title">
            
         </div>
         <div id="position">
         </div>
         <div id="error" class="alert alert-danger" role="alert" style="visibility:hidden; width: 50%; margin: auto;">
            Oh snap! Change a few things up and try submitting again.
         </div>
         <br>
         <br>
         <style>
            #kauu {
            font-size: 10px;
            width: 728px; 
            height:90px;
            text-align:left;
            }
         </style>
         <center>
         <p></p>
         <hr />
         <div class="row">
            <section class="4u">
               <span class="pennant"><span class="fa fa-globe"></span></span>
               <h3>Precis</h3>
               <p>Summarize your articles, splitting the most important sentences and ranking a sentence based on importance.</p>
               <a href="https://github.com/shubham7jain/precis" class="button button-style1">Read More</a>
            </section>
            <section class="4u">
               <span class="pennant"><span class="fa fa-lock"></span></span>
               <h3>API</h3>
               <p>This tool is accessible by an API, integrate our api to generate summaries for a given text on your website or application.</p>
               <a href="" target="_blank" class="button button-style1">Read More</a>
            </section>
            <section class="4u">
               <span class="pennant"><span class="fa fa-globe"></span></span>
               <h3>The Algorithm</h3>
               <p>A specific algorithm for extracting the most important points of the original document, using extraction based summarization. </p>
               <a href="https://github.com/shubham7jain/precis" class="button button-style1">Read More</a>
            </section>
         </div>
      </div>
      </div>
      <!-- Footer -->
      <div id="footer">
         <div class="container">
            <section>
               <ul class="contact">
                  <li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
                  <li class="active"><a href="https://www.facebook.com/profile.php?id=100000140862582" class="fa fa-facebook"  target="_blank"><span>Facebook</span></a></li>
               </ul>
            </section>
         </div>
      </div>
      <!-- Copyright -->
      <div id="copyright">
         <div class="container">
            © All Copyrights Reserved by <a href="http://precis.com">precis.com</a>, College Station, 77840, Contact us: <a href="mailto:precis@tamu.edu">precis@tamu.edu</a>
         </div>
      </div>
   </body>
</html>
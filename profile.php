<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Profile</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
      
      <style>
      
          .container{
              margin-top:120px;
          }
          #notePad ,#allNotes, #done{
              display: none;
          }
          .buttons{
              margin-bottom:20px;
          }
          textarea{
              width:100%;
              border-radius: 3%;
              max-width: 100%;
              font-size: 16px;
              background-color: #FBEFFF;
          }
          tr{
              cursor: pointer;
          }
      </style>

  </head>
  <body>


  <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">

    <div class = "container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">Online Notes</a>
          <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
              <span class="sr-only">Toggle nabigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
      </div>

      <div class="navbar-collapse collapse" id="navbarCollapse">

          <ul class="nav navbar-nav">
          
              <li >
                <a href="#">Profile</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Contact us</a>
              </li>
              <li class="active">
                <a href="#">My Notes</a>
              </li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#">Logged in as <b>username</b></a>
              </li>
              <li>
                <a href="#">Logout</a>
              </li>
          </ul>

      </div>
    </div>
  </nav>
      
      <!--container-->
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <h2>General Account Settings:</h2>
            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered" style="color:#483d8b">
                    <tr data-target="#updateusername" data-toggle="modal">
                        <td>
                        Username
                        </td>
                        <td>
                        Value
                        </td>
                    </tr>
                    <tr data-target="#updateemail" data-toggle="modal">
                        <td>
                        Email
                        </td>
                        <td>
                        Value
                        </td>
                    </tr>
                    <tr data-target="#updatepassword" data-toggle="modal">
                        <td>
                        Password
                        </td>
                        <td>
                        Hidden
                        </td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
    
    <!--update username-->
    <form method="post" id="updateusernameform">
        <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal">
                        &times;
                      </button>
                      <h4 id="myModalLabel" style="color: black">
                        Edit username:
                      </h4>
                  </div>
                  <div class="modal-body" style="margin-bottom:10px;">

                      <!--login message message from PHP file-->
                      <div id="loginmessage"></div>

                      <div class="form-group">
                          <label for="loginemail" >Username:</label>
                          <input class="form-control" type="text" name="username" id="username" maxlength="30" value="username value">
                      </div>
                      
                  </div>
                  
                 
                  <div class="modal-footer">
                      <input class="btn green" name="updateusername" type="submit" value="submit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Cancel
                    </button>
                      
                  </div>
              </div>
          </div>
          </div>
    </form>
    
      <!--update email-->
    <form method="post" id="updateemailform">
        <div class="modal" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal">
                        &times;
                      </button>
                      <h4 id="myModalLabel" style="color: black">
                        Enter new Email:
                      </h4>
                  </div>
                  <div class="modal-body" style="margin-bottom:10px;">

                      <!--login message message from PHP file-->
                      <div id="loginmessage"></div>

                      <div class="form-group">
                          <label for="loginemail" >Email</label>
                          <input class="form-control" type="email" name="email" id="email" maxlength="50" value="email value">
                      </div>
                      
                  </div>
                  
                 
                  <div class="modal-footer">
                      <input class="btn green" name="updateusername" type="submit" value="submit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Cancel
                    </button>
                      
                  </div>
              </div>
          </div>
          </div>
    </form>
      
      <!--update password-->
    <form method="post" id="updatepasswordform">
        <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal">
                        &times;
                      </button>
                      <h4 id="myModalLabel" style="color: black">
                        Enter current and new password:
                      </h4>
                  </div>
                  <div class="modal-body" style="margin-bottom:10px;">

                      <!--login message message from PHP file-->
                      <div id="loginmessage"></div>

                      <div class="form-group">
                          <label for="currentpassword" class="sr-only">Your current Password:</label>
                          <input class="form-control" type="password" name="currentpassword" id="currentpassword" maxlength="30" placeholder="Your Current Password">
                      </div>
                      <div class="form-group">
                          <label for="password" class="sr-only">Choose a password:</label>
                          <input class="form-control" type="password" name="password" id="password" maxlength="30" placeholder="Choose a password">
                      </div>
                      <div class="form-group">
                          <label for="password2" class="sr-only">Confirm Password:</label>
                          <input class="form-control" type="password" name="password2" id="password2" maxlength="30" placeholder="Confirm  Password">
                      </div>
                      
                  </div>
                  
                 
                  <div class="modal-footer">
                      <input class="btn green" name="updateusername" type="submit" value="submit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Cancel
                    </button>
                      
                  </div>
              </div>
          </div>
          </div>
    </form>
    
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
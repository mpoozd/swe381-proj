
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">    
    <link href="<?base_url()?>/assets/css/home.css"  rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
    <script src="<?base_url()?>/assets/js.js" ></script>
</head>
<script> 

function search_user(){
  var val = document.getElementById('search').value;
  if(val != '')
  window.location.href = "/search/search/" + val;
}
</script>
<body>

<nav class="navbar navbar-default" >
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Social network</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/home">Home</a></li>
          <li><a href="/profile">Profile</a></li>
          <li><a href="/requests">Friend Requests</a></li>
          <li><a href="/posts">Posts</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" id="search" class="form-control" placeholder="Search">
          </div>
          <button type="button" onclick="search_user()" class="btn btn-default">Submit</button>
        </form>
        
    
        <ul class="nav navbar-nav navbar-right">
          
    <!--       <li id="signupLI"><a href="/signup">Sign up</a></li>
              
        -->
          <li id="signinLI"><a href="/login">Logout</a></li> 
          
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
<script>
  function hideWhenLogin(){
    if()
    
    
  }
  </script>
</body>

</html>
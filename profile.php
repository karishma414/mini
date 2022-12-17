<?php
require('top.inc.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <style type="text/css">
    .profile-pic-div{
    height: 200px;
    width: 200px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    border-radius: 50%;
    overflow: hidden;
    border: 1px solid grey;
}

#photo{
    height: 100%;
    width: 100%;
}

#file{
    display: none;
}

#uploadBtn{
    height: 40px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    color: wheat;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 15px;
    cursor: pointer;
    display: none;
}
  </style>
</head>
<body>
  <h1 style="text-align:center;">My Profile</h1>
    
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-sm-8 p-3 text-center">
      <div class="profile-pic-div">
        <img src="profile.jpg" id="photo">
        <input type="file" id="file">
        <label for="file" id="uploadBtn">Choose Profile</label>
      </div>
    </div>
   <div class="col-sm-4 p-3  ">
      <table class="table table-bordered table-striped text-center">
    
          <tbody>
            <?php
         $uid=$_SESSION['USER_ID'];
          $query = "SELECT * FROM users where id='$uid'";
          $result = mysqli_query($con,$query);
            while($rows = mysqli_fetch_assoc($result)){
                
              ?>
          
          <form _ngcontent-c7="" class="form-horizontal ng-untouched ng-pristine ng-valid" novalidate="">
                <div _ngcontent-c7="" class="section-block section-block--compact">
                  <div _ngcontent-c7="" class="form-group bottom-border">
                    <div _ngcontent-c7="" class="row">
                      <div _ngcontent-c7="" class="col-sm-3">
                        <label _ngcontent-c7="" for="boid"> Name</label>
                      </div>
                      <div _ngcontent-c7="" class="col-sm-7">
                        <div _ngcontent-c7="" class="input-group">
                          <label _ngcontent-c7=""><?php echo $rows['username'];?></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div _ngcontent-c7="" class="form-group bottom-border">
                    <div _ngcontent-c7="" class="row">
                      <div _ngcontent-c7="" class="col-sm-3 ">
                        <label _ngcontent-c7="" for="boid">Mobile</label>
                      </div>
                      <div _ngcontent-c7="" class="col-sm-9">
                        <div _ngcontent-c7="" class="input-group">
                          <label _ngcontent-c7=""><?php echo $rows['mobile'];?></label>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <div _ngcontent-c7="" class="form-group bottom-border">
                    <div _ngcontent-c7="" class="row">
                      <div _ngcontent-c7="" class="col-sm-3">
                        <label _ngcontent-c7="" for="boid">Email</label>
                      </div>
                      <div _ngcontent-c7="" class="col-sm-9">
                        <div _ngcontent-c7="" class="input-group">
                          <label _ngcontent-c7=""><?php echo $rows['email'];?></label>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div _ngcontent-c7="" class="form-group bottom-border">
                    <div _ngcontent-c7="" class="row">
                      <div _ngcontent-c7="" class="col-sm-3">
                        <label _ngcontent-c7="" for="boid">Registered on</label>
                      </div>
                      <div _ngcontent-c7="" class="col-sm-9">
                        <div _ngcontent-c7="" class="input-group">
                          <label _ngcontent-c7=""><?php echo $rows['added_on'];?></label>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <div _ngcontent-c7="" class="form-group bottom-border">
                    <div _ngcontent-c7="" class="row">
                      <div _ngcontent-c7="" class="col-sm-3">
                        <label _ngcontent-c7="" for="boid">Status</label>
                      </div>
                      <div _ngcontent-c7="" class="col-sm-9">
                        <div _ngcontent-c7="" class="input-group">
                          <label _ngcontent-c7=""><?php echo $rows['status'];?></label>
                        </div>
                      </div>
                    </div>
                  </div>
        
                </div>
              </form>
        <?php } ?>
      </tbody>
    </table>
      </div>
      
      </div>
      </div>

      <script src="app.js"></script>
   
</body>
</html>
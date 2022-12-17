<?php
require('top.inc.php');

?>
<div class="container bg-light my-5">
    <!-- <div class="title">Register</div> -->
    <form action="log.php" method="post">
        <div class="user-detail d-block">
            <div>
                <?php
                if(isset($_SESSION['msg'])){
                    ?>
                       <p class="bg-success text-while px-4"><?php $_SESSION['msg'] ;?></p>
                    <?php
                    echo  $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                
                
            </div>
        
            <div class="input-box">
                <span class="details">E-mail</span>
                <input type="email" placeholder="Enter your email" style="width:350px;"  name="email" required>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" placeholder="Enter your password"  style="width:350px;" required>
         
        </div>
            <button type="submit" class="btn1" name="submit" value="login">login</button>
      <hr>
        <p class="or">OR</p>
        <button class="btn1"><a href="admin/login.php" class="link">login as admin</a></button>
        <p  class="text-center">You forget your password no worry? <a href="recover_email.php">Click here<a></p>
        <p class="text-center">  Do you have account? <a href="register.php">Sign Up<a></p>
           
    </div>
    </form>
</div>
    <?php
    require('footer.php');

    ?>
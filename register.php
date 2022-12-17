<?php
require('top.inc.php');
?>
<section class="reg my-5">
    <div class="container">
        <div class="registra bg-light">
        <!-- <div class="title">Register</div> -->
        <form action="reg.php" method="post" onsubmit="return myfun()">
            <div class="user-detail">
                <div class="input-box">
                    <span class="details">Full Name*</span>
                    <input type="text" placeholder="Enter your name" name="username" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone number</span>
                    <input type="number" name="mobile" id="mobilenum" placeholder="Enter your phone number" id="password" required>
                    <span><?php if(!empty($_SESSION['error'])){
                        echo $_SESSION['error'];
                    }?></span>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="cpassword" placeholder="Enter your password" class="widthp">
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <input type="radio" name="gender" id="dot-3">
                 <span class="gender-title">gender</span>
                 <div class="category">
                     <label for="dot-1">
                         <span class="dot one"></span>
                         <span class="gender">Male</span>

                     </label>
                     <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                     </label>
                    </label><label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Prefer not to say</span>
                    </label>
                 </div>
            </div>
            <div class="button" >
                <input type="submit"  name="submit" value="Register">
            </div>
        </form>
    </div>
</div>
     </section>
    <?php
    require('footer.php');
  ?>

<?php
require('top.inc.php');
// $cat_id=mysqli_real_escape_string($con,$_GET['id']);
// $get_product=get_product($con,"",$cat_id);
?>
 
 <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Tarkari Bazaar has been providing the best products available & delivering at your door-step. Get your supply of vegetables, fruits, meat products, dairy, sprouts .
                Buy farm fresh fruits and vegetables online at the best prices. Order your favourite fruits and vegetables at bigbasket.
            </p>

        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>Sanepa ,Lalitpur</p>
                        </div>
                    
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-phone-alt"></i> </div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>9876543210</p>
                        </div>
                   
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>tarkaribazaar@gmail.com</p>
                        </div>
                </div>
                
            </div>
            <div class="contactForm">
                <form action="include.php" method="post">
                    <h2>Send message</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required="required" >
                        <span>Full name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea required="required"  name="mobile"></textarea>
                        <span>Mobile Number</span>
                    </div>
                    <div class="inputBox">
                        <textarea required="required" name="comment" ></textarea>
                        <span>Type your message....</span>
                    </div>
                    <div class="inputBox">
                        <button type="submit" name="submit" value="submit">Send
</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <?php
    require('footer.php');

    ?>
   
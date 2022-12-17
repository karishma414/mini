  <!--Footer start-->
  <footer class="footer">
        <div class="l-footer">
          <div class="col-md-4 col-12 img-top-left">
            <img src="./veggies/onlinelogomaker-041921-1211-0605-500.jpg" alt="Logo">
        </div>
      <p >The Tarkari Bazaar enables customers to set buy vegetables, customers to 
        browse through the vegetables as well as their respective prices, and a system
         administrator approves requests for new customers  and maintain lists of shop categories.
          Also on the agenda is designing an online shopping site to manage the items in the shop and
           also help customers purchase them online without having to visit the shop physically. 
        </p>
      </div>
        <ul class="r-footer">
          <li>
            <h2>Social</h2>
            <div class="box h-box" style="font-size:20px" >
          <a href="https://www.facebook.com/">Facebook</a><br>
          <a href="https://twitter.com/">Twitter</a><br>
        
        </li>
        <div>
        <li class="features">
          <h2>
        Information</h2>
        <ul class="box h-box" style="font-size:20px;">
        <li><a href="#">Blog</a></li>
        <li><a href="aboutUs.php">About Us</a></li>
        </ul>
        </li>
       
        </ul>
        <div class="b-footer">
        <p>
        All rights reserved by ©TarkariBazaar 2021 </p>
        </div>
    
    </footer>
    <!--Footer end-->

    <!--Increment and decrment-->
    <script>
      var incrementButton = document.getElementsByClassName('inc');
      var decrementButton = document.getElementsByClassName('dec');
      //console.log(incrementButton);
      //console.log(decrementButton);
      //increment
      for(var i= 0 ; i< incrementButton.length ; i++)
      {
        var button = incrementButton[i];
        button.addEventListener('click',function(event){
          var buttonClicked = event.target;
          //console.log(buttonClicked);
          var input = buttonClicked.parentElement.children[2];
          //console.log(input);
          var inputValue = input.value;
          //console.log(inputValue);
          var newValue = parseInt(inputValue) + 1;
          //console.log(newValue);
          
          if(newValue <= 5){
            input.value = newValue;
          }
          else{
            //input.value = newValue;
            alert('qty cannot be more than 5')
          }
          
        })
      }
        //decrement
        for(var i=0 ; i< decrementButton.length ; i++)
      {
        var button = decrementButton[i];
        button.addEventListener('click',function(event){
          var buttonClicked = event.target;
          //console.log(buttonClicked);
          var input = buttonClicked.parentElement.children[2];
          //console.log(input);
          var inputValue = input.value;
          //console.log(inputValue);
          
          var newValue = parseInt(inputValue) - 1;
          //console.log(newValue);
          if(newValue >= 0.5){
            input.value = newValue;
          }
          else{
            input.value=0.5;
            //alert('qty cannot be less than zero')
          }
        })

      }
      
    </script>
    <!--increment and decrment ends-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  

</body>
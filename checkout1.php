<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $society = mysqli_real_escape_string($conn, $_POST['society']);
   $service = mysqli_real_escape_string($conn, $_POST['service']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $city = mysqli_real_escape_string($conn, $_POST['city']);
   $state = mysqli_real_escape_string($conn, $_POST['state']);
   $country= mysqli_real_escape_string($conn, $_POST['country']);
   $Amount = mysqli_real_escape_string($conn, $_POST['Amount']);
   
   $placed_on = date('d-M-Y');

  

   $select_users = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number ='$number' AND email ='$email' AND society = '$society' AND service = '$service' AND method = '$method' AND address = '$address' AND city = '$city' AND state = '$state' AND country = '$country' AND Amount = '$Amount'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0)
      {
        $message[] = 'order already exist!';
      }
      else{
         mysqli_query($conn, "INSERT INTO `orders`(name, number, email, society, service, method, address, city, state, country, Amount, placed_on ) VALUES('$name','$number','$email','$society','$service','$method','$address','$city','$state','$country','$Amount','$placed_on')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:orders.php');
      }
     
   
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   


<div class="heading">
   <h3>Payment Process</h3>
   <p> <a href="home.php">home</a></p>
</div>

<section class="checkout">
   <form action="" method="post">
      <h3>Enter Details Properly</h3>
      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" required placeholder="enter your name">
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" required placeholder="enter your number">
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" required placeholder="enter your email">
         </div>
         <div class="inputBox">
            <span>Select society Name:</span>
            <select name="society">
               <option value="Ramnager">Ramnager</option>
               <option value="Rajdhani">Rajdhani</option>
               <option value="Golden Squre">Golden Squre</option>
               <option value="Sahara">Sahara</option>
               <option value="Silicon Vally">Silicon Vally</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Select service Name:</span>
            <select name="service">
               <option value="Maintenance Bill">Maintenance Bill</option>
               <option value="Electricity Bill">Electricity Bill</option>
               <option value="Water Bill">Water Bill</option>
               <option value="Gas Bill">Gas Bill</option>
            </select>
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method">
               <option value="UPI">Upi</option>
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
               <option value="paytm">paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Flat Number</span>
            <input type="text" name="address" required placeholder="e.g. flat no. b-201">
         </div>
         
         <div class="inputBox">
            <span>city :</span>
            <input type="text" name="city" required placeholder="e.g. mumbai">
         </div>
         <div class="inputBox">
            <span>state :</span>
            <input type="text" name="state" required placeholder="e.g. maharashtra">
         </div>
         <div class="inputBox">
            <span>country :</span>
            <input type="text" name="country" required placeholder="e.g. india">
         </div>
         
         <div class="inputBox">
            <span>Bill Amount:</span>
            <input type="number" min="0" name="Amount" required placeholder="e.g. Bill Amount">
         </div>
      </div>
      <input type="submit" value="Pay now" class="btn" name="order_btn">
   </form>

 </section>











<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
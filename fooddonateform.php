<?php
include("login.php"); 
if($_SESSION['name']==''){
	header("location: signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'demo1');
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $meal=mysqli_real_escape_string($connection, $_POST['meal']);
    $category=$_POST['image-choice'];
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    // $email=$_POST['email'];
    $phoneno=mysqli_real_escape_string($connection, $_POST['phoneno']);
    $district=mysqli_real_escape_string($connection, $_POST['district']);
    $address=mysqli_real_escape_string($connection, $_POST['address']);
    $name=mysqli_real_escape_string($connection, $_POST['name']);
  

 



    $query="insert into food_donations(email,food,type,category,phoneno,location,address,name,quantity) values('$emailid','$foodname','$meal','$category','$phoneno','$district','$address','$name','$quantity')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {

        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:delivery.html");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="images/fth logo.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="fooddonateform.css">
</head>
<body style="    background-color:yellow;">
    <div class="container">
        <div class="regformf" >
    <form action="" method="post">
      <a href="#"><img src="images/FOOD LOGO.jpg" class="logo" alt=""></a>
        
       <div class="input">
        <label for="foodname"  > Food Name:</label>
        <input type="text" id="foodname" name="foodname" required/>
        </div>
      
      
        <div class="radio">
        <label for="meal" >Meal type :</label> 
        <br><br>

        <input type="radio" name="meal" id="veg" value="veg" required/>
        <label for="veg" style="padding-right: 40px;">Veg</label>
        <input type="radio" name="meal" id="Non-veg" value="Non-veg" >
        <label for="Non-veg">Non-veg</label>
    
        </div>
        <br>
        <div class="input">
        <label for="food">Select the Category:</label>
        <br><br>
        <div class="image-radio-group">
            <input type="radio" id="fruits-food" name="image-choice" value="fruits-food">
            <label for="fruits-food">
              <img src="images/FRUITS-food.jpg" alt="Fruits-food" >
            </label>
            <input type="radio" id="Vegetables-food" name="image-choice" value="Vegetables-food"checked>
            <label for="Vegetables-food">
              <img src="images/vegetables-food packet.jpg" alt="vwgwtables-food" >
            </label>
            <input type="radio" id="Dairy-food" name="image-choice" value="Dairy-food">
            <label for="Dairy-food">
              <img src="images/dairy-food packet.jpg" alt="Dairy-food" >
            </label>
          </div>
          <br>
        <!-- <input type="text" id="food" name="food"> -->
        </div>
        <div class="input">
        <label for="quantity">Quantity:(number of person /kg)</label>
        <input type="text" id="quantity" name="quantity" required/>
        </div>
       <b><p style="text-align: center;">Contact Details</p></b>
        <div class="input">
          <!-- <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
          </div> -->
      <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"value="<?php echo"". $_SESSION['name'] ;?>" required/>
      </div>
      <div>
        <label for="phoneno" >PhoneNo:</label>
      <input type="text" id="phoneno" name="phoneno" maxlength="10" pattern="[0-9]{10}" required />
        
      </div>
      </div>
        <div class="input">
        <label for="location"></label>
        <label for="district">District:</label>
<select id="district" name="district" style="padding:10px;">
   <option value="Visakhapatnam">visakhapatnam</option>
  <option value="chennai">Chennai</option>
  <option value="kancheepuram">Kancheepuram</option>
  <option value="thiruvallur">Thiruvallur</option>
  <option value="vellore">Vellore</option>
  <option value="tiruvannamalai">Tiruvannamalai</option>
  <option value="tiruvallur">Tiruvallur</option>
  <option value="tiruppur">Tiruppur</option>
  <option value="coimbatore">Coimbatore</option>
  <option value="erode">Erode</option>
  <option value="salem">Salem</option>
  <option value="namakkal">Namakkal</option>
  <option value="tiruchirappalli">Tiruchirappalli</option>
  <option value="thanjavur">Thanjavur</option>
  <option value="pudukkottai">Pudukkottai</option>
  <option value="karur">Karur</option>
  <option value="ariyalur">Ariyalur</option>
  <option value="perambalur">Perambalur</option>
  <option value="madurai" selected>Madurai</option>
  <option value="virudhunagar">Virudhunagar</option>
  <option value="dindigul">Dindigul</option>
  <option value="ramanathapuram">Ramanathapuram</option>
  <option value="sivaganga">Sivaganga</option>
  <option value="thoothukkudi">Thoothukkudi</option>
  <option value="tirunelveli">Tirunelveli</option>
  <option value="tiruppur">Tiruppur</option>
  <option value="tenkasi">Tenkasi</option>
  <option value="kanniyakumari">Kanniyakumari</option>
</select> 

        <label for="address" style="padding-left: 10px;">Address:</label>
        <input type="text" id="address" name="address" required/><br>
        
      
       
       
        </div>
        <div class="btn">
            <button type="submit" name="submit"> Submit</button>
     
        </div>
     </form>
     </div>
   </div>
     
    
</body>
</html>
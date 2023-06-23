<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "makerecipes";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contactus (name, email, number, message) VALUES (?,?,?,?)";
    $result = $conn->prepare($sql);
    $result->bind_param("ssss", $name, $email, $number, $message);

    if ($result->execute() === true) {
        echo '<script>alert("Message sent! Thank you");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $result->error;
    }

    $result->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="style.css">

  <header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo">ContactUs<span>.</span></a>

    <nav class="navbar">
            <a href="homepage.html">home</a>
            <a href="aboutus.html">about</a>
            <a href="homepage.html #recipes">recipes</a>
            <a href="review.html">review</a>
            <a href="myacc.php">contacts</a>
    </nav>

    <div class="icon">
        
        <a href="homepage.html #recipes" class="fas fa-utensils"></a>  
        <a href="myacc.php" class="fas fa-phone"></a>
        
    </div>
</header>
<section class="contact" id="contact">
  <h1 class="heading"></h1>
  <div class="row">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  
    <form action="myacc.php" method="POST">

      <input type="text" placeholder="name" class="box" name="name" required>
      <input type="email" placeholder="email" class="box" name="email" required>
      <input type="number" placeholder="number" class="box" name="number" required>
      <textarea name="message" class="box" placeholder="message" cols="30" rows="10" required></textarea>
      <input type="submit" value="send message" class="btn">

    </form>
    <div class="image">
      <img src="Asset 5.png" alt="">
    </div>
  </div>
</section>
<section class="footer">

  <div class="box-container">

      <div class="box">
          <h3>quick links</h3>
          <a href="homepage.html">home</a>
          <a href="aboutus.html">about</a>
          <a href="homepage.html #recipes">recipes</a>
          <a href="review.html">review</a>
          <a href="myacc.php">contacts</a>
      </div>


  <div class="box">
      <h3>contact info</h3>
      <a href="#">0123456789</a>
      <a href="#">mNm@gmail.com</a>
      <a href="#">Johor, Malaysia</a>
  </div>

  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>


</html>
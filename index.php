<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>NIC ASIA Newspaper Download Panel</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<form name="DownloadNews" action="GetNews.php" method="Post">
  <header>NIC ASIA Newspaper Download Panel</header>
  <label>Date:</label>
  <input type="text" name="date" placeholder="yyyy-mm-dd" required="true" />
  <div class="help"><i>Note: Date format must be YYYY-MM-DD</i></div>
  <label>Select Newspaper: </label>
  <div class="select">
  <select name="newsvendor" required="true">
        <option value="Kantipur">Kantipur</option>
        <option value="Himalayan">Himalayan Times</option>
  </select>
  </div>
  <div class="help"><i>Sometime URL might changes by vendor and data cannot be downloaded.</i></div>
  <input id="submit" type="submit" name="submit" value="Download">
   
  
  

      <?php 
    session_start();
    if($_SESSION['message']){
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>';
        echo '<lebel>'.$_SESSION["message"].'</lebel>';
        echo '</div>';
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy(); 
        }
   ?>
  
</form>

  
</body>
</html>

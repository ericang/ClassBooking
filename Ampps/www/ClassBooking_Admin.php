<html>
<head> <title>Class Booking Student</title> </head>

<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;">
<h1> Class Booking </h1>
<h2> Logged in as Student </h2>
</td> </tr>

<?php 
$servername = "localhost";
$username = "root";
$password = "password89";
$database = "myapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<tr>
<td style="background-color:#eeeeee;">
<form>
Username: <input type="text" name="username" id="username">

<input type="submit" name="formSubmit" value="Login" >
</form>


<?php
if(isset($_GET['formSubmit']))
{
  $sql = "SELECT Title, Authors FROM Book WHERE Title like '%".$_GET['username']."%' AND Language='".$_GET['Language']."' AND Format='".$_GET['Format']."'";
  echo "<b>SQL:  </b>".$sql."<br><br>";
 
  $result = $conn->query($sql);
  
  echo "<table border=\"1\" >
  <col width=\"75%\">
  <col width=\"25%\">
  <tr>
  <th>Title</th>
  <th>Authors</th>
  </tr>";
 
  while($row = $result->fetch_array()) {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>"; echo "<td>" . $row[1] . "</td>"; echo "</tr>"; 
  }
  echo "</table>";

  $result->close();
}
?>


</td> </tr>
<?php 
$conn->close();	
?>

<form action="/ClassBooking_Login.php">
<input type="submit" name="bookEnglish" value="Book English Class"><br>
<input type="submit" name="bookChinese" value="Book Chinese Class"><br>
<input type="submit" name="bookMalay" value="Book Malay Class"><br>
<input type="submit" name="bookTamil" value="Book Tamil Class"><br>
</form>

<script>
function asd()
{
echo "asd";
}

function test($arg)
{
echo $arg;
}
</script>


<tr>
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; Group 4
</td> </tr>
</table>

</body>
</html>
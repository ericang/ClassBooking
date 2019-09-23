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
$database = "ClassBooking";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<tr>
<td style="background-color:#eeeeee;">
Registered Classes:
<?php
  $sql = "SELECT c.language, c.level, cs.startDate, cs.endDate, sb.paymentDate, sb.bookingStatus, sb.classStatus FROM StudentBookings sb, Classes c, ClassSessions cs
          WHERE sb.SessionID = cs.SessionID AND cs.ClassID = c.ClassID";
  //echo "<b>SQL:  </b>".$sql."<br><br>";
 
  $result = $conn->query($sql);
  
  echo "<table border=\"1\" >
  <col width=\"15%\">
  <col width=\"5%\">
  <col width=\"15%\">
  <col width=\"15%\">
  <col width=\"15%\">
  <col width=\"15%\">
  <col width=\"20%\">
  <tr>
  <th>Language</th>
  <th>Level</th>
  <th>Start Date</th>
  <th>End Date</th>
  <th>Payment Date</th>
  <th>Booking Status</th>
  <th>Class Status</th>
  </tr>";
 
  while($row = $result->fetch_array()) {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[4] . "</td>";
    echo "<td>" . $row[5] . "</td>";
    echo "<td>" . $row[6] . "</td>";
    echo "</tr>"; 
  }
  echo "</table>";

  $result->close();
?>

</td> </tr>


<tr>
<td>
<form action="" method="POST">
<input type="submit" name="bookEnglish" value="Book English Class"><br>
<input type="submit" name="bookChinese" value="Book Chinese Class"><br>
<input type="submit" name="bookMalay" value="Book Malay Class"><br>
<input type="submit" name="bookTamil" value="Book Tamil Class"><br>
<input type="submit" name="logout" value="Log out"><br>
</form>
</td>
</tr>

<?php
$submitBookEnglish= $_POST['bookEnglish'];
$submitBookChinese= $_POST['bookChinese'];
$submitBookMalay= $_POST['bookMalay'];
$submitBookTamil= $_POST['bookTamil'];
$submitLogout= $_POST['logout'];

if ($submitBookEnglish)
{
  // $date = date('m/d/Y h:i:s a', time());
  // $sql = "INSERT INTO StudentBookings (SessionID, StudentID, PaymentDate) VALUES (1, 1, ".$date.");";
  $sql = "INSERT INTO StudentBookings (SessionID, StudentID) VALUES (1, 1);";
  // echo "<b>SQL:  </b>".$sql."<br><br>";
  $conn->query($sql);
  echo 'Booked english class !';
}
if ($submitBookChinese)
{
  $sql = "INSERT INTO StudentBookings (SessionID, StudentID) VALUES (2, 1);";
  $conn->query($sql);
  echo 'Booked chinese class !';
}
if ($submitBookMalay)
{
  $sql = "INSERT INTO StudentBookings (SessionID, StudentID) VALUES (3, 1);";
  $conn->query($sql);
  echo 'Booked malay class !';
}
if ($submitBookTamil)
{
  $sql = "INSERT INTO StudentBookings (SessionID, StudentID) VALUES (4, 1);";
  $conn->query($sql);
  echo 'Booked tamil class !';
}
if ($submitLogout)
{
	header("Location:ClassBooking_Login.php");
}
?>


<?php 
$conn->close();	
?>


<tr>
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; Group 4
</td> </tr>
</table>

</body>
</html>
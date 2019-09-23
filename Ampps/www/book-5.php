<html>
<head> <title>Demo Online Book Catalog</title> </head>

<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;">
<h1> Demo Book Catalog</h1>
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
 
echo "Connected successfully";
?>

<tr>
<td style="background-color:#eeeeee;">
<form>
Title: <input type="text" name="Title" id="Title">

<select name="Language"> <option value="">Select Language</option>
<?php

$sql = "SELECT DISTINCT language FROM book";
$result = $conn->query($sql);

while($row = $result->fetch_array()) {
	echo "<option value=\"".$row[0]."\">".$row['language']."</option><br>";
}		

$result->close();

?>
</select>

<input type="radio" name="Format" id="Format1" value="hardcover">hardcover
<input type="radio" name="Format" id="Format2" value="paperback">paperback

<input type="submit" name="formSubmit" value="Search" >
</form>

<?php
if(isset($_GET['formSubmit']))
{
  $sql = "SELECT Title, Authors FROM Book WHERE Title like '%".$_GET['Title']."%' AND Language='".$_GET['Language']."' AND Format='".$_GET['Format']."'";
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
<tr>
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; TIC2601
</td> </tr>
</table>

</body>
</html>
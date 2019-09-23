<html>
<head> <title>Class Booking System Project</title> </head>

<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;">
<h1> Class Booking </h1>
<h2> Login </h2>
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
<form>
Username: <input type="text" name="usernamelogin" id="usernamelogin">

<input type="submit" name="formSubmit" value="Login" >
</form>


<?php
if(isset($_GET['formSubmit']))
{
$u = $_GET['usernamelogin'] ;
switch ($u)
{
case 'admin':
	header("Location:ClassBooking_Admin.php");
break;

case 'student':
	header("Location:ClassBooking_Student.php");
break;

default:
	echo "Enter either 'student' or 'admin' only";
}
}
?>


</td> </tr>
<?php 
$conn->close();	
?>


<tr>
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; Group 4
</td> </tr>
</table>

</body>
</html>
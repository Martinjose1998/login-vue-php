<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "network";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



if($_GET["action"]=='login')
{
    $email = $_GET['email'];
    $pass = $_GET['pass'];
    $sql=$conn->query("SELECT email FROM users WHERE email='".$email."'");
    $sql2=$conn->query("SELECT pass FROM users WHERE pass=MD5('".$pass."')");
    $sql3=$conn->query("SELECT id,username FROM users WHERE email='".$email."'");
    $result = mysqli_fetch_assoc($sql3);
    if(mysqli_fetch_assoc($sql) && mysqli_fetch_assoc($sql2))
    {
        $_SESSION['user_email'] = $_GET["email"];
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['username'];
        echo json_encode($_GET["email"]);
    }
    else
    {
        echo json_encode('no');
    }
    
}
if($_GET["action"]=='logout')
{
    unset($_SESSION['user_email']);
    echo json_encode('nada');
}

if($_GET["action"]=='register')
{
    $username = $_GET['username'];
    $email = $_GET['email'];
    $pass = $_GET['pass'];

    $sql=$conn->query("SELECT username FROM users WHERE username='".$username."'");
    $sql2=$conn->query("SELECT email FROM users WHERE email='".$email."'");
    if(mysqli_fetch_assoc($sql) || mysqli_fetch_assoc($sql2))
    {
        echo json_encode('name/email already exists');
    }
    else
    {
        $sql = "INSERT INTO users (username, email, pass)
        VALUES ('".$username."', '".$email."', MD5('".$pass."'))";

        if ($conn->query($sql) === TRUE)
        {
        echo json_encode("User created successfully");
        }
        else
        {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } 

}


?>
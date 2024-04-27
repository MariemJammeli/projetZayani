User
<?php
$id=0;
$nom=$_POST['nom'];
$pre=$_POST["pre"];
$email=$_POST["email"];
$tel=$_POST['tel'];
$password=$_POST['pwd'];
if(isset($_POST['type1']))
{
    $type=$_POST['type1'];
}
else if(isset($_POST['type2'])){
    $type=$_POST['type2'];
}
$conn = new mysqli("localhost", "root", "", "zayani");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
$req="insert into user (id,nom, pre, passwor,email,num_tel, typ) values('$id','$nom' ,'$pre','$password','$email','$tel','$type')";
$result = mysqli_query($conn,$req);
if($req){
    header("Location: Acceuil.html");
        $id=$id+1;
}
else{
    echo("insertion échouée");
}
?>
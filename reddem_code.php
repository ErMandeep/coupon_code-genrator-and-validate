<?php include"db.php"; ?>

<?php

//if number of rows fields is bigger them 0 that means the code in the database' 
if(isset($_POST['match'])){

    $entercode = $_POST['codes'];


    $query = "SELECT * FROM codes WHERE codes= '{$entercode}' && used='0'";
    $result = mysqli_query($connection, $query);



if(mysqli_num_rows($result) > 0){ 
    $query = mysqli_query($connection, "UPDATE codes SET used='1' WHERE codes= '{$entercode}' ");    

     echo "code is valid";
}else{
    echo "invalid code";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>redeem code</title>
</head>
<body>

    <form method="post">
        <div class="form-control">
            <input type="text" name="codes">
        </div>
        <div class="form-control">
            <input type="submit" name="match" value="Redeem">
        </div>

    </form>

</body>
</html>
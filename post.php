<html>
<body>



<?php
$mysqli=new mysqli("localhost","Buffalo","Toshy200","chatty");
//Had an extra quote and semi-colon. Error: unexpected INSERT.

$result=$mysqli->query("
SELECT 'ID' FROM 'user_names' WHERE 'name' = $POST["uName"]
");
//Syntax error, unexpected "", expecting '-' or identifier or variable or unmber

$fetch_result = mysqli_fetch_assoc ($result);


$sql = "
INSERT INTO `chat_messages` 
(`time_date`, `message`, `sender`, `room`, `emojis`, `ID`) 
VALUES (current_timestamp(), ?, ?, ?, ?, ?)
";

$emoji='';
$nada = NULL;
$stmt = $mysqli->prepare ($sql,);

$stmt->bind_param("sssss", $_POST["message"], $fetch_result["name"], $_POST["chatNum"], $emoji, $nada);

$stmt->execute();

?>

Welcome <?php echo $_POST["uName"]; ?><br> 
The Chatroom is: <?php echo $_POST["chatNum"]; ?><br>
Your Message is: <?php echo $_POST["message"]; ?><br>

</body>
</html>

<?php
	
    $conn = new mysqli("localhost","root","","quickroom");
    $count = 0;
    $sql2 = "SELECT * FROM chat WHERE estado = 0";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
?>
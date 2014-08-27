<?php

function connectToDb() {
   $con = mysqli_connect("localhost", "root", "", "db_chat_room");
   if (mysqli_connect_errno()) {
    echo "Error connecting to data base";
}
else {
}
return $con;
}

?>

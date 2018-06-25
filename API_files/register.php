<?php
function register()
{
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset ($_POST["password"]) && isset ($_POST["cityid"]) && isset ($_POST['email'])) {
        global $connect;

        $password = sha1($_POST['password']);
        $password = mysqli_real_escape_string($connect, $password);
        $firstname = mysqli_real_escape_string($connect, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($connect, $_POST["lastname"]);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $cityid = mysqli_real_escape_string($connect, $_POST["cityid"]);

        $query = "SELECT * FROM `user` WHERE `email` = '" . $email . "'";

        $results = mysqli_query($connect, $query);
        $result = mysqli_fetch_assoc($results);

        if (count($result) == 0) {
            $query = "INSERT INTO `user`(`firstname`, `lastname`, `password`, `email`, `cityId`) VALUES ('" . $firstname . "', '" . $lastname . "', '" . $password . "', '" . $email . "', '" . $cityid . "')";
            echo $query;
            $results = mysqli_query($connect, $query);
            echo json_encode("Account is succesfully created!");
        } else {
            echo json_encode ("This email is already in use");
        }



    } else {
        echo json_encode("not everything is setup");
    }
}

;
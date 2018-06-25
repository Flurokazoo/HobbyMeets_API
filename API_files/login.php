<?php
function login()
{
    if (isset($_POST["email"]) && isset ($_POST["password"])) {
        global $connect;

        $password = sha1($_POST['password']);
        $password = mysqli_real_escape_string($connect, $password);
        $email = mysqli_real_escape_string($connect, $_POST["email"]);

        $query = "SELECT * FROM `user` WHERE `password` = '" . $password . "' AND `email` = '" . $email . "'";

        $results = mysqli_query($connect, $query);
        $result = mysqli_fetch_assoc($results);

        if (count($result) > 0) {
            $obj = new stdClass();
            $obj->id = $result['id'];
            $obj->firstname = $result['firstName'];
            $obj->lastname = $result['lastName'];

            $obj = json_encode($obj);

            echo $obj;
            exit;
        }
    }

}

;
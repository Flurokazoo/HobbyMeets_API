<?php
function authorisation()
{
    if (isset($_POST["userid"]) && isset ($_POST["password"])) {
        global $connect;
        $password = sha1($_POST['password']);
        $password = mysqli_real_escape_string($connect, $password);
        $id = mysqli_real_escape_string($connect, $_POST["userid"]);

        $query = "SELECT * FROM `user` WHERE `password` = '" . $password . "' AND `id` = '" . $id . "'";
        //return $query;

        $results = mysqli_query($connect, $query);
        $result = mysqli_fetch_assoc($results);

        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }

    } else {
        return false;
    }
}
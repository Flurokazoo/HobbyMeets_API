<?php
function getInterest(){
    global $connect;

    $user = $_POST["userid"];

    //echo strip_tags($user);

    //echo str_replace("<br />", "", "$user");

    $query = "SELECT * FROM `userinterest` WHERE `userId` = " . $user;
    $results = mysqli_query($connect, $query);

    $schoolList = array();
    while($row = mysqli_fetch_array($results))
    {
        $obj = array();
        $obj["interestId"] = $row['interestId'];

        $schoolList[] = $obj;

    }

    $json = json_encode($schoolList);
    echo $json;
    exit;
}
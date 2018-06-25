<?php
function compatibleMatch(){
    global $connect;

    $user = $_POST["userid"];
    $interest = $_POST["interestid"];


    $query = "SELECT * FROM `userinterest` WHERE `userId` <> " . $user . " AND `interestId` = " . $interest;

    $results = mysqli_query($connect, $query);

    $schoolList = array();
    while($row = mysqli_fetch_array($results))
    {
        $obj = array();
        $obj["userId"] = $row['userId'];

        $schoolList[] = $obj;

    }

    $json = json_encode($schoolList);
    echo $json;
    exit;
}
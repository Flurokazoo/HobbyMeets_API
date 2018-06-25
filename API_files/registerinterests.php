<?php
function registerInterest()
{
    if (isset($_POST["interestid"]) && isset($_POST["userid"])) {
        $check = true;
        global $connect;

        if ($check) {
            $interestid = mysqli_real_escape_string($connect, $_POST["interestid"]);
            $userid = mysqli_real_escape_string($connect, $_POST["userid"]);

            $query = "SELECT * FROM `userinterest` WHERE `interestId` = '" . $interestid . "' AND WHERE `userId`= '" . $userid . "'";

            echo $query;

            $results = mysqli_query($connect, $query);
            $result = mysqli_fetch_assoc($results);

            if (count($result) == 0) {
                $query = "INSERT INTO `userinterest`(`userId`, `interestId`) VALUES ('" . $userid . "', '" . $interestid . "')";
                echo $query;
                $results = mysqli_query($connect, $query);
                echo "Slot succesfully created";
            } else {
                echo "Slot already exists";
            }
        } else {
            echo "authorisation failed";
        }
    }
}

;
<?php

class Logout extends Dbh
{
    public function changestatusUser($email)
    {
        $stmt = $this->connect()->prepare("UPDATE users SET user_status = 'inactive' WHERE email = ? ;");


        if (!$stmt->execute(array($email))) {
            $stmt = null;
            // header("location: ../index.php?error=stmtfailed");
            // $this->location = "index.php?error=stmtfailed";
            exit();
        }


        $stmt = null;
    }
}

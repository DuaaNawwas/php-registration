<?php

// Model, query into the database -> extend to the database
class Login extends Dbh
{
    public $location;
    protected $admin;

    protected function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');


        if (!$stmt->execute(array($email))) {
            $stmt = null;
            // header("location: ../welcome.php?error=stmtfailed");
            $this->location = "welcome.php?error=stmtfailed";
            exit();
        }


        if ($stmt->rowCount() == 0) {
            $stmt = null;
            // header("location: ../welcome.php?error=usernotfound");
            $this->location = "welcome.php?error=usernotfound";
            exit();
        }

        $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $userInfo[0]['user_pwd']);

        if ($checkPwd == false) {
            $stmt = null;
            // header("location: ../welcome.php?error=wrongpassword");
            $this->location = "welcome.php?error=wrongpassword";
            exit();
        } else {


            // change user status
            $stmt1 = $this->connect()->prepare("UPDATE users SET user_status = 'active' WHERE email = ? ;");


            if (!$stmt1->execute(array($email))) {
                $stmt1 = null;
                // header("location: ../welcome.php?error=stmtfailed");
                // $this->location = "welcome.php?error=stmtfailed";
                exit();
            }


            $stmt1 = null;

            if ($userInfo[0]['role'] == 'admin') {
                $this->admin = true;
            } else {
                $this->admin = false;
            }

            session_start();
            $_SESSION['email'] = $userInfo[0]['email'];

            $stmt = null;
        }


        $stmt = null;
    }
}

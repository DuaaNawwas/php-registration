<?php

// Model, query into the database -> extend to the database
class Login extends Dbh
{
    public $location;
    public $err;
    protected $admin;

    protected function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');


        if (!$stmt->execute(array($email))) {
            $stmt = null;
            // header("location: ../welcome.php?error=stmtfailed");
            $this->location = "welcome.php?error=stmtfailed";
            // exit();
            return;
        }


        if ($stmt->rowCount() == 0) {
            $stmt = null;
            // header("location: ../welcome.php?error=usernotfound");
            $this->err = "email not found";
            // exit();
            return;
        }

        $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $userInfo[0]['user_pwd']);

        if ($checkPwd == false) {
            $stmt = null;
            // header("location: ../welcome.php?error=wrongpassword");
            $this->err = "wrong password";
            // exit();
            return;
        } else {


            // change user status
            $stmt1 = $this->connect()->prepare("UPDATE users SET user_status = 'active' WHERE email = ? ;");


            if (!$stmt1->execute(array($email))) {
                $stmt1 = null;
                // header("location: ../welcome.php?error=stmtfailed");
                $this->location = "welcome.php?error=stmtfailed";
                // exit();
                return;
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

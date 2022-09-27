<?php

// Model, query into the database -> extend to the database
class Register extends Dbh
{
    public $location;
    public $err;

    protected function setUser($fullName, $email, $password, $dob, $phone)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (fullname, email, dob, phone, user_pwd) VALUES (?,?,?,?,?);');

        $hashedpwd = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        if (!$stmt->execute(array($fullName, $email, $dob, $phone, $hashedpwd))) {
            $stmt = null;
            // header("location: ../index.php?error=stmtfailed");
            $this->err = "statement failed";
            exit();
            // return;
        }


        $stmt = null;
    }


    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email= ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            // header("location: ../index.php?error=stmtfailed");
            $this->err = "statement failed";
            exit();
            // return;
        }


        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }


        return $resultCheck;
    }

    protected function getUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email= ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            // header("location: ../index.php?error=stmtfailed");
            $this->err = "statement failed";
            exit();
            // return;
        }


        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);


        session_start();
        $_SESSION['email'] = $user[0]['email'];

        $stmt = null;
    }
}

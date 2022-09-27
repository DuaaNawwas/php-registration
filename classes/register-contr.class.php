<?php
// controller, class that takes input from user
class RegisterContr extends Register
{

    private $fullName;
    private $email;
    private $password;
    private $dob;
    private $phone;

    public function __construct($fullName, $email, $password, $dob, $phone)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->dob = $dob;
        $this->phone = $phone;
    }

    public function registerUser()
    {
        if ($this->emailTakenCheck() == false) {
            // email taken
            // header("location: ../index.php?error=emailtaken");
            $this->err = "This email is already registered";
            // exit();
            return;
        }

        $this->setUser($this->fullName, $this->email, $this->password, $this->dob, $this->phone);
        $this->getUser($this->email);
        $this->location = "welcome.php";
    }
    // error handlers
    private function emailTakenCheck()
    {
        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

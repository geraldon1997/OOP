<?php
namespace Form;

class Form
{
    private $data = [];
    public $errmsg = [];

    public function __construct($data)
    {
        $this->data = $data;
        $this->cleanInput();
    }

    public function cleanInput()
    {
        foreach ($this->data as $key => $value) {
            $data = trim(htmlspecialchars(stripslashes(strip_tags($this->data[$key]))));
            $this->data[$key] = $data;
        }
        $this->checkInput();
    }

    public function checkInput()
    {
        foreach ($this->data as $key => $value) {
            if ($this->data[$key] = '' || $this->data[$key] === null || empty($this->data[$key])) {
                $msg = "$key should not be empty";
                $this->errmsg[$key] = $msg;
                unset($this->data[$key]);
            } else {
                $this->data[$key] = $value;
            }
        }
        $this->validateEmail();
    }

    public function validateEmail()
    {
        $mail = $this->data['email'];
        $email = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if ($email) {
            $this->data['email'] = $email;
        } else {
            $msg = $this->data['email']." is not a valid email address";
            $this->errmsg['email'] = $msg;
            unset($this->data['email']);
        }
        $this->validatePhone();
    }

    public function validatePhone()
    {
        $phone = $this->data['phone'];
        $validPhone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        if ($validPhone) {
            $this->data['phone'] = $validPhone;
        } else {
            $msg = $phone." is not valid";
            $this->errmsg['phone'] = $msg;
            unset($this->data['phone']);
        }
    }
}

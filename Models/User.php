<?php
class User extends Connect
{
    private $db;
    private $table_name = "users";
    public function __construct()
    {
        $this->db = new Connect();
    }

    public function checkUser($userName, $email)
    {
        $select = 'SELECT * FROM users WHERE username = "' . $userName . '" OR email = "' . $email . '"';
        $result = $this->db->getList($select);
        return $result;
    }

    public function getUser($email)
    {
        $select = 'SELECT DISTINCT users.id, users.username, users.email, users.fullname, users.confirm_email, users.password, users.role FROM users WHERE email = "' . $email . '"';
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function insertUser($data)
    {
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        $result = $this->db->insert($this->table_name, $data);
        return $result;
    }

    public function login($username, $password)
    {
        $select = "SELECT DISTINCT users.username, users.fullname, users.id, users.role, users.email FROM users WHERE users.username = '" . $username . "' AND users.password = '" . $password . "' AND users.confirm_email = 1";
        $result = $this->db->getList($select);
        return $result;
    }

    public function confirmEmail($email, $confirm)
    {
        $select = "UPDATE users SET confirm_email = $confirm WHERE email = '$email'";
        $result = $this->db->exec($select);
        return $result;
    }

    public function updateTokenLogin($token, $username, $password) {
        $result = $this->db->update('users', ['token' => $token], "username = '$username' AND password = '$password'");
        return $result;
    }

    public function loginToken($token) {
        $select = "SELECT DISTINCT users.username, users.fullname, users.id, users.role, users.email FROM users WHERE token = '$token'";
        $result = $this->db->getInstance($select);
        return $result;
    }
}

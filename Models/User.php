<?php 
class User {
    function checkUser($userName, $email) {
        $db = new Connect();
        $select = 'SELECT * FROM users WHERE username = "' . $userName . '" OR email = "' . $email . '"';
        $result = $db->getList($select);
        return $result;
    }

    function getUser ($email) {
        $db = new Connect();
        $select = 'SELECT DISTINCT users.id, users.username, users.email, users.fullname, users.confirm_email, users.password, users.role FROM users WHERE email = "'.$email.'"';
        $result = $db->getList($select);
        return $result;
    }

    function insertUser($data) {
        $username = $data['username'];
        $fullname = $data['fullname'];
        $email = $data['email'];
        $password = $data['password'];
        $currentDateTime = date("Y-m-d H:i:s");

        $db = new Connect();
        $select = 'INSERT INTO users (username, fullname, email, password, created_at, updated_at) VALUES ("'.$username.'", "'.$fullname.'", "'.$email.'", "'.$password.'", "'.$currentDateTime.'", "'.$currentDateTime.'")';
        $result = $db->exec($select);
        return $result;
    }

    function login($username, $password) {
        $db = new Connect();
        $select = "SELECT DISTINCT users.username, users.fullname, users.id, users.role FROM users WHERE users.username = '".$username."' AND users.password = '".$password."' AND users.confirm_email = 1";
        $result = $db->getList($select);
        return $result;
    }

    function confirmEmail ($email, $confirm) {
        $db = new Connect();
        $select = "UPDATE users SET confirm_email = $confirm WHERE email = '$email'";
        $result = $db->exec($select);
        return $result;
    }
}


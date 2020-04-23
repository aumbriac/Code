<?php
    $connect = new PDO("mysql:host=localhost;dbname=codingchallenge", "root", "admin123");


    if (isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT COUNT(email) AS num 
        FROM users WHERE email = :email";
        $statement = $connect->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row['num'] > 0) {
            exit('userExists');
        }
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users
        (username, email, password)
        VALUES
        (:username, :email, :password)
        ";
        $statement = $connect->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $passwordHash);
        $result = $statement->execute();
        if ($result){
            exit('success');
        } else {
            exit('error');
        }
    }
    
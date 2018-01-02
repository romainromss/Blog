<?php

namespace Romss\Models;

class UsersTable extends Table
{
    public function registerUser($name, $password, $email, $emailToken)
    {
        $reqRegisterUser =$this->db->prepare(
            'INSERT INTO users (name, password, email, email_token, register_at, connection_at, rank) 
        VALUES (:name, :password, :email, :emailToken, NOW(), NULL, 1)');
        $reqRegisterUser->execute([
            ':name'=> $name,
            ':password'=> $password,
            ':email'=> $email,
            ':emailToken'=> $emailToken
        ]);

        return intval($this->db->lastInsertId());
    }


    public function getUserByEmail($email)
    {
        $reqUsers = $this->db->prepare(
            'SELECT id, name, password, email, email_token, register_at, connection_at, rank FROM users
        WHERE email = :email');

        $reqUsers->execute([
            ':email' => $email
        ]);
        return $reqUsers->fetch();
    }

    public function getUserById($userId)
    {
        $reqUserID = $this->db->prepare(
            'SELECT id, name, password, email, email_token, register_at, connection_at, rank FROM users
        WHERE id = :userId
        LIMIT 0, 1');

        $reqUserID->execute([
            ':userId' => $userId
        ]);

        return $reqUserID->fetch();
    }

    public function updateUser($user)
    {
        $reqUpdate = $this->db->prepare(
            'UPDATE users
        SET name = :name,
            email = :email,
            email_token = :email_token,
            connection_at = :connection_at,
            rank = :rank
        WHERE id = :userId');

        $reqUpdate->execute([
            ':name', $user['name'],
            ':email', $user['email'],
            ':email_token', $user['email_token'],
            ':connection_at', $user['connection_at'],
            ':rank', $user['rank'],
            ':userId', $user['id']
        ]);
        return $reqUpdate;
    }

    function count()
    {
        $reqCount = $this->db->prepare(
            'SELECT COUNT(*) AS NbUsers FROM users');
        return $reqCount;
    }
}
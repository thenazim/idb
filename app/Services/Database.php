<?php

namespace App\Services;

use PDO;

class Database
{
    private $db;

    public function __construct($username = 'root', $password = '', $host = 'localhost', $dbname = 'testdb', $options = [])
    {
        $connect = sprintf('mysql:host=%s;dbname=%s',$host,$dbname);
        try {
            $this->db = new PDO($connect, $username, $password, $options);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }

    }

    public function __destruct()
    {
        $this->db = null;
    }

    public function getRow($query, $params = [])
    {
        try {
            $statement = $this->db->prepare($query);
            $statement->execute($params);
            return $statement->fetch();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());

        }

    }

    public function getRows($query, $params = [])
    {
        try {
            $statement = $this->db->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());

        }
    }

    public function insertRow($query, $params = [])
    {
        try {
            $statement = $this->db->prepare($query);
            $statement->execute($params);
            return true;
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());

        }
    }

    public function updateRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

    public function deleteRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

}

//$db = new Database();

//$db->getRow('select * from users where id = ?', ['1']);
//$db->getRows('select * from users');
//$db->insertRow('insert into users(username, password, email) VALUES (?,?,?)',['raja','131', 'raja@email.com']);
//$db->updateRow('update users set username = ?, password = ?, where id =?',['raja','131', '1']);

//$db->disconnect();
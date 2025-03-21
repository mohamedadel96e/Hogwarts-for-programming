<?php
// namespace App\Models;
namespace Models;
use Includes\Database;
class Course
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM courses";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function create($name)
    {
        $sql = "INSERT INTO courses (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        if (
            $stmt->execute([
                'name' => $name,
            ])
        ) {
            return ['message' => 'Professor registered successfully'];
        } else {
            return ['error' => 'Registration failed'];
        }
    }
}
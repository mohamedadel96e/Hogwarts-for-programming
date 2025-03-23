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

    public function create($name, $description, $professor_id)
    {
        $sql = "INSERT INTO courses (name, description, professor_id) VALUES (:name, :description, :professor_id)";
        $stmt = $this->db->prepare($sql);
        if (
            $stmt->execute([
                'name' => $name,
                'description' => $description,
                'professor_id' => $professor_id
            ])
        ) {
            return ['message' => 'Course Added successfully'];
        } else {
            return ['error' => 'Failed to add course'];
        }
    }
    public function get($id)
    {
        $sql = "SELECT * FROM courses WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getByProfessor($professor_id)
    {
        $sql = "SELECT * FROM courses WHERE professor_id = :professor_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['professor_id' => $professor_id]);
        return $stmt->fetchAll();
    }
}
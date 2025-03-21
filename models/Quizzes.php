<?php
// namespace App\Models;
namespace Models;
use Includes\Database;
class Quiz
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM quizzes";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function create($name, $courseId, $professorId, $question, $answer, $points)
    {
        $sql = "INSERT INTO quizzes (name, course_id, professor_id, question, answer, points) VALUES (:name, :courseId, :professorId, :question, :answer, :points)";
        $stmt = $this->db->prepare($sql);
        if (
            $stmt->execute([
                'name' => $name,
                'course_id' => $courseId,
                'professor_id' => $professorId,
                'question' => $question,
                'answer' => $answer,
                'points' => $points
            ])
        ) {
            return ['message' => 'Quiz registered successfully'];
        } else {
            return ['error' => 'Registration failed'];
        }
    }
}
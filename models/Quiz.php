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

    public function create($question, $answer, $points, $courseId, $professorId)
    {
        $sql = "INSERT INTO quizzes ( course_id, professor_id, question, answer, points) VALUES (:course_id, :professor_id, :question, :answer, :points)";
        $stmt = $this->db->prepare($sql);
        if (
            $stmt->execute([
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
    public function getByCourse($courseId)
    {
        $sql = "SELECT * FROM quizzes WHERE course_id = :course_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['course_id' => $courseId]);
        return $stmt->fetchAll();
    }
}
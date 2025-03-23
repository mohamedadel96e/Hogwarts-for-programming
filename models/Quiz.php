<?php
// namespace App\Models;
namespace Models;

use Includes\Database;
use Models\Student;
use Models\House;

class Quiz
{
    private $db;
    private $student;
    private $house;
    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->student = new Student();
        $this->house = new House();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM quizzes";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function getByStudent($studentId)
    {
        $sql = "SELECT * FROM quizzes WHERE course_id IN (SELECT course_id FROM enrollments WHERE student_id = :student_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['student_id' => $studentId]);
        return $stmt->fetchAll();
    }

    public function getAttemptedByStudent($studentId)
    {
        $sql = "SELECT q.question, q.answer as answer, sqa.submitted_answer as your_answer, sqa.earned_points as score FROM student_quiz_attempts sqa JOIN quizzes q ON q.id = sqa.quiz_id  WHERE student_id = :student_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['student_id' => $studentId]);
        return $stmt->fetchAll();
    }
    public function getByStudentUnSolved($studentId)
    {
        $sql = "SELECT q.id, q.question , q.points, c.name as course_name FROM quizzes q JOIN courses c ON c.id = q.course_id WHERE course_id IN (SELECT course_id FROM enrollments WHERE student_id = :student_id) AND q.id NOT IN (SELECT quiz_id FROM student_quiz_attempts WHERE student_id = :student_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['student_id' => $studentId]);
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

    public function attemptQuiz($quizId, $studentId, $answer, $houseId)
    {
        $quiz = $this->getById($quizId);
        $sql = "INSERT INTO student_quiz_attempts (quiz_id, student_id, submitted_answer, earned_points) VALUES (:quiz_id, :student_id, :submitted_answer, :earned_points)";
        $stmt = $this->db->prepare($sql);
        if (
            $stmt->execute([
                'quiz_id' => $quizId,
                'student_id' => $studentId,
                'submitted_answer' => $answer,
                'earned_points' => $answer == $quiz['answer'] ? $quiz['points'] : 0
            ])
        ) {
            $earned_points = $answer == $quiz['answer'] ? $quiz['points'] : 0;
            $this->house->addPoints($houseId, $earned_points);
            $this->student->addPoints($studentId, $earned_points * 10);
            return ['message' => 'Quiz attempted successfully'];
        } else {

            return ['error' => 'Quiz attempt failed'];
        }
    }

    public function getById($quizId)
    {
        $sql = "SELECT * FROM quizzes WHERE id = :quiz_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['quiz_id' => $quizId]);
        return $stmt->fetch();
    }
}

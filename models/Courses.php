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

    public function getCoursesWithProfs($user_id){
        $sql = "SELECT 
                courses.id AS course_id,
                courses.name AS course_name,
                courses.description AS descr,
                p.name AS professor_name,
                e.status AS stat
                FROM courses 
                INNER JOIN professors p 
                ON courses.professor_id = p.id
                LEFT JOIN enrollments e ON e.course_id = courses.id AND e.student_id = {$user_id}";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function enrollStudentInCourse($studentId, $courseId){
        // Insert new enrollment
        $sql = "INSERT INTO enrollments 
                (student_id, course_id, status) 
                VALUES (:student_id, :course_id, 'Enrolled')
                ";
        $insertStmt = $this->db->prepare($sql);
        
        $insertStmt->execute([
            ':student_id' => $studentId,
            ':course_id' => $courseId
        ]);

        $this->db->commit();

        return [
            'success' => true,
            'message' => 'Successfully enrolled in course',
        ];
    }

    public function checkEnrollment($studentId, $courseId) {
        echo $studentId . $courseId;
        $sql = "SELECT status, grade 
                FROM enrollments 
                WHERE student_id = :student_id 
                AND course_id = :course_id";
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute([
            ':student_id' => $studentId,
            ':course_id' => $courseId
        ]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
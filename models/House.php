<?php
// namespace App\Models;
namespace Models;
use Includes\Database;
class House
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM houses ORDER BY points desc";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }   

    public function addPoints($house_id, $points)
    {
        $sql = "UPDATE houses SET points = points + :points WHERE id = :house_id";
        $stmt = $this->db->prepare($sql);
        if (
            $stmt->execute([
                'points' => $points,
                'house_id' => $house_id
            ])
        ) {
            return ['message' => 'Points added successfully'];
        } else {
            return ['error' => 'Failed to add points'];
        }
    }
}
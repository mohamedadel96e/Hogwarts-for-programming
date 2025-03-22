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
}
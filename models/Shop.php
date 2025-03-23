<?php
namespace Models;
use Includes\Database;

class Shop
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getInventory($id)
    {
        $sql = "SELECT s.name AS name,
                        s.image_path AS imagePath,
                        s.category AS category,
                        i.purchased_at AS time
                FROM student_inventory i 
                INNER JOIN shop_items s
                ON i.item_id = s.id
                WHERE i.student_id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getShopItems($id)
    {
        $sql = "SELECT s.name AS name,
                        s.image_path AS imagePath,
                        s.category AS category,
                        s.price AS price
                FROM shop_items s
                WHERE s.id NOT IN (SELECT item_id FROM student_inventory WHERE student_id = :id)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

}

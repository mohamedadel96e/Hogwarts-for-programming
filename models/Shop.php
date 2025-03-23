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

    public function getInventory($id): bool|array
    {
        $sql = "SELECT s.id AS id, s.name AS name,
                        s.image_path AS imagePath,
                        s.category AS category,
                        i.purchased_at AS purchased_at
                FROM student_inventory i 
                INNER JOIN shop_items s
                ON i.item_id = s.id
                WHERE i.student_id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function getShopItems($id)
    {
        $sql = "SELECT s.id AS id, s.name AS name,
                        s.image_path AS imagePath,
                        s.category AS category,
                        s.price AS price
                FROM shop_items s
                WHERE s.id NOT IN (SELECT item_id FROM student_inventory WHERE student_id = :id)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function purchaseItem($id, $itemId):bool
    {
        $sql = "INSERT INTO student_inventory (student_id, item_id) VALUES (:id, :itemId)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id, 'itemId' => $itemId]);
        return true;
    }

}

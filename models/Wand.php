<?php 

namespace Models;

use Includes\Database;

class Wand
{
  private $db;

  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  // public function create($wood, $core, $length, $flexibility)
  // {
  //   $sql = "INSERT INTO wands (wood, core, length, flexibility) VALUES (:wood, :core, :length, :flexibility)";
  //   $stmt = $this->db->prepare($sql);

  //   if (
  //     $stmt->execute([
  //       'wood' => $wood,
  //       'core' => $core,
  //       'length' => $length,
  //       'flexibility' => $flexibility
  //     ])
  //   ) {
  //     return ['message' => 'Wand created successfully'];
  //   } else {
  //     return ['error' => 'Wand creation failed'];
  //   }
  // }

  public function get($id)
  {
    $sql = "SELECT * FROM wands WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
  }

  public function getAll()
  {
    $sql = "SELECT * FROM wands";
    $stmt = $this->db->query($sql);
    return $stmt->fetchAll();
  }
  

}

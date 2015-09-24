<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 9/24/15
 * Time: 12:28 PM
 */
include_once('AddModel.php');
class ListModel extends ModelAdd {

    public function list_items($table){
        $db = $this->db_init();
        $stmt = $db->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 9/24/15
 * Time: 11:04 AM
 */

if (!class_exists("Add")){
    include_once('Model/AddModel.php');
    class Add {

        public function __construct(){
            if(isset($_POST['title']) && isset($_POST['text'])){
                $values = array(
                    'title' => $_POST['title'],
                    'text'  => $_POST['text']
                );
                $db = new ModelAdd();
                $db->db_insert('idea', $values);
            }
            include_once('View/add.php');

        }



    }
}

new Add();


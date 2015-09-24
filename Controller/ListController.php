<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 9/24/15
 * Time: 11:01 AM
 */

if (!class_exists("List_idea")){
    include_once('Model/ListModel.php');
    class List_idea {

        public function __construct(){
            $items = new ListModel();
            $rez = $items->list_items('idea');
            include_once('View/list.php');
        }

    }
}

new List_idea();
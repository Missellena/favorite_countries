<?php namespace App;

/**
 * Factory design for all instantiated classes
 * to be saved to DB
 *
 */

class DataWriter {

    public static function saveToDB(Saveable $object) {
        $columns = implode(',', $object->getColumns());
        $data = implode(',', $object->getContent());
        $sql = "INSERT INTO {$object->getTable()} ({$columns}) VALUES({$data})";
        echo $sql;
    }
}
<?php namespace App;

interface Saveable {
    public function getContent();
    public function getTable();
    public function getColumns();
}
<?php

class Gallery
{
    private $connect;
    private $table_name = "images";

    public function __construct($db)
    {
        $this->connect = $db;
    }

    public function requestImage($id)
    {
        $query = "SELECT * FROM $this->table_name images WHERE id = $id ORDER BY count_views DESC";
        return mysqli_query($this->connect, $query);
    }


    public function requestAllImages()
    {
        $query = "SELECT * FROM $this->table_name images ORDER BY count_views DESC";
        return mysqli_query($this->connect, $query);
    }

    public function getArrImages($result)
    {
        $arrImages = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $arrImages[] = $row;
        }
        return $arrImages;
    }

    public function getImage($result)
    {
        return mysqli_fetch_assoc($result);
    }
}

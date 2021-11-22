<?php

class Products
{
    private $connect;
    private $table_name = "products";

    public function __construct($db)
    {
        $this->connect = $db;
    }

    public function requestProduct($id)
    {
        $query = "SELECT * FROM $this->table_name products WHERE id = $id ORDER BY count_views DESC";
        return mysqli_query($this->connect, $query);
    }

    public function requestAllProducts()
    {
        $query = "SELECT * FROM $this->table_name products ORDER BY id DESC";
        return mysqli_query($this->connect, $query);
    }

    public function requestLimitProducts($begin = 0, $limit = 1)
    {
        $query = "SELECT * FROM $this->table_name products ORDER BY id ASC LIMIT $begin, $limit";
        return mysqli_query($this->connect, $query);
    }

    public function displayProducts($result)
    {
        $strHTML = '';
        while ($row = mysqli_fetch_assoc($result)) {

            $strHTML .= '<form method="post" action="cart.php">';
            $strHTML .= '<input type="hidden" name="idProduct" value="' . $row['id'] . '">';
            $strHTML .= '<div class="product"><div>' . $row['name'] . '</div>';
            $strHTML .= '<img src="https://picsum.photos/200/200?random=' . $row['id'] . '" alt="pic_' . $row['id'] . '">';
            $strHTML .= '<p> Цена: ' . $row['price'] . '</p>';
            $strHTML .= '<input type="submit" name="' . $row['id'] . '" value="Купить">';
            $strHTML .= '</div>';
            $strHTML .= '</form>';
        }
        return $strHTML;
    }


    public function getProduct($result)
    {
        return mysqli_fetch_assoc($result);
    }
}

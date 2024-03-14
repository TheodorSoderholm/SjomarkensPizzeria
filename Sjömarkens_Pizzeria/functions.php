<?php

function getProductCategories() {
    global $conn;
    $sql = "SELECT * FROM productcategory";
    $result = mysqli_query($conn, $sql);
    $productCategoryCategories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $productCategoryCategories;
  }

function getProductCategoryId($categoryId) {
    global $conn;
    $sql = "SELECT * FROM product WHERE productcategoryid = $categoryId";
    $result = mysqli_query($conn, $sql);
    $productCategoryId = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $productCategoryId;
}

?>
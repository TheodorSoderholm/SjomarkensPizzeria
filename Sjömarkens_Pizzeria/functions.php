<?php

/* menu */
function getProductCategories()
{
  global $conn;
  $sql = "SELECT * FROM productcategory ORDER BY sortOrder";
  $result = mysqli_query($conn, $sql);
  $productCategories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $productCategories;
}

function getProductsFromCategoryId($categoryId)
{
  global $conn;
  $sql = "SELECT * FROM product WHERE productCategoryId = $categoryId ORDER BY `number`";
  $result = mysqli_query($conn, $sql);
  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

function getProductIdsFromProductIdPC($mainProductId)
{
  global $conn;
  $sql = "SELECT * FROM productcontent WHERE mainProductId = $mainProductId";
  $result = mysqli_query($conn, $sql);
  $productContent = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $productContent;
}

function getNamesFromProductId($productId)
{
  global $conn;
  $sql = "SELECT * FROM product WHERE id = $productId";
  $result = mysqli_query($conn, $sql);
  $productContent = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $productContent;
}

function getProductIdsFromProductIdPV($productId)
{
  global $conn;
  $sql = "SELECT * FROM productvariant WHERE productId = $productId";
  $result = mysqli_query($conn, $sql);
  $productVariants = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $productVariants;
}

/* form */
function getDishes()
{
  global $conn;
  $sql = "SELECT `name` FROM product WHERE `type` = 0";
  $result = mysqli_query($conn, $sql);
  $dishes = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $dishes;
}

/* admin */
function getOrders()
{
  global $conn;
  $sql = "SELECT * FROM simpleorder";
  $result = mysqli_query($conn, $sql);
  $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $orders;
};

function deleteOrder($id)
{
  global $conn;
  $sql = "DELETE FROM simpleorder WHERE id = $id";
  mysqli_query($conn, $sql);

  ///return getOrders();
  //$delete = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //return $delete;
};

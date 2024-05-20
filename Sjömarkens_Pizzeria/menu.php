<?php include('db.php'); ?>
<?php include('functions.php') ?>
<?php $productCategories = getProductCategories(); ?>
<?php $dishes = getDishes(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sjömarkens Pizzeria</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Crete+Round&family=Exo:wght@400;700&family=Merriweather:ital@0;1&family=Work+Sans:wght@400;500;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <script defer src="app.js"></script>
</head>

<body id="body">
  <!-- navbar -->
  <nav class="navbar">
    <div class="container">
      <div id="logo">
        <a href="index.php">
          <img src="images/sjomarkens_pizzeria_logo.svg" alt="Sjömarkens Pizzeria Logga" />
        </a>
      </div>
      <div class="toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
      <ul class="menu">
        <li class="item">
          <a href="index.php" class="links">Hem</a>
        </li>
        <li class="item">
          <a href="menu.php" class="links">Meny</a>
        </li>
        <li class="item">
          <a class="links" onclick="smoothScroll(document.getElementById('footer'))">Kontakt</a>
        </li>
        <li class="item">
          <a data-form-target="#form" class="links">Beställ Online!</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- pop-up form -->
  <div class="form" id="form">
    <form class="form-container" id="form-container" action="post.php" method="POST">
      <div class="top">
        <div class="header">
          <h2>Beställ Online!</h2>
          <div class="gap"></div>
        </div>
        <div class="top-container">
          <button data-close-button type="button" class="close-button">
            <span class="bar"></span>
            <span class="bar"></span>
          </button>
        </div>
      </div>
      <div class="main">
        <div class="dishes">
          <div class="choose-dishes">
            <div class="search-dishes">
              <label>Välj rätt:</label>
              <div class="input-field">
                <div class="autocomplete">
                  <input id="input-dish" type="text" name="input-dish">
                </div>
                <button type="button" class="add">
                  <h5>+</h5>
                </button>

                <script>
                  function autocomplete(inp, arr) {
                    /*the autocomplete function takes two arguments,
                    the text field element and an array of possible autocompleted values:*/
                    var currentFocus;
                    /*execute a function when someone writes in the text field:*/
                    inp.addEventListener("input", function(e) {
                      var a,
                        b,
                        i,
                        val = this.value;
                      /*close any already open lists of autocompleted values*/
                      closeAllLists();
                      if (!val) {
                        return false;
                      }
                      currentFocus = -1;
                      /*create a DIV element that will contain the items (values):*/
                      a = document.createElement("DIV");
                      a.setAttribute("id", this.id + "autocomplete-list");
                      a.setAttribute("class", "autocomplete-items");
                      /*append the DIV element as a child of the autocomplete container:*/
                      this.parentNode.appendChild(a);
                      /*for each item in the array...*/
                      for (i = 0; i < arr.length; i++) {
                        /*check if the item starts with the same letters as the text field value:*/
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                          /*create a DIV element for each matching element:*/
                          b = document.createElement("DIV");
                          /*make the matching letters bold:*/
                          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                          b.innerHTML += arr[i].substr(val.length);
                          /*insert a input field that will hold the current array item's value:*/
                          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                          /*execute a function when someone clicks on the item value (DIV element):*/
                          b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                                (or any other open lists of autocompleted values:*/
                            closeAllLists();
                          });
                          a.appendChild(b);
                        }
                      }
                    });
                    /*execute a function presses a key on the keyboard:*/
                    inp.addEventListener("keydown", function(e) {
                      var x = document.getElementById(this.id + "autocomplete-list");
                      if (x) x = x.getElementsByTagName("div");
                      if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                          increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                      } else if (e.keyCode == 38) {
                        //up
                        /*If the arrow UP key is pressed,
                          decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                      } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                          /*and simulate a click on the "active" item:*/
                          if (x) x[currentFocus].click();
                        }
                      }
                    });

                    function addActive(x) {
                      /*a function to classify an item as "active":*/
                      if (!x) return false;
                      /*start by removing the "active" class on all items:*/
                      removeActive(x);
                      if (currentFocus >= x.length) currentFocus = 0;
                      if (currentFocus < 0) currentFocus = x.length - 1;
                      /*add class "autocomplete-active":*/
                      x[currentFocus].classList.add("autocomplete-active");
                    }

                    function removeActive(x) {
                      /*a function to remove the "active" class from all autocomplete items:*/
                      for (var i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                      }
                    }

                    function closeAllLists(elmnt) {
                      /*close all autocomplete lists in the document,
                      except the one passed as an argument:*/
                      var x = document.getElementsByClassName("autocomplete-items");
                      for (var i = 0; i < x.length; i++) {
                        if (elmnt != x[i] && elmnt != inp) {
                          x[i].parentNode.removeChild(x[i]);
                        }
                      }
                    }
                    /*execute a function when someone clicks in the document:*/
                    document.addEventListener("click", function(e) {
                      closeAllLists(e.target);
                    });

                    /* adds dish as element in html when click on add */
                    const arrayDishes = [];
                    var index = 0;
                    var addDish = document.querySelector(".add");


                    addDish.addEventListener("click", function() {
                      const containsDish = dishes.find(dish => dish.toUpperCase() == inp.value.toUpperCase());
                      if (!containsDish) {
                        alert("Välj en rätt som finns på menyn");
                        return;
                      } else {
                        const id = index++;
                        var dishDisplayed = `<div class="dish-displayed" id="${id}"><h5>${inp.value}</h5><input type="hidden" name="input-dishes[${id}]" value="${inp.value}" /><button type="button" class="remove-button"><h6>-</h6></button></div>`;
                        document.getElementById("display-dishes").insertAdjacentHTML("beforeend", dishDisplayed);
                        arrayDishes.push({
                          id: id,
                          value: inp.value
                        });

                        /* tillfällig */
                        console.log(arrayDishes);

                        removeDishFunction(id);
                      }
                    });

                    function removeDishFunction(id) {
                      var removeElement = document.getElementById(id);
                      var removeDish = removeElement.querySelector('.remove-button');

                      if (removeDish.addEventListener) {
                        removeDish.addEventListener("click", function() {
                          removeDish.parentNode.remove();
                          arrayDishes.splice(arrayDishes.indexOf(id), 1);

                          /* tillfällig */
                          console.log(arrayDishes);

                        });
                      }
                    }
                  }

                  /*array with all dishes*/
                  var dishes = [
                    <?php
                    $last = count($dishes) - 1;
                    $i = 0;
                    foreach ($dishes as $dish) {
                      echo '"' . $dish['name'] . '"';
                      if ($i < $last) {
                        echo ',';
                      }
                      $i++;
                    }
                    ?>
                  ];

                  autocomplete(document.getElementById("input-dish"), dishes);
                </script>
              </div>
            </div>
            <div class="open_menu">
              <a href="menu.php" target="_blank">Öppna menyn<i class="bi bi-box-arrow-up-right"></i></a>
            </div>
          </div>
          <div class="display-dishes" id="display-dishes">
          </div>
        </div>
        <div class="bottom">
          <div class="comment">
            <div class="comment-label">
              <label for="input-comment">Övrig kommentar till bagaren:</label>
            </div>
            <textarea id="input-comment" name="input-comment" placeholder="Valfri kommentar..." rows="4"></textarea>
          </div>
          <div class="submit-container">
            <div class="gap-top"></div>
            <div class="button-container">
              <div class="gap-left"></div>
              <div class="button">
                <button data-receipt-target="#receipt" type="submit" name="submit" value="submit" class="submit">
                  <h3>Beställ!</h3>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="receipt" id="receipt">
      <div class="receipt-container">
        <div class="header">
          <h2>Tack för din beställning!</h2>
        </div>
        <div class="content">
          <div class="summary">
            <div class="order-summary"></div>
            <div class="price">
              <p></p>
            </div>
          </div>
          <div class="time" id="time"></div>
        </div>
      </div>
    </div>
  </div>
  <div id="overlay"></div>

  <!-- menu -->
  <main>
    <div class="top-image">
      <img id="top-image" src="images/pizza_image.jpg" alt="Pizza-bild" />
      <div class="title">
        <h1>Meny</h1>
      </div>
    </div>

    <div class="food-menu">

      <!-- echo out name of product categories -->
      <?php foreach ($productCategories as $category) : ?>
        <h3 id="<?php echo $category['name']; ?>">
          <?php echo $category['name']; ?>
        </h3>
        <ul>
          <?php $products = getProductsFromCategoryId($category['id']); ?>
          <?php foreach ($products as $product) : ?>
            <li>
              <div class="item">
                <div class="food-sort">
                  <h5>
                    <!-- echo out number and name of dishes -->
                    <?php echo $product['number'], '. ', $product['name']; ?>
                  </h5>
                </div>
                <div class="content">
                  <h5>
                    <!-- echo out name of ingredients -->
                    <?php $productContent = getProductIdsFromProductIdPC($product['id']); ?>
                    <?php foreach ($productContent as $productContent) : ?>
                      <?php $names = getNamesFromProductId($productContent['productId']); ?>
                      <?php foreach ($names as $name) : ?>
                        <?php echo $name['name'] . ', '; ?>
                      <?php endforeach ?>
                    <?php endforeach ?>
                    <?php echo '<br />' ?>
                    <!-- echo out descriptions -->
                    <?php echo $product['productDescription']; ?>
                  </h5>
                  <h5 class="price">
                    <!-- echo out prices -->
                    <?php $productVariants = getProductIdsFromProductIdPV($product['id']); ?>
                    <?php foreach ($productVariants as $productVariant) : ?>
                      <?php echo $productVariant['price'] . ":-"; ?>
                    <?php endforeach ?>
                  </h5>
                </div>
              </div>
            </li>
          <?php endforeach ?>
        </ul>
      <?php endforeach ?>
    </div>
  </main>

  <!-- footer -->
  <div class="footer" id="footer">
    <div class="item">
      <h2>Sjömarkens Pizzeria</h2>
      <div class="content">
        <i class="bi bi-geo-alt"></i>
        <div>
          <p>Göteborgsvägen 26</p>
          <p>51840 Sjömarken</p>
        </div>
      </div>
    </div>
    <div class="item">
      <h2>Öppet</h2>
      <div class="content">
        <i class="bi bi-clock"></i>
        <div>
          <p>Måndag-Fredag</p>
          <p>Lördag, Söndag</p>
        </div>
        <div>
          <p>11:00-21:00</p>
          <p>12:00-21:00</p>
        </div>
      </div>
    </div>
    <div class="item">
      <h2>Kontakt</h2>
      <div class="content">
        <i class="bi bi-telephone"></i>
        <div>
          <p>033-120080</p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
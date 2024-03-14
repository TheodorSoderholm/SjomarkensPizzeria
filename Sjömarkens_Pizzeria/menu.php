<?php include('db.php'); ?>
<?php include('functions.php') ?>
<?php $productCategoryCategories = getProductCategories(); ?>

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

<body>
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
    <form class="container">
      <button data-close-button class="close-button"></button>
    </form>
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
      <!-- While loop för varje produktkategori. Sedan foreach loop för varje produktkategori och while loop för varje product med type 0 (rätt). Foreach loop för varje rätt och printa ut product content och price. -->
      <table>
        <?php foreach ($productCategoryCategories as $category) : ?>
          <h3 id="<?php echo $category['name']; ?>">
            <?php echo $category['name'] . '<br>'; ?>
          </h3>
          <?php $productCategories = getProductCategoryId($category['id']); ?>
          <?php foreach ($productCategories as $productCategory) : ?>
            <?php echo $productCategory['name'] . '<br>'; ?>
          <?php endforeach ?>
        <?php endforeach ?>
      </table>


      <!--
      <h3 id="pizza">Pizza</h3>
      <ol>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Margerita</h5>
            </div>
            <div class="content">
              <h5>Tomat, Ost</h5>
              <h5 class="price">100:- / 250:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Vesuvio</h5>
            </div>
            <div class="content">
              <h5>Skinka</h5>
              <h5 class="price">105:- / 255:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Capricciosa</h5>
            </div>
            <div class="content">
              <h5>Skinka, Champinjoner</h5>
              <h5 class="price">110:- / 260:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Tomasso</h5>
            </div>
            <div class="content">
              <h5>Skinka, Räkor</h5>
              <h5 class="price">120:- / 275:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Funghi</h5>
            </div>
            <div class="content">
              <h5>Champinjoner</h5>
              <h5 class="price">110:- / 260:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Calzone (inbakad)</h5>
            </div>
            <div class="content">
              <h5>Skinka</h5>
              <h5 class="price">120:- / 165:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Roma</h5>
            </div>
            <div class="content">
              <h5>Tonfisk, Champinjoner, Paprika</h5>
              <h5 class="price">125:- / 265:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Pecatore</h5>
            </div>
            <div class="content">
              <h5>Räkor, Tonfisk</h5>
              <h5 class="price">125:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Marinara</h5>
            </div>
            <div class="content">
              <h5>Räkor, Musslor</h5>
              <h5 class="price">125:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Bandy</h5>
            </div>
            <div class="content">
              <h5>Lök, Bacon, Champinjoner, Kebabsås</h5>
              <h5 class="price">120:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Blecko</h5>
            </div>
            <div class="content">
              <h5>Champinjoner, Räkor</h5>
              <h5 class="price">120:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Salami</h5>
            </div>
            <div class="content">
              <h5>Salami, Svarta oliver, Lök, Vitlök</h5>
              <h5 class="price">120:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Corallo</h5>
            </div>
            <div class="content">
              <h5>Bacon, Lök, Paprika</h5>
              <h5 class="price">120:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Marco Polo</h5>
            </div>
            <div class="content">
              <h5>
                Soltorkade tomater, Svarta oliver, Fetaost, Vitlök, Ruccola
              </h5>
              <h5 class="price">125:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Hawaii</h5>
            </div>
            <div class="content">
              <h5>Skinka, Ananas</h5>
              <h5 class="price">110:- / 260:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Verona</h5>
            </div>
            <div class="content">
              <h5>Champinjoner, Paprika, Kebabsås</h5>
              <h5 class="price">120:- / 260:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Napoli</h5>
            </div>
            <div class="content">
              <h5>Skinka, Champinjoner, Bacon, Lök</h5>
              <h5 class="price">125:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Bahamas</h5>
            </div>
            <div class="content">
              <h5>Skinka, Räkor, Ananas</h5>
              <h5 class="price">125:- / 275:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Quattro Staggione</h5>
            </div>
            <div class="content">
              <h5>Skinka, Räkor, Champinjoner, Musslor, Kronärtskocka</h5>
              <h5 class="price">130:- / 280:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Jamaica</h5>
            </div>
            <div class="content">
              <h5>Skinka, Champinjoner, Räkor</h5>
              <h5 class="price">125:- / 275:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Vegetariana</h5>
            </div>
            <div class="content">
              <h5>Lök, Paprika, Champinjoner, Ananas, Kronärtskocka</h5>
              <h5 class="price">120:- / 270:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Azteka</h5>
            </div>
            <div class="content">
              <h5>Skinka, Tacokrydda, Jalapeños, Salsa, Lök</h5>
              <h5 class="price">120:- / 265:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Husets Special</h5>
            </div>
            <div class="content">
              <h5>Skinka, Räkor, Champinjoner, Tonfisk</h5>
              <h5 class="price">130:- / 275:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Frutti di Mare</h5>
            </div>
            <div class="content">
              <h5>Musslor, Tonfisk, Räkor, Marinerad vitlök, Kräftsjärtar</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Shalom Special</h5>
            </div>
            <div class="content">
              <h5>Skinka, Räkor, Lök, Paprika</h5>
              <h5 class="price">130:- / 275:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Africana</h5>
            </div>
            <div class="content">
              <h5>Kyckling, Banan, Ananas, Curry</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kyckling Pizza</h5>
            </div>
            <div class="content">
              <h5>Kyckling, Champinjoner, Lök, Kebabsås</h5>
              <h5 class="price">125:- / 280:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Palermo</h5>
            </div>
            <div class="content">
              <h5>Köttfärs, Lök</h5>
              <h5 class="price">125:- / 275:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Amigo</h5>
            </div>
            <div class="content">
              <h5>Köttfärs, Champinjoner, Paprika</h5>
              <h5 class="price">130:- / 285:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Mexicana</h5>
            </div>
            <div class="content">
              <h5>Köttfärs, Jalapeños, Tacokrydda, Lök</h5>
              <h5 class="price">130:- / 285:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Alicia Special</h5>
            </div>
            <div class="content">
              <h5>Köttfärs, Lök, Bacon</h5>
              <h5 class="price">130:- / 285:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Primo</h5>
            </div>
            <div class="content">
              <h5>Köttfärs, Gorgonzola, Jalapeños</h5>
              <h5 class="price">130:- / 285:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Ciao Ciao (inbakad)</h5>
            </div>
            <div class="content">
              <h5>Fläskfilé, Vitlök, Champinjoner</h5>
              <h5 class="price">130:- / 190:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>La Maffia</h5>
            </div>
            <div class="content">
              <h5>Skinka, Fläskfilé, Bearnaisesås</h5>
              <h5 class="price">130:- / 285:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Gourmet</h5>
            </div>
            <div class="content">
              <h5>Fläskfilé, Champinjoner, Bearnaisesås</h5>
              <h5 class="price">130:- / 285:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Tre Kronor</h5>
            </div>
            <div class="content">
              <h5>Gorgonzola, Lök, Champinjoner, Oxfilé</h5>
              <h5 class="price">135:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Celine Special</h5>
            </div>
            <div class="content">
              <h5>Oxfilé, Lök, Champinjoner, Bearnaisesås</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Victoria</h5>
            </div>
            <div class="content">
              <h5>Oxfilé, Ägg, Champinjoner, Bearnaisesås</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Costini</h5>
            </div>
            <div class="content">
              <h5>Fläskfilé, Oxfilé, Skinka, Vitlök, Bearnaisesås</h5>
              <h5 class="price">135:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Sjömarkens Special</h5>
            </div>
            <div class="content">
              <h5>Kebabkött, Skinka, Rå lök, Kebabsås</h5>
              <h5 class="price">130:- / 285:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Baro</h5>
            </div>
            <div class="content">
              <h5>Kebabkött, Skinka, Ananas, Kebabsås</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Jacob Special</h5>
            </div>
            <div class="content">
              <h5>Kebabkött, Bacon, Pepperoni, Kebabsås</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Gorby</h5>
            </div>
            <div class="content">
              <h5>Kebabkött, Champinjoner, Rå lök, Kebabsås</h5>
              <h5 class="price">125:- / 280:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kebabpizza</h5>
            </div>
            <div class="content">
              <h5>Kebabkött, Champinjoner, Lök, Kebabsås</h5>
              <h5 class="price">125:- / 280:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kebab Special</h5>
            </div>
            <div class="content">
              <h5>
                Kebabkött, Isbergssallat, Gurka, Rödlök, Tomat, Kebabsås
              </h5>
              <h5 class="price">135:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Batman</h5>
            </div>
            <div class="content">
              <h5>Kebabkött, Skinka, Pommes, Kebabsås</h5>
              <h5 class="price">135:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Pollo</h5>
            </div>
            <div class="content">
              <h5>Mozzarella, Kyckling, Soltorkade tomater, Ruccola</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Italiano</h5>
            </div>
            <div class="content">
              <h5>Mozzarella, Parmaskinka, Oliver, Ruccola</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Quattro Formaggi</h5>
            </div>
            <div class="content">
              <h5>Mozzarella, Ost, Gorgonzola, Parmesan</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Napolitana</h5>
            </div>
            <div class="content">
              <h5>Mozzarella, Sardeller, Vitlök, Oliver</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Enzo</h5>
            </div>
            <div class="content">
              <h5>Mozzarella, Kronärtskocka, Kyckling, Fetaost, Ruccola</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Figaro</h5>
            </div>
            <div class="content">
              <h5>Mozzarella, Salami, Soltorkade tomater</h5>
              <h5 class="price">130:- / 290:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Brödernas</h5>
            </div>
            <div class="content">
              <h5>
                Mozzarella, Oxfilé, Tomater, Paprika, Lök, Bearnaisesås,
                Jalapeños, Räkor, Champinjoner
              </h5>
              <h5 class="price">150:- / 340:-</h5>
            </div>
          </div>
        </li>
      </ol>
      <h3 id="pan_pizza">Pan pizza</h3>
      <ul>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>New York</h5>
            </div>
            <div class="content">
              <h5>Tomat, Ost, Champinjoner, Lök, Kebabkött, Kebabsås</h5>
              <h5 class="price">120:- / 210:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Brooklyn</h5>
            </div>
            <div class="content">
              <h5>Tomat, Ost, Champinjoner, Kyckling, Lök, Kebabsås</h5>
              <h5 class="price">120:- / 210:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Florida</h5>
            </div>
            <div class="content">
              <h5>Tomat, Ost, Champinjoner, Oxfilé, Jalapeños</h5>
              <h5 class="price">120:- / 210:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Dallas</h5>
            </div>
            <div class="content">
              <h5>Tomat, Ost, Champinjoner, Lök, Fläskfilé</h5>
              <h5 class="price">120:- / 210:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Lousiana</h5>
            </div>
            <div class="content">
              <h5>
                Tomat, Ost, Pepperonikorv, Fetaost, Paprika, Oliver, Lök
              </h5>
              <h5 class="price">120:- / 210:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Texas</h5>
            </div>
            <div class="content">
              <h5>Tomat, Ost, Räkor, Skinka, Paprika, Oliver, Lök</h5>
              <h5 class="price">120:- / 210:-</h5>
            </div>
          </div>
        </li>
      </ul>
      <h3 id="kebab">Kebab</h3>
      <ul>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Rhodestallrik</h5>
            </div>
            <div class="content">
              <h5>
                Isbergssallat, Gurka, Tomat, Lök, Ananas, Fetaost, Kebabkött,
                Kebabsås
              </h5>
              <h5 class="price">135:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Grekisk Kebab</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Kebabkött, Sallat, Gurka, Tomat, Fetaost, Kebabsås
              </h5>
              <h5 class="price">125:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Hawaii</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Kebabkött, Sallat, Gurka, Tomat, Lök, Ananas, Kebabsås
              </h5>
              <h5 class="price">125:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kebabrulle</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Isbergssallat, Gurka, Tomat, Lök, Kebabkött, Kebabsås
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kebab</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Isbergssallat, Gurka, Tomat, Lök, Kebabkött, Kebabsås
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kebabtallrik</h5>
            </div>
            <div class="content">
              <h5>
                Isbergssallat, Gurka, Tomat, Lök, Kebabkött, Pommes, Kebabsås
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
      </ul>
      <h3 id="kyckling">Kyckling</h3>
      <ul>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kycklingrulle</h5>
            </div>
            <div class="content">
              <h5>Isbergssallat, Gurka, Tomat, Lök, Kyckling, Kebabsås</h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kyckling</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Isbergssallat, Gurka, Tomat, Lök, Kyckling, Kebabsås
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kycklingtallrik</h5>
            </div>
            <div class="content">
              <h5>
                Isbergssallat, Gurka, Tomat, Lök, Kyckling, Pommes, Kebabsås
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
      </ul>
      <h3 id="vegetariskt">Vegetariskt</h3>
      <ul>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Falafel</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Isbergssallat, Gurka, Tomat, Lök, Falafel, Kebabsås
              </h5>
              <h5 class="price">115:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Falafelrulle</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Isbergssallat, Gurka, Tomat, Lök, Falafel, Kebabsås
              </h5>
              <h5 class="price">115:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Falafeltallrik</h5>
            </div>
            <div class="content">
              <h5>
                Isbergssallat, Gurka, Tomat, Lök, Falafel, Pommes, Kebabsås
              </h5>
              <h5 class="price">115:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Vegetarisk Rulle</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Isbergssallat, Gurka, Tomat, Ananas, Lök, Kebabsås
              </h5>
              <h5 class="price">115:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Räkrulle</h5>
            </div>
            <div class="content">
              <h5>
                Bröd, Isbergssallat, Gurka, Tomat, Ananas, Lök, Champinjoner,
                Räkor, Ost, Kebabsås
              </h5>
              <h5 class="price">135:-</h5>
            </div>
          </div>
        </li>
      </ul>
      <h3 id="sallad">Sallad</h3>
      <ul>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Amerikansk Sallad</h5>
            </div>
            <div class="content">
              <h5>
                Isbergssallat, Gurka, Tomat, Ost, Ananas, Skinka, Kebabsås
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Hawaii Sallad</h5>
            </div>
            <div class="content">
              <h5>Isbergssallat, Skinka, Ananas, Räkor, Gurka, Majs, Sås</h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Bohus Sallad</h5>
            </div>
            <div class="content">
              <h5>
                Isbergssallat, Räkor, Tonfisk, Musslor, Tomat, Gurka, Sås
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Grekisk Sallad</h5>
            </div>
            <div class="content">
              <h5>
                Isbergssallat, Fetaost, Svarta oliver, Paprika, Majs, Tomat,
                Gurka, Sås
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Räksallad</h5>
            </div>
            <div class="content">
              <h5>Isbergssallat, Räkor, Ägg, Majs, Tomat, Gurka, Sås</h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kycklingsallad</h5>
            </div>
            <div class="content">
              <h5>Isbergssallat, Kyckling, Majs, Ananas, Sås</h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Kebabsallad</h5>
            </div>
            <div class="content">
              <h5>Isbergssallat, Tomat, Gurka, Lök, Kebabkött, Kebabsås</h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
      </ul>
      <h3 id="pasta">Pasta</h3>
      <ul>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Pasta Fläskfilé</h5>
            </div>
            <div class="content">
              <h5>Fläskfilé, Champinjoner, Grönsaker, Gräddsås</h5>
              <h5 class="price">130:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Pasta Kyckling</h5>
            </div>
            <div class="content">
              <h5>Kyckling, Grönsaker, Gräddsås</h5>
              <h5 class="price">130:-</h5>
            </div>
          </div>
        </li>
      </ul>
      <h3 id="à_la_carte">À la carte</h3>
      <ul>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Hamburgare Special</h5>
            </div>
            <div class="content">
              <h5>
                150g, Bröd, Sallat, Tomat, Gurka, Lök, Dressing, Bacon,
                Pommes, Ost
              </h5>
              <h5 class="price">120:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Dubbel Hamburgare Special</h5>
            </div>
            <div class="content">
              <h5>
                300g, Bröd, Sallat, Tomat, Gurka, Lök, Dressing, Bacon,
                Pommes, Ost
              </h5>
              <h5 class="price">140:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Panerad Fisk</h5>
            </div>
            <div class="content">
              <h5>Panerad fisk, Pommes, Remouladsås</h5>
              <h5 class="price">150:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Schnitzel</h5>
            </div>
            <div class="content">
              <h5>Schnitzel, Pommes, Bearnaisesås</h5>
              <h5 class="price">150:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Hamburgertallrik</h5>
            </div>
            <div class="content">
              <h5>90g/150g, Sallat, Tomat, Gurka, Lök, Dressing, Pommes</h5>
              <h5 class="price">95:- / 105:-</h5>
            </div>
          </div>
        </li>
        <li>
          <div class="item">
            <div class="food-sort">
              <h5>Nuggets</h5>
            </div>
            <div class="content">
              <h5>4/8 bitar, Pommes, Tomat, Sallat, Gurka, Dressing</h5>
              <h5 class="price">80:- / 105:-</h5>
            </div>
          </div>
        </li>
      </ul>
      -->
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
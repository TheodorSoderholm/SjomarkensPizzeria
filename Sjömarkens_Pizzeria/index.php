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
  <script defer src="app.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
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
      <button class="toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>
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
    <!-- skickar "onsubmit" fortfarande datan? -->
    <form class="form-container" id="form-container">
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
            <label>Välj rätt:</label>
            <div class="input-field">
              <input type="search" id="input-dish" name="input-dish" autocomplete="off">
              <button type="button" class="add">
                <h5>+</h5>
              </button>
            </div>
          </div>
          <div class="display-dishes" id="display-dishes">
            <!-- Lägg till ändra beställning, kunna lägga till ingredienser, gf botten och stor portion eller vanlig -->
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
                <button data-receipt-target="#receipt" type="submit" value="submit" class="submit">
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

  <!-- home page -->
  <main>
    <div class="background-image">
      <img id="background-image" src="images/pizza_background.jpg" alt="Pizza-bakgrund" />
      <div class="container">
        <div class="welcome-message">
          <h1>
            Välkommen till <br />
            Sjömarkens Pizzeria!
          </h1>
        </div>
      </div>
    </div>

    <div class="information">
      <h1>Om Oss.</h1>
      <div class="content">
        <p>
          Välkommen till en mysig pizzeria i Sjömarken! <br />
          Vi serverar Pizza, PanPizza, Falafel, Sallader och Kebabrätter, både
          på plats och som take away. <br />
          På vardagar serverar vi lunch: pizza, kebab eller sallad. <br />
          Alla våra pizzor har tomatsås och ost. Du kan få glutenfri pizza för
          15:- extra, vid övrig allergi, fråga oss vid beställning.
        </p>
      </div>
    </div>

    <div class="menus">
      <h1>Menyer</h1>
      <div class="container">
        <a href="menu.php#Pizza" class="item">Pizza</a>
        <a href="menu.php#Pan Pizza" class="item">Pan Pizza</a>
        <a href="menu.php#Kebab" class="item">Kebab</a>
        <a href="menu.php#Kyckling" class="item">Kyckling</a>
        <a href="menu.php#Vegetariskt" class="item">Vegetariskt</a>
        <a href="menu.php#Sallad" class="item">Sallad</a>
        <a href="menu.php#Pasta" class="item">Pasta</a>
        <a href="menu.php#À la Carte" class="item">À la Carte</a>
      </div>
    </div>

    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8524.186928016992!2d12.816245208904306!3d57.715663919251924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4650082686234781%3A0x2839eaa471ad8aad!2zR8O2dGVib3Jnc3bDpGdlbiAyNiwgNTE4IDQwIFNqw7ZtYXJrZW4!5e0!3m2!1ssv!2sse!4v1702546548402!5m2!1ssv!2sse" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<?php
    include_once 'sessionStart.php';
    include_once 'header.php';
    require_once 'includes/component.php';

    if (isset($_POST['add'])) {
        if (isset($_SESSION['cart'])) {

            $book_array_id = array_column($_SESSION['cart'], 'bookID');

            if (in_array($_POST['bookID'], $book_array_id)) {
                echo "<script>alert('Product already in the cart...')</script>";
                echo "<script>window.location = 'index.php'</script>";
            } else {
                $count = count($_SESSION['cart']);
                $book_array = array(
                    'bookID' => $_POST['bookID']
                );
                $_SESSION['cart'][$count] = $book_array;
            }

        } else {
            $book_array = array(
                    'bookID' => $_POST['bookID']
            );
        }

        $_SESSION['cart'][0] = $book_array;
    }
?>

<body>

    <!-- header section starts  -->

    <header class="header">
        <a href="#" class="logo" style="text-decoration: none"> <i class="fas fa-book"></i> bookly </a>
        <form class="search-form">
            <input type="search" placeholder="search here..." id="search-box" />
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <nav>
            <div class="icons">
                <a href="#" class="fas fa-heart" style="text-decoration: none"></a>
                <a href="shoppingCart.php" class="fas fa-shopping-cart" style="text-decoration: none"></a>
                <?php
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<span id='cart_count'>$count</span>";
                    } else {
                        echo "<span id='cart_count'>0</span>";
                    }
                ?>
                <?php
                    if (isset($_SESSION["userID"])) {
                        echo "<a href='includes/logout.inc.php' class='fa-regular fa-circle' style='text-decoration: none'></a>";
                    } else {
                        echo "<a href='login.php' id='login-btn' class='fas fa-user' style='text-decoration: none'></a>";
                    }
                ?>
            </div>
        </nav>
    </header>

    <!-- header section ends -->

    <!--    login form   -->

    <!-- create account form -->

    <!-- home section starts  -->

    <section class="home">
      <div class="row">
        <div class="content">
          <h3>up to 75% off</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam
            deserunt nostrum accusamus. Nam alias sit necessitatibus, aliquid ex
            minima at!
          </p>
          <a href="#" class="btn" style="text-decoration: none">shop now</a>
        </div>

        <div class="swiper books-slider">
          <div class="swiper-wrapper">
            <a href="#" class="swiper-slide" style="text-decoration: none">
                <button type="submit" name="add">
                <img src="image/1984%20By%20George%20Orwell.jpeg" alt=""/>
                </button>
            </a>
            <a href="#" class="swiper-slide" style="text-decoration: none">
                <button type="submit" name="add">
                    <img src="image/Crime%20and%20Punishment.jpeg" alt=""/>
                </button>
            </a>
            <a href="#" class="swiper-slide" style="text-decoration: none">
                <button type="submit" name="add">
                    <img src="image/Dune%20by%20Frank%20Herbert.jpg" alt=""/>
                </button>
            </a>
            <a href="#" class="swiper-slide" style="text-decoration: none">
                <button type="submit" name="add">
                    <img src="image/Moby%20Dick%20by%20Herman%20Melville.jpeg" alt=""/>
                </button>
            </a>
            <a href="#" class="swiper-slide" style="text-decoration: none">
                <button type="submit" name="add">
                    <img src="image/Red%20Dragon%20by%20Thomas%20Harris.jpeg" alt=""/>
                </button>
            </a>
            <a href="#" class="swiper-slide" style="text-decoration: none">
                <button type="submit" name="add">
                    <img src="image/The%20Hunting%20Party%20by%20Lucy%20Foley.jpeg" alt=""/>
                </button>
            </a>
          </div>
          <img src="image/stand.png" class="stand" alt="" />
        </div>
      </div>
    </section>

    <!-- home section ends  -->

    <!-- arrivals section starts  -->

    <section class="arrivals">
      <h1 class="heading"><span>New Arrivals</span></h1>

      <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">

          <?php
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';

            $result = getData($conn);
            while ($row = mysqli_fetch_assoc($result)) {
                bookTemplate($row['productName'], $row['productPrice'], $row['productImage'], $row['id']);
            }
          ?>

        </div>
      </div>
    </section>

    <!-- arrivals section ends -->

    <!-- footer section starts  -->

    <section class="footer">
      <div class="box-container">
        <div class="box">
          <h3>contact info</h3>
          <a href="#" style="text-decoration: none"> <i class="fas fa-phone"></i> +40-731-948-639 </a>
          <a href="#" style="text-decoration: none">
            <i class="fas fa-envelope"></i> motococtavian71@gmail.com
          </a>
        </div>

        <div class="box">
          <h3>Location</h3>
          <img src="image/stuttgart_mapp.jpeg" class="map" alt="" />
        </div>
      </div>

      <div class="media_icons">
        <a
          href="https://www.facebook.com/pages/Stuttgart-Public-Library/406837546044607"
          class="fab fa-facebook-f" style="text-decoration: none"
        ></a>
        <a
          href="https://twitter.com/hashtag/stuttgartlibrary?src=hash"
          class="fab fa-twitter" style="text-decoration: none"
        ></a>
        <a
          href="https://www.instagram.com/p/CCqupvap_dq/"
          class="fab fa-instagram" style="text-decoration: none"
        ></a>
        <a
          href="https://archello.com/project/the-new-municipal-library-in-stuttgart-2"
          class="fab fa-wikipedia-w" style="text-decoration: none"
        ></a>
        <a
          href="https://ro.pinterest.com/search/pins/?rs=ac&len=2&q=stuttgart%20bibliothek&eq=stuttgart%20bibl&etslf=12821&term_meta[]=stuttgart%7Cautocomplete%7C0&term_meta[]=bibliothek%7Cautocomplete%7C0"
          class="fab fa-pinterest" style="text-decoration: none"
        ></a>
      </div>
    </section>

    <!-- footer section ends -->

    <?php
        include_once 'footer.php';
    ?>


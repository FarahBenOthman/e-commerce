<?php
include 'connect.php';
session_start();
$admin_id=$_SESSION['user_name'];

if(!isset($admin_id)){
    header('location:login.php');
}
if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');
}
?>
<style type="text/css">
    <?php
     include 'main.css';
    ?>
</style>


<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Styles pour le carrousel */
        .testimonial-fluid {
            text-align: center;
            padding: 20px;
        }

        .testimonial-slider {
            display: flex;
            overflow: hidden;
            margin: 0 -20px;
        }

        .testimonial-item {
            flex: 0 0 33.33%;
            padding: 0 20px;
            transition: transform 0.5s ease-in-out;
        }

        .testimonial-item img {
            max-width: 50%;
            border-radius: 50%;
            margin: 25px;
        }

        .testimonial-caption {
            background: #f8f8f8;
            padding: 11px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .controls {
            text-align: center;
            margin-top: 20px;
        }
    </style>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    



    

    
    <title>Admin Pannel</title>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container-fluid">
    <div class="hero-slider">
        <div class="slider-item">
           <img src="img/slider.jpg" />
           <div class="slider-caption">
               <span>Test the quality</span>
               <h1>Good products !</h1>
               <p>Enjoy shopping, we have many products of the year.</p>
                 <a href="shop.php" class="btn">Shop now</a>
           </div>
        </div>

        <div class="slider-item">
           <img src="img/slider3.jpg" />
           <div class="slider-caption">
               <span>Test the quality</span>
               <h1>Good products !</h1>
               <p>Enjoy shopping, we have many products of the year.</p>
                 <a href="shop.php" class="btn">Shop now</a>
           </div>
        </div>

    </div>


    <div class="controls">
        <i class="bi bi-chevron-left prev"></i>
        <i class="bi bi-chevron-right next"></i>
    </div>
</div>

<!--<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slider.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>-->

<div class="line"></div>
<div class="services">
    <div class="row">
        <div class="box">
            <img src="img/.png">
            <div>
            <h1>Free Shipping Fast</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>

        <div class="box">
            <img src="img/.png">
            <div>
            <h1>Money Back & Guarantee</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>

        <div class="box">
            <img src="img/.png">
            <div>
            <h1>Online Support 24/7</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</div>
<div class="line2"></div>
<div class="story">
    <div class="row">
        <div class="box">
            <span>Our story</span>
            <h1>Certified products</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="shop.php" class="btn">Shop now</a>
        </div>
          <div class="box">
            <img src="img/">
          </div>
    </div>
</div>
<div class="line3"></div>

<div class="testimonial-fluid">
    <h1 class="title">What our customers say's</h1>
    <div class="testimonial-slider">
        <div  class="testimonial-item">
            <img src="img/0.png">
            <div class="testimonial-caption">
                <span>Test the quality</span>
                <h1>Organic premimum</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Ab, ratione, ipsam quis dolorem voluptat</p>

            </div>

        </div>

       <div  class="testimonial-item">
            <img src="img/1.png">
            <div class="testimonial-caption">
                <span>the quality</span>
                <h1>Organic premimum</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Ab, ratione, ipsam quis dolorem voluptat</p>

            </div>

        </div>

        <div  class="testimonial-item">
            <img src="img/0.png">
            <div class="testimonial-caption">
                <span>quality</span>
                <h1>Organic premimum</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Ab, ratione, ipsam quis dolorem voluptat</p>

            </div>

        </div>
    </div>

    <div class="controls">
        <i class="bi bi-chevron-left prev1"></i>
        <i class="bi bi-chevron-right next1"></i>
    </div>

</div>
<div class="line4"></div>
<?php include 'footer.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>

<!--<script>
        const testimonialSlider = document.querySelector('.testimonial-slider');
        const testimonialItems = document.querySelectorAll('.testimonial-item');
        const prevButton = document.querySelector('.prev1');
        const nextButton = document.querySelector('.next1');
        let currentIndex = 0;

        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateTestimonialSlider();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentIndex < testimonialItems.length - 1) {
                currentIndex++;
                updateTestimonialSlider();
            }
        });

        function updateTestimonialSlider() {
            const itemWidth = testimonialItems[0].offsetWidth;
            const offset = -currentIndex * itemWidth;
            testimonialSlider.style.transform = `translateX(${offset}px)`;
        }
    </script>-->

</body>
</html>
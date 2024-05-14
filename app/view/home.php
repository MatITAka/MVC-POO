<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
<section class="hero py-3 bg-primary text-white text-center">
    <div class="container">
        <h1>Welcome <?php echo $_SESSION['username'] ?? 'new user'; ?></h1>
        <p>Discover our amazing services and features</p>
    </div>
</section>

<!-- About Section -->
<section class="py-5 hero text-center">
    <div class="container">
        <h2>About Us</h2>
        <a class=" btn btn-primary" href="/about">Learn more about us</a>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="bg-light py-5">
    <div class="container py-3">
        <h2 class="text-center mb-3">Our Services</h2>
        <div class="row">
            <div class="col-md-4">
                <h4>Service 1</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="col-md-4">
                <h4>Service 2</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="col-md-4">
                <h4>Service 3</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </div>
</section>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="../../public/images/4_COUNTY-COURT-HOUSE_NEW-YORK_HAUTEVILLE_1-500x333.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
            <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>
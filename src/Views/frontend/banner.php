<div id="carouselExample" class="carousel slide container mt-3 ">
    <div class="carousel-inner">
        <?php foreach($banners as $banner){ ?>
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo $banner['image_path']; ?>" alt="First slide">
        </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
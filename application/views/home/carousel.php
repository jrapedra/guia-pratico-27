<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach($myCarousel as $item) {
            $i = $i + 1;
            ?>
            <div class="item <?= $i == 1 ? 'active' : ''; ?>">
                <div class="fill" style="background-image:url('<?=$item['imgUrl']?>');"></div>
                <div class="carousel-caption">
                    <h2><?=$item['caption']?></h2>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

<!-- Script to Activate the Carousel -->
<script>
$('.carousel').carousel({
    interval: 5000 //changes the speed
})
</script>
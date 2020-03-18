<!-- slider Area Start-->
<style>
    .carousel-inner {
        display: block;
        height: 500px;
        box-sizing: border-box;
        overflow:hidden;
 
    }

    .carousel-inner .image__wrapper {
        display: flex;
        justify-content: center;
    }

    .carousel-inner .image__wrapper img {
        object-fit: cover  !important;
        height:auto;
        width: 100% !important;
    }

    @media only screen and (max-width: 768px) {

        .carousel-inner .image__wrapper img {
            margin: auto !important;
            height: 100% !important;
            width: auto !important;
        }
    }
    </style>
<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="">
            <div class="carousel-item active img-fluid">
            <div class="image__wrapper">
                    <!-- <img src="assets/img/gallery/8797.jpg" alt="..."> -->
                    <img src="{{ asset('assets/img/gallery/8797.jpg') }}" alt="...">


                    
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item img-fluid">
            <div class="image__wrapper">
                
                    <!-- <img src="assets/img/gallery/8797.jpg" alt="..."> -->
                    <img src="{{ asset('assets/img/gallery/8797.jpg') }}" alt="...">

                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item img-fluid">
                <div class="image__wrapper">
                    <!-- <img src="assets/img/gallery/8797.jpg" alt="..."> -->
                    <img src="{{ asset('assets/img/gallery/8797.jpg') }}" alt="...">

                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- slider Area End-->
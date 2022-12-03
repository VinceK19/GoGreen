
<div class="list-view-box">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="products-single fix">
                <div class="box-img-hover">
                    <img src="<?= $blog["image"]?>" class="img-fluid img-thumbnail" alt="Image">
                    <div class="mask-icon">
                        <ul>
                            <li><a href="<?= BASE_URL . "blog/post/".$blog["id"]?>" data-toggle="tooltip" data-placement="right" title="View"><i class="far fa-heart"></i></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-eye"></i></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-comments"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
            <div class="why-text full-width" >
                <h4><a class="text-dark pl-0" href="<?= BASE_URL . "blog/post/".$blog["id"]?>"><?= $blog["title"]?></a></h4>
                <p class="text-muted"><i class="fa fa-calendar-alt mr-2"></i> <?= date("F d, Y",$blog["date_created"])?></p>
                <p><?= $blog["preview"]?></p>
            </div>
        </div>
    </div>
</div>
<hr>
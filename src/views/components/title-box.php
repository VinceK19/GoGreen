    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?= $data["title"]?></h2>
                    <ul class="breadcrumb">
                    <?php foreach($data["breadcrumb"] as $item) { ?>
                        <li class=" breadcrumb-item"><a href="<?= $item["link"]?>"><?= $item["name"]?></a></li>
                    <?php }?>
                        <li class="breadcrumb-item active"><?= $data["title"] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
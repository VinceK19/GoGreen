<div class="row">
    <div class="col-4">
        <img class="img-fluid img-thumbnail" src="<?= $blog["image"]?>" alt="" srcset="">
    </div>
    <div class="col-8 pt-3">
        <h3><a href="<?= BASE_URL."blog/post/".$blog["id"]?>"><b><?= substr($blog["title"],0,60)?>...</b></a></h3>
        <p><i class="fa fa-calendar-alt mr-2"></i> <?= date("F d, Y",$blog["date_created"])?></p>
    </div>
</div>
<hr>
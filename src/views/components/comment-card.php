<?php $comments = $data["comments"];?>
<div id="review-section" class="card card-outline-secondary my-4 w-100">
    <div class="card-header">
        <h2>Reviews</h2>
    </div>
    <div class="card-body">
        <?php foreach($comments as $comment){
            include PATH_COMPONENTS."comment-body.php";
        }?>
        <?php if (isset($_SESSION["user"])) { ?>
            <form id="leave-comment">
            <textarea name="comment" class="w-100 mb-3" rows="5"></textarea>        
            </form>
            <a id="submit-comment" class="btn hvr-hover">Leave a Review</a>
        <?php } else { ?>
            <a href="<?= BASE_URL."account/login"?>" class="btn hvr-hover">Login to comment</a>
        <?php  }?>
        

    </div>
</div>
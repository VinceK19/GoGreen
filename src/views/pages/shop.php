    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-12 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Showing all <?= count($data["products"])?> results</p>
                            </div>
                        </div>
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <?php if (isset($data["products"][0])) {?>
                                        <div class="row">
                                        <?php foreach($data["products"] as $product){
                                            include PATH_COMPONENTS."card.php";
                                        }?>
                                    </div>    
                                    <?php } else {?>
                                        <h3>No result</h3>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <?php foreach($data["brands"] as $brand) {?>
                                    <a href="<?= BASE_URL."shop/list/".$brand["id"]?>" class="list-group-item list-group-item-action"><?= $brand["name"]?></small></a>
                                <?php } ?>
                                <!-- <a href="#" class="list-group-item list-group-item-action"> Grocery  <small class="text-muted">(150) </small></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->


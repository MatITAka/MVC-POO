<section style="background-color: #eee;">
    <div class="text-center container py-5">
        <h4 class="mt-4 mb-5"><strong>Nos Produits</strong></h4>

        <div class="row">
            <?php foreach ($products as $product) { ?>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="text-reset">
                                <h5 class="card-title mb-3"><?php echo $product['product_name']; ?></h5>
                            </a>
                            <a href="" class="text-reset">
                                <p><?php echo $product['product_type']; ?></p>
                            </a>
                            <h6 class="mb-3">$<?php echo $product['product_price']; ?></h6>
                            <p class="card-text"><?php echo $product['product_desc']; ?></p>
                            <form method="post" action="/cart/add/<?php echo $product['product_id']; ?>">
                                <button type="submit" class="btn btn-primary">Add to cart</button>
                            </form>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
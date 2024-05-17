
<!-- ... -->

<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Cart - <?php echo count($cartProducts); ?> items</h5>
                    </div>
                    <div class="card-body">
                        <?php foreach ($cartProducts as $product) { ?>
                            <!-- Single item -->
                            <div class="row">
                                <!-- ... -->

                                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                    <!-- Data -->
                                    <p><strong><?php echo $product['product_name']; ?></strong></p>
                                    <p>Quantity: <?php echo $product['quantity']; ?></p>
                                    <form method="post" action="/cart/remove/<?php echo $product['product_id']; ?>">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm me-1 mb-2" data-mdb-tooltip-init title="Remove item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-sm mb-2" data-mdb-tooltip-init
                                             title="Move to the wish list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <!-- Data -->
                                </div>

                                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                    <!-- Quantity -->
                                    <div class="d-flex mb-4" style="max-width: 300px">


                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary px-3 me-2"
                                                onclick="const input = this.parentNode.querySelector('input[type=number]');
                                                    input.stepDown();
                                                    if (input.value === 0) {
                                                    removeFromCart(<?php echo $product['product_id']; ?>);
                                                    }">
                                            <i class="fas fa-minus"></i>
                                        </button>



                                        <div data-mdb-input-init class="form-outline">
                                            <input id="form1" min="0" name="quantity" value=<?php echo $product['quantity'];?> type="number" class="form-control" />
                                            <label class="form-label" for="form1">Quantity</label>
                                        </div>

                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary px-3 ms-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- Quantity -->

                                    <!-- Price -->
                                    <p class="text-start text-md-center">
                                    <p>Price: $<?php echo $product['product_price'] * $product['quantity']; ?></p>
                                    <!-- Price -->
                                </div>
                            </div>
                            <!-- Single item -->

                            <hr class="my-4" />
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>$<?php echo $totalPrice; ?></span>
                            </li>
                            <!-- ... -->
                        </ul>

                        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">
                            Go to checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    function removeFromCart(productId) {
        fetch('/cart/remove/' + productId, {
            method: 'POST',
        }).then(response => {
            if (response.ok) {
                location.reload();
            }
        });
    }
</script>
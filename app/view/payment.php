<div class="container p-0 mt-5 mb-5">
    <div class="card px-4">
        <form method="post" action="/paymentRequest">
            <p class="h8 py-3">Payment Details</p>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Person Name</p>

                        <label>
                            <input class="form-control mb-3" type="text" placeholder="Name" value="" name="personName" required>
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Number</p>
                        <label>
                            <input class="form-control mb-3" type="text" placeholder="1234 5678 435678" value="" name="cardNumber" required>
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry</p>
                        <label>
                            <input class="form-control mb-3" type="text" placeholder="MM/YYYY" value="" name="expiry" required>
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">CVV/CVC</p>
                        <label>
                            <input class="form-control mb-3 pt-2 " type="password" placeholder="***" name="cvv" required>
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary mb-3">
                        <span class="ps-3 text-white text-decoration-none">Pay <?php echo $totalPrice ?>$</span>
                        <span class="fas fa-arrow-right"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
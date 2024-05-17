<style>
    h1 {
        color: #333;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    #myBtn {
        display: block;
        width: 200px;
        height: 50px;
        margin: 20px auto;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        text-align: center;
    }

    #myBtn:hover {
        background-color: #45a049;
    }
</style>


<h1>You need some changes ? </h1>

<div>
    <table>
        <thead>
            <tr>
                <td>Product Name</td>
                <td>Product Price</td>
                <td>Product Description</td>
                <td>Product Type</td>
            </tr>
        </thead>

        <tbody>
        <?php
        foreach ($products as $product) {
            if (array_key_exists('product_name', $product) && array_key_exists('product_price', $product) && array_key_exists('product_desc', $product) && array_key_exists('product_type', $product)) { ?>
                <tr>
                    <td><?= $product['product_name'] ?></td>
                    <td><?= $product['product_price'] ?></td>
                    <td><?= $product['product_desc'] ?></td>
                    <td><?= $product['product_type'] ?></td>
                    <td>
                        <button id="myBtn" class="btn btn-primary" onclick="openModal(<?= $product['product_id'] ?>)">Edit</button>
                    </td>
                    <td>
                        <a  class="btn btn-danger" href="/deleteProduct">Delete</a>
                    </td>
                </tr>
            <?php }
        } ?>
        </tbody>
    </table>



</div>

<div id="myModal" class="modal">
        <div class="modal-content">

            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
            <form action="/updateProduct" method="post">
                <?php
                if ($product !== false && array_key_exists('product_name', $product) && array_key_exists('product_price', $product) && array_key_exists('product_desc', $product) && array_key_exists('product_type', $product)) { ?>
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" value="<?= $product['product_name'] ?>">
                    <label for="price">Product Price</label>
                    <input type="text" id="price" name="price" value="<?= $product['product_price'] ?>">
                    <label for="description">Product Description</label>
                    <input type="text" id="description" name="description" value="<?= $product['product_desc'] ?>">
                    <label for="type">Product Type</label>
                    <input type="text" id="type" name="type" value="<?= $product['product_type'] ?>">
                <?php } ?>
                <button type="submit">Submit</button>
            </form>
        </div>
</div>

<script>

    function openModal(productId) {
        // Get the product data
        const product = products.find(product => product.product_id === productId);

        // Populate the form with the product data
        document.getElementById('name').value = product.product_name;
        document.getElementById('price').value = product.product_price;
        document.getElementById('description').value = product.product_desc;
        document.getElementById('type').value = product.product_type;

        // Open the modal
        modal.style.display = "block";
    }

    function deleteProduct(productId) {
        // Send a request to delete the product
        fetch(`/deleteProduct?id=${productId}`, {
            method: 'POST',
        })
            .then(response => response.json())
            .then(data => {
                // Handle the response
                if (data.success) {
                    // Remove the product from the table
                    const row = document.getElementById(`product-${productId}`);
                    row.parentNode.removeChild(row);
                } else {
                    // Show an error message
                    alert('Failed to delete product');
                }
            });
    }

    // Get the modal
    const modal = document.getElementById("myModal");

    // Get the button that opens the modal
    const btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    }
    </script>

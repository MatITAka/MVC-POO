<style>
    body {
        font-family: Arial, sans-serif;
        padding: 0;
        margin:0;
    }
    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }
    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 300px;
        margin: auto;
    }
    label {
        font-weight: bold;
    }
    input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: white;
        cursor: pointer;
        margin-bottom: 20px;
    }
    button:hover {
        background-color: #0056b3;
    }
</style>

<h1>Add Product</h1>

<form method="post" action="/addProducts">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Name">
    <label for="price">Price</label>
    <input type="text" name="price" placeholder="Price">
    <label for="description">Description</label>
    <input type="text" name="description" placeholder="Description">
    <label for="type">Category</label>
    <input type="text" name="type" placeholder="Category">
    <button type="submit" >Add</button>
</form>
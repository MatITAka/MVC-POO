<h1 class="text-center mb-4 mt-3">Let's talk about your inquiries</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/contact" method="post" class="bg-light p-4 rounded mb-5">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
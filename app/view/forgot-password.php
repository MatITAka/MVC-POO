<h1 class="text-center mb-4">So you forgot your password again huh...</h1>

<form class="container w-50" action="/forgot-password" method="post">

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Old Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password" class="form-control" required>
    </div>

    <input class="btn btn-primary mt-3" type="submit" value="submit">
</form>
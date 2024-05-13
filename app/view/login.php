<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <!-- Login Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title text-center">Nice to see you again</h2>
                    <form action="/login" method="post">
                        <div class="form-group">
                            <label for="login-username">Username:</label>
                            <input type="text" name="username" id="login-username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="login-password">Password:</label>
                            <input type="password" name="password" id="login-password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <div class="border-right border-dark h-75"></div>
        </div>
        <div class="col-md-5">
            <!-- Registration Form -->
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Join us</h2>
                    <form action="/register" method="post">
                        <div class="form-group">
                            <label for="register-username">Username:</label>
                            <input type="text" name="username" id="register-username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="register-password">Password:</label>
                            <input type="password" name="password" id="register-password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="register-confirm-password">Confirm Password:</label>
                            <input type="password" name="confirm_password" id="register-confirm-password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Register" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
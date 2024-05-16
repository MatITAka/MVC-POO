<?php
session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null; // Check if $_SESSION['role'] is set
if ($role === 'admin'):
    ?>
<?php endif; ?>




<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title text-center">Nice to see you again</h2>
                    <form action="/login" method="post">
                        <div class="form-group">
                            <label for="login-username">Username:</label>
                            <input type="text" name="username" id="login-username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Password:</label>
                            <input type="password" name="password" id="login-password" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="Login" class="btn btn-primary btn-block">
                        </div>
                        <div class="form-group mt-3">
                            <a href="/forgot-password" class="btn btn-link btn-block">Forgot password?</a>
                        </div>


                        <div class="alert alert-danger mt-3"
                            <?php if (!isset($_SESSION['login_error'])) {
                                echo 'style="display: none;"';
                            } ?>>
                            <?php
                            if (isset($_SESSION['login_error'])) {
                                echo $_SESSION['login_error'];
                                unset($_SESSION['login_error']);
                            } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <div class="border-right border-dark h-75"></div>
        </div>


        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Join us</h2>
                    <form action="/register" method="post">
                        <div class="form-group">
                            <label for="register-username">Username:</label>
                            <input type="text" name="username" id="register-username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="register-password">Password:</label>
                            <input type="password" name="password" id="register-password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="register-confirm-password">Confirm Password:</label>
                            <input type="password" name="confirm_password" id="register-confirm-password" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="Register" class="btn btn-primary btn-block">
                        </div>

                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <div>
                                <label for="role">Admin:</label>
                                <input type="checkbox" id="role" name="role" value="admin">
                            </div>
                        <?php endif; ?>

                        <div class="alert alert-danger mt-3"
                            <?php if (!isset($_SESSION['error'])) {
                                echo 'style="display: none;"';
                            } ?>>
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home 🏠</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About ℹ️</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact 📢</a>
                </li>
                <li class="nav-item">

                    <?php if (isset($_SESSION['username'])): ?>
                        <a class="nav-link" href="/logout">Logout 🚪</a>
                    <?php else: ?>
                        <a class="nav-link" href="/login">Login/Register 📝</a>
                    <?php endif; ?>

                </li>

                <li class="nav-item">

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <a class="nav-link" href="/dashboard">Dashboard 📈</a>
                    <?php else: ?>
                        <!-- You can put something here if you want something to be displayed when the user is not an admin -->
                    <?php endif; ?>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="/products">Products 📦</a>

                </li>

                <li>
                    <a class="nav-link" href="/cart">Cart 🛒</a>
                </li>


            </ul>
        </div>
    </nav>
</header>

<link rel="stylesheet" href="../../public/css/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

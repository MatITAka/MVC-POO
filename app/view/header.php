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

                    <?php if (isset($_SESSION['username'])): ?>
                        <a class="nav-link" href="/dashboard">Dashboard 📈</a>
                    <?php else: ?>

                    <?php endif; ?>

                </li>

                <li class="nav-item">

                    <?php if (isset($_SESSION['username'])): ?>
                        <a class="nav-link" href="/order">Order 📦</a>
                    <?php else: ?>

                    <?php endif; ?>

                </li>


            </ul>
        </div>
    </nav>
</header>

<link rel="stylesheet" href="../../public/css/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!--Here you can declaration the navbar in the top  -->
<div class="navbar-section">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php"><?php echo lang('home') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="categories.php"><?php echo lang('categories') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="items.php"><?php echo lang('items') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="members.php"><?php echo lang('members') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="orders.php"><?php echo lang('order') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><?php echo lang('logs') ?></a>
                    </li>
                </ul>
                <ul class="dropdown-box nav navbar-nav">
                    <li class="dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['Username'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"
                                   href="members.php?page=Edit&userid=<?php echo $_SESSION['ID'] ?>">Edit Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Sittings</a></li>
                            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<?php

?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
        <?php echo $CONFIG['project']['name']; ?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($home_page == '' || $home_page == 'home') ? 'active' : '' ?>">
                <a class="nav-link" href="/home">Home</a>
            </li>
            <li class="nav-item <?php echo $home_page == 'profile' ? 'active' : '' ?>">
                <a class="nav-link" href="/profile">Profile</a>
            </li>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>

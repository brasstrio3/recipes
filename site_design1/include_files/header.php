<header>
    <div class="container">
        <h1><span id="title">Recipe Site</span></h1>

        <div class="header-search">
            <form method="get" action="<?php htmlspecialchars($_SERVER[" PHP_SELF"]); ?>">
                <label for="search"></label>
                <input type="search" name="search" id="header-search-box" placeholder="Search for recipes...">
                <input type="submit" id="header-search-submit">
            </form>
        </div>

        <nav>
            <ul>
                <li class="current"><a href="index.php" title="Home">Home</a></li>
                <li><a href="#" title="About">About</a></li>
                <li><a href="#" title="Contact">Contact</a></li>
            </ul>
        </nav>

    </div>
</header>

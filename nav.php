<nav class="topbar">
     <ul class="topbar-links">
                    <li><a href="index.php">Forum</a></li>
                    <li><a href="viewTopic.php?id=4">What's new</a></li>
                    <li><a href="viewTopic.php?id=3">Rules</li>
                </ul>
                <div class="user-menu">
                <span>Logged in as "name"</span>
                <a href="#">settings</a>
                <?php if (isset($_SESSION['user_id'])) {
                    echo "<a href='logout.php'>Log out</a>";
                } else {
                    echo "<a href='loginQuery.php'>Log in</a>";
                }?>
                </div>   
           </nav>
<header class="logo">
    <div class="topbar-width">
            <h1>PHPoad</h1>
            <span>Handwritten PHP forum.</span>

    </div>
</header>

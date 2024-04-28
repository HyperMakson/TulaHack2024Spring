<header class="header-inner">
    <!-- Навигация сверху -->
    <div class="navbar">
        <a class="navbar-favourites" href="../profile/user.php?sect=my-companion">
            <img src="../images/profile/like.svg">
            <span>Попутчики</span>
        </a>
        <a class="navbar-logo" href="/">
            <img src="../images/Group_1.svg">
        </a>
        <div class="navbar__link">
            <? if (empty($_SESSION['user'])) {
                ?>
                <div class="navbar__link">
                    <div class="link__logreg link__mobile-log">
                        <a href="../logreg/login.php">Вход</a>
                    </div>
                    <div class="link__logreg link__mobile-reg">
                        <a href="../logreg/register.php">Регистрация</a>
                    </div>
                </div>
            <?
            } else {
                ?>
                <div class="navbar__link">
                    <div class="link__logreg link__profile">
                        <a class="navbar-profile" href="../profile/user.php">
                            <img src="../images/avatar.png">
                        </a>
                    </div>
                </div>
            <?
            } ?>
        </div>
    </div>
</header>
<div class="header">
    <div class="header__navbar">
        <div class="navbar__fast-link">
            <p>Ачивки</p>
        </div>
        <div class="navbar__logo">
            <p>LOGO</p>
        </div>
        <div class="navbar__link">
            <? if (empty($_SESSION['user'])) {
                ?>
                <div class="link__logreg">
                    <a href="logreg/login.php">Вход</a>
                </div>
                <div class="link__logreg">
                    <a href="logreg/register.php">Регистрация</a>
                </div>
            <?
            } else {
                ?>
                <div class="link__logreg link__profile">
                    <a href="profile/user.php">
                        <div class="link__profile-avatar"></div>
                    </a>
                </div>
            <?
            } ?>
        </div>
    </div>
</div>
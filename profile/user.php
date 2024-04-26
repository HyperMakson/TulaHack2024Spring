<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <!-- Навигация сверху -->
        <div class="navbar">
            <nav>
                <a class="navbar-airplane" href="#">
                    <img src="images/airplane.svg" alt="">
                    <span>Найти транспорт</span>
                </a>
                <a class="navbar-sleep" href="#">
                    <img src="images/bed.svg">
                    <span>Найти отель</span>
                </a>
                <a class="navbar-logo" href="#">
                    <img src="images/logo.svg">
                </a>
                <a class="navbar-favourites" href="#">
                    <img src="images/like.svg">
                    <span>Избранное</span>
                </a>
                <a class="navbar-profile" href="#">
                    <img src="images/profile photo.png">
                    <span>Максим</span>
                </a>
        </div>
    </header>

    <!-- Цветной прямоугольник и фотка -->
    <div class="middle-container">
        <div class="middle-rectangle">
        </div>
        <div class="middle-profile_photo">
            <img src="images/profile photo big.png">
            <span>Максим</span>
            <span>maxim@gmail.com</span>
        </div>
    </div>

    <!-- Навигация внутри профиля -->
    <div class="navprofile-container">
        <a href="#">Аккаунт</a>
        <a href="#">История</a>
        <a href="#">Методы оплаты</a>
    </div>

    <!-- Основные данные аккаунта -->
    <div class="account-container">
        <h1>Аккаунт</h1>
        <div class="account-name">
            <h2>Имя</h2>
            <span>Максим Варов</span>
        </div>
        <div class="account-email">
            <h2>Email</h2>
            <span>maxim@gmail.com</span>
        </div>
        <div class="account-password">
            <h2>Пароль</h2>
            <span>*********</span>
        </div>
        <div class="account-phone_number">
            <h2>Номер телефона</h2>
            <span>+79539527523</span>
        </div>
        <div class="account-adress">
            <h2>Адрес</h2>
            <span>Россия, Тульская обл. г.Тула ул.Свободы д.35</span>
        </div>
        <div class="account-birth">
            <h2>Дата рождения</h2>
            <span>14.07.2003</span>
        </div>
    </div>

    <!-- Навигация снизу -->
    <footer class="bottom">
        <div class="footer">

            <div class="footer-nav">
                <a class="footer-logo" href="#">
                    <img src="images/logo.svg">
                </a>
                <nav>
                    <a class="footer-logo-social" href="#">
                        <img src="images/facebook.svg">
                    </a>
                    <a class="footer-logo-social" href="#">
                        <img src="images/Twitter.png">
                    </a>
                    <a class="footer-logo-social" href="#">
                        <img src="images/youtube.svg">
                    </a>
                    <a class="footer-logo-social" href="#">
                        <img src="images/instagram.svg">
                    </a>
                </nav>
            </div>

            <div class="footer-contacts">
                <nav>
                    <a class="footer-contacts__destinations" href="#">Направления туризма</a>
                    <nav>
                        <a class="footer-contacts__destinations-type" href="#">Россия</a>
                        <a class="footer-contacts__destinations-type" href="#">Китай</a>
                        <a class="footer-contacts__destinations-type" href="#">Бразилия</a>
                        <a class="footer-contacts__destinations-type" href="#">ЮАР</a>
                    </nav>
                </nav>

                <nav>
                    <a class="footer-contacts__activities" href="#">События</a>
                    <nav>
                        <a class="footer-contacts__destinations-type" href="#">Северное сияние</a>
                        <a class="footer-contacts__destinations-type" href="#">Гейзеры</a>
                        <a class="footer-contacts__destinations-type" href="#">Сплав по рекам</a>
                        <a class="footer-contacts__destinations-type" href="#">Мастер-классы</a>
                    </nav>
                </nav>

                <nav>
                    <a class="footer-contacts__blogs" href="#">Блоги</a>
                    <nav>
                        <a class="footer-contacts__blogs-type" href="#">Путешествие в Тайланд</a>
                        <a class="footer-contacts__blogs-type" href="#">Путешествие в Китай</a>
                        <a class="footer-contacts__blogs-type" href="#">Путешествие по России</a>
                        <a class="footer-contacts__blogs-type" href="#">Путешествие в ОАЭ</a>
                    </nav>
                </nav>

                <nav>
                    <a class="footer-contacts__aboutus" href="#">О нас</a>
                    <nav>
                        <a class="footer-contacts__aboutus-type" href="#">Наша история</a>
                        <a class="footer-contacts__aboutus-type" href="#">Сотрудничество</a>
                    </nav>
                </nav>

                <nav>
                    <a class="footer-contacts__contactus" href="#">Связаться с нами</a>
                    <nav>
                        <a class="footer-contacts__contactus-type" href="#">Email</a>
                        <a class="footer-contacts__contactus-type" href="#">Телефон</a>
                    </nav>
                </nav>
                
            </div>
        </div>
    </footer>
</body>

</html>
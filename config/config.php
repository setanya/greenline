<?php 
// глобальные переменные для подключение базы
define("DB_HOST", 'localhost');//хост
define("DB_USER", 'root'); //пользователь
define("DB_PASS", '');//пароль
define("DB_BASE", 'greenline');// имя базы
// глобальные переменные для подключение номеров телефонов, email и адреса
//которые находятся в футере в коде константу передают без $
define("SITE_EMAIL", 'support@yoursite.com');//email <?=SITE_EMAIL;>передали в коде 
define("SITE_TELEPHONE_1", '+1 (123) 444-5677');//телефон 1
define("SITE_TELEPHONE2", '+1 (123) 444-5678');//телефон 2
define("SITE_ADDRESS", 'Адрес: 123 TemplateAccess Rd1');//адреса

?>
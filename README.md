Программа StudentList
=========

Что использовалось
=========
ООП, MVC, Twitter Bootstrap, Depency Injection, PDO (MySQL), JSON, паттерн TableDataGateway, Composer Autoload, контейнер (Pimple)

Как установить
=========
-Сделать папку корневой в конфиге Апача
	Если ты используешь веб-сервер Апач, то корневая папка сайта указывается в конфиге внутри блока VirtualHost в директиве DocumentRoot
<VirtualHost *:80>
# Имя сервера которое обслуживает этот VirtualHost
ServerName example.com
# Корневая папка сервера
DocumentRoot /var/www/example.com/public
# ....
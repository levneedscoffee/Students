ToDo (по условию):
-при ошибке ввода отображать --- и выделенным красным цветом ошибочным полем
-Выводятся по 50 человек на страницу (у меня 10)
-ахуинный css дезигн (стырить)



-настроить права для папок 
-разобраться с зависимостями классов
-удалить из 503 чтение файла



-Student: данные можно добавлять как через addInfo, так и напрямую. Верно ли это?
-Сделать проверку на обязательные и необязательные данные при регистрации (как нибудь потом)


Мелочишки:
-controllers/edit: проверка $_COOKIE['hash'] - нужно ли?
-controllers/edit,register: убрать, по возможности копипасты - не знаю как
-showSortOrder не должен выводить символы, а возвращать true/false - усложнение кода, не нужно
-разобраться с set_exception_handler
-сделать footer

Редирект это отдача в качестве ответа кода 3xx и заголовка Location. Редиректить при ошибке, как и при 404 или 403 - неправильно. Вдобавок, в адресной строке браузера теряется УРЛ и обновить страницу нельзя.


Кстати, тебе дополнительное задание. Сделай Cli скрипт который загружает по очереди всех студентов из БД, проверяет каждого на правильность и если есть ошибки, пишет id студента и подробности ошибок.
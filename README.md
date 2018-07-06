# simple-site-for-comments
1. Скачать и установить yii2-advanced. Я делал это, используя vagrant. Данный процесс установки можно найти по данной ссылке:
https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md

2. В папке frontend, созданного вами проекта, нужно заменить или добавить следующие файлы и папки из данного репозитория:

frontend\assets\AppAsset.php

frontend\config\main.php

frontend\controllers\AppController.php

frontend\controllers\CommentController.php

frontend\models\CommentForm.php

frontend\models\Comment.php

frontend\views\comment\index.php

frontend\views\layouts\commentslayout.php

frontend\views\comment\index.php

3. Запускаем командную строку от имени администратора. Переходим в корень проекта с yii2 и запускаем команду vagrant up. (этот пункт выполняется если виртуальная машина не запущена)

4. При установке yii2 в mysql будет создана база данных yii2advanced. Подключаемся к ней. Я делал с помощью MySql Workbench.
Выбираем метод подключения: Standard TCP/IP over SSH.
Параметры подключения следующие:

SSH Hostname: 127.0.0.1:2222

SSH Username: vagrant

SSH Password: vagrant (по умолчанию)

SSH Keyfile: 'путь к проекту'\'название папки проекта'\.vagrant\machines\'имя виртуальной машины'\virtualbox\private_key

MySql Hostname: 127.0.0.1

MySql Server port: 3306

Username: root

Password: по умолчанию пароль у рута отсутствует

После подключения создаём в ней таблицу с помощью sql-запроса:

CREATE TABLE `comment` (

  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  
  `username` varchar(16) NOT NULL,
  
  `content` varchar(128) NOT NULL,
  
  `posted_at` int(11) NOT NULL,
  
  `ip_address` varchar(45) NOT NULL,
  
  PRIMARY KEY (`id`),
  
  UNIQUE KEY `id_UNIQUE` (`id`)
  
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


5. Открываем браузер и вводим: y2aa-frontend.test. Данный адрес по умолчанию прописан в настройках установщика yii2.

6. Когда нужно завершить приложение, то в командной строке, запущенной от имени администратора, в корне проекта набираем команду vagrant halt

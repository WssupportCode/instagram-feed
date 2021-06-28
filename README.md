## Лента Instagram ##

### Назначение ###

Позволяет выводить на странице информацию из ленты Instagram подключенного аккаунта (изображение или превью видео, ссылка на пост). Есть возможность управлять информацией через инфоблок: ограничивать вывод постов, изменять изображение, изменять ссылку.

### Принцип действия ###

Раз в заданное время запускается агент, актуализирующий информацию последними N постами путем записи их в инфоблок (если таких еще нет). После добавления поста в инфоблок, он становится неактивным (не выводится в ленте). Для работы нужен API-токен аккаунта Instagram

## Получение API-токена ##

Сначала необходимо создать аккаунт Facebook разработчика. Это можно сделать перейдя по этой ссылке и авторизовавшись. Далее заходим в “Мои приложения”

![](readme_images/12.png)

И жмем “Создать приложение”

![](readme_images/22.png)

В открывшемся попап-окне выберите «Дополнительные параметры».

![](readme_images/32.png)

В следующем окне выберите «Другое».

![](readme_images/42.png)

Укажите название вашего приложения (1). Обратите внимание! Название приложения не должно содержать слово Instagram из-за особенностей работы платформы для разработки. Укажите электронный адрес для связи (2) и выберите аккаунт Business Manager (3). Последнее поле заполнять не обязательно.

![](readme_images/52.png)

Пройдите проверку безопасности.

![](readme_images/62.png)

После этого вас перенаправят на страницу панели нового приложения. В меню выберите Настройки (1) → Основное (2).

![](readme_images/72.png)

Прокрутите открывшуюся страницу до конца и нажмите «Добавить платформу».

![](readme_images/82.png)

В открывшемся окне выберите платформу «Веб-сайт».

![](readme_images/92.png)

В конце страницы появится выбранная платформа «Веб-сайт» и поле для ввода URL-адреса сайта. Заполните его и сохраните изменения.

![](readme_images/102.png)

В меню нажмите на пункт «Товары», найдите карточку Instagram Basic Display и перейдите к ее настройке.

![](readme_images/112.png)

### Настройка продукта ###

После того, как вы перейдете к настройке товара, он станет доступным в левом меню. Разверните пункт Instagram Basic Display и выберите пункт Basic Display.

![](readme_images/122.png)

Внизу страницы нажмите Create New App.

![](readme_images/132.png)

Появится всплывающее окно, в котором будет указано ранее заполненное название приложения. На этом шаге просто сохраните изменения.

![](readme_images/142.png)

После сохранения настроек станут доступны новые поля. В следующих полях укажите адрес сайта, для которого будет настраиваться виджет:

1.Действительные URL переадресации для OAuth.

2.Деавторизация URL обратного вызова.

3.URL запроса на удаление данных.

![](readme_images/152.png)

Сохраните изменения.

### Добавление тестового пользователя ###

В левом меню выберите пункт «Роли» (1), в выпадающем меню — «Роли» (2).

![](readme_images/162.png)

На открывшейся странице в блоке «Тестировщики Instagram» выберите «Добавить Instagram Testers».

![](readme_images/172.png)

В открывшемся окне укажите имя пользователя аккаунта Instagram. После выбора отправьте приглашение пользователю.

![](readme_images/182.png)

Пользователь появится в списке тестировщиков, но со статусом «На рассмотрении». Чтобы подтвердить приглашение, необходимо перейти по ссылке в тексте.

![](readme_images/192.png)

Ссылка ведет на сайт Instagram. Необходимо авторизоваться, чтобы принять приглашение. На открывшейся странице перейдите в «Приложения и сайты» (1) → «Приглашения для тестировщиков» (2). Примите приглашение.

![](readme_images/202.png)

### Генерация API token ###
Разверните пункт Instagram Basic Display (1) и выберите пункт Basic Display (2).

![](readme_images/212.png)

В блоке «Генератор маркеров пользователя» нажмите кнопку Generate Token.

![](readme_images/232.png)

Если вы не авторизованы, войдите в свой профиль Instagram. Разрешите приложению доступ к информации вашего аккаунта.

![](readme_images/242.png)

Затем согласитесь с предупреждением о необходимости передачи токена только доверенным лицам и скопируйте полученный токен.

![](readme_images/252.png)

## Настройка инфраструктуры ##
   Для создания инфоблока необходимо загрузить файл миграции в папку **/reducemigrations/** после чего указать в данном файле нужный тип инфоблока и SITE_ID
   
![](readme_images/13.png)

## Размещение файлов ##
Для того, чтобы получить файлы решения, 
вы можете либо скачать архив в формате ZIP, 
либо при помощи команды **git clone <репозиторий>**

![](readme_images/6.png)

скопировать файлы к себе на локальный компьютер или напрямую на сервер.


   Файлы **Instagram.php** и **InstagramUpdater.php** необходимо разместить в папках **/Helpers/** и **/Agents/** соответственно

   ![](readme_images/23.png)

Папка **/instagram.list/** - шаблон компонента **news.list**

Файл **index.php** - пример вызова компонента
## Настройка агента ##
   В файле агента можно изменить символьные коды инфоблока и полей настроек проекта, либо указать их вручную (если был пропущен шаг по созданию инфраструктуры)
   ![](readme_images/11.png)

После завершения всех настроек, необходимо зарегистрировать агента в системе, для этого переходим в админку сайта в **Настройки -> Настройки проекта -> Агенты -> Добавить агента**

![](readme_images/31.png)

В открывшейся форме нужно указать метод агента: **\WS\Agents\InstagramUpdater::run();**
А также указать время запуска и периодичность (рекомендуется 1 раз в сутки)

![](readme_images/41.png)

После этого переходим в “Настройки проекта” и заполняем необходимые данные (API-токен, кол-во новостей, профиль Instagram, инфоблок Instagram (если не заполнено))

![](readme_images/51.png)

## Настройка компонента ##
   В решении представлена демо-страница с примером вызова компонента вывода ленты Instagram. В нем представлены все необходимые настройки для вывода ленты.
 При необходимости можно изменить кол-во выводимых записей, шаблон, размеры выводимых картинок, а также символьные коды полей настроек проекта (или задать значения вручную)
 
   ![](readme_images/61.png)

Также в решении представлен демо-шаблон, демонстрирующий возможности данного решения:

![](readme_images/71.png)

## Заключение ##

Данное решение позволяет максимально быстро и просто вывести ленту Instagram на страницу, а также управлять ею. Использование инфоблока, позволяет вносить изменения до вывода на сайт, регулировать выводимые записи и их кол-во, вести архив записей. Также, представленная система поддерживает кеширование и кол-во запросов к API минимальное. После установки, вам останется только произвести минимальные настройки и интегрировать верстку, чтобы лента выводилась в стилистике сайта.



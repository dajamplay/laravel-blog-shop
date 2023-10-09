# Laravel Demo Project  

## Требования  
- Наличие установленного ```Docker``` и ```Docker Compose```  
- Желательно утилита ```make```

## Запуск dev сервера  
```make init```  

## Альтернативный запуск dev сервера  
```docker-compose up -d --build```  
```docker exec php composer install```  
```docker exec node npm install```  
```docker exec php php artisan migrate:fresh --seed```  

## Вход в командную строку PHP  
```make exec-php```  
или  
```docker exec -it php sh```  

## Вход в командную строку Node.js  
```make exec-node```  
или  
```docker exec -it node sh```  

## WEB  
Адрес: ```http://localhost```

## Dashboard
Адрес: ```http://localhost/dashboard```

## PHPMyAdmin  
Адрес: ```http://localhost:8080```  
Логин: ```root```  
Пароль: ```root```  
Если необходимо посмотреть базу данных

## MailHog
Адрес: ```http://localhost:8025```  
UI для электронной почты

## Blade
### Добавленные директивы
```@linkactive('имя маршрута')```, например ```@linkactive('dahsboadr.index')```.  
Добавляет ```class="active"``` на месте директивы







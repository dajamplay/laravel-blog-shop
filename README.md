# Laravel Demo Project  

## Требования  
- Наличие установленного ```Docker``` и ```Docker Compose```  
- Желательно утилита ```make```.

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
Адрес: ```http://localhost:80```  
Регистрация и авторизация реализована с помощью стандартных компонентов.  
Обновление компонентов без перезагрузки страницы(1 раз в 30 секунд) реализовано с помощью ```laravel/livewire```.  

## PHPMyAdmin  
Адрес: ```http://localhost:8080```  
Логин: ```root```  
Пароль: ```root```  
Если необходимо посмотреть базу данных.

## MailHog
Адрес: ```http://localhost:8025```  
UI для электронной почты  

## API
Регистрация и авторизация реализована с помощью ```laravel/sanctum```.  
### Для неавторизованных пользователей  
#### Маршруты  
```POST /api/v1/login``` вход  
```POST /api/v1/register``` регистрация  

### Для авторизованных пользователей  
Нужно передать ```Bearer``` токен, полученный при входе или регистрации.  
#### Маршруты  
```GET /api/v1/events``` получение списка всех событий  
```POST /api/v1/events``` создание события  
```DELETE /api/v1/events/{event_id}``` удаление события  

```POST /api/v1/subscribe/{event_id}``` подписка на событие  
```DELETE /api/v1/unsubscribe/{event_id}``` отписка от события  

```GET /api/v1/logout``` выход из системы, удаление токена  




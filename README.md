# PDF
 
1) Вам нужно создать $ git clone https://github.com/AlekseyBanha/Test-task-transform-to-PDF.git (я использую git bush)
2) Нужно создать папочку vendor (я пользуюсь Composer) командой - $ composer install
3) Создаем файл .env (копируем всё с .env.example)
4) Подклчаем свою БД в файле .env(у меня MySQL)
5) Если выдаёт ошибку вставляем в composer - $ php artisan config:cache
6) Делаем миграции $ php artisan migrate

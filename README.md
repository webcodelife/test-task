## Install    
    git clone git@github.com:webcodelife/test-task.git
    cd test-task
    composer install
    npm install
    npm run build
    cp .env.example .env
    php artisan key:generate
    php artisan serve --host=x.x.x.x
    
## Use
    url: http://x.x.x.x:8000
    log: storage/logs/laravel.log

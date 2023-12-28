# diplom_web21
    git@github.com:Xpystum/diplom_web21_Back-end.git

## подтянуть все ветки из gitHub
    git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
    git fetch --all
    git pull --all

## обновить все сиды (удалит миграции, накатит заново и заново заполнит сиды)
    php artisan migrate:refresh --seed
    php artisan migrate:fresh --seed


## если не подгружаются картинки пропишите 
    *для доступа к папке storage*

        php artisan storage:link 

## Пользователи:

    status:
        *user*
             Логин: test@example.com
            Пароль: password
        *admin*
             Логин: admin@example.com
            Пароль: admin
        *ban*
             Логин: bad_man@example.com
            Пароль: banMan

## пример админки

http://nazox-v-light.angular.themesdesign.in/
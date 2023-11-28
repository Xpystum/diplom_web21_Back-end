# diplom_web21
git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
git fetch --all
git pull --all

===================================================
обновить все сиды (удалит миграции, накатит заново и заново заполнит сиды)
php artisan migrate:refresh --seed
php artisan migrate:fresh --seed

git@github.com:Xpystum/diplom_web21_Back-end.git
===================================================
если не подгружаются картинки пропишите 

php artisan storage:link 

для доступа к папке storage


user
test@example.com
password
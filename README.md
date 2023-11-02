# diplom_web21
git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
git fetch --all
git pull --all


обновить все сиды (удалит миграции, накатит заново и заново заполнит сиды)
php artisan migrate:refresh --seed

git@github.com:Xpystum/diplom_web21_Back-end.git
# diplom_web21
Drow
<<<<<<< HEAD

=======
>>>>>>> 340c80991643344ac84946f889726e8c4f850867
git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
git fetch --all
git pull --all
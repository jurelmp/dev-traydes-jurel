Localhost
-------------------------
Namespace   =   Traydes
Database    =   dev
DB Pass     =   Adm1n!!


Views
-------------------------
login
registration
password reset link
request password reset link
view all posts
view single post
user account settings
view posts by categories
view posts by colleges

posts -> attributes management
users management
posts management
categories management
college/universities management
blog management
analytics

Notes
-------------------------
-initial setup
    $composer install
    $composer update (optional)
    $npm install
    $bower install

-copying files only needs to occur after a bower update
    $bower update
    $gulp copyfiles
    $gulp


nested relationship ref:
http://stackoverflow.com/questions/24672629/laravel-orm-from-self-referencing-table-get-n-level-hierarchy-json
https://laracasts.com/discuss/channels/general-discussion/recursive-relationship
http://heera.it/laravel-model-relationship#.Vh__uHqqqko
1- clone the project 
        git clone https://github.com/HossamMoh150/edfa3ly-backedend-test.git
2- intall composer 
        composer install
3-create databse on your local host serve 
4- migrate the talble 
        php artisan migrate
        php artisan db:seed

use psotman or any rest tool to create oreder and recive a bill
        api : http://127.0.0.1:8000/api/order
        form data :
            currency:egp
            products[]:1
            products[]:1
            products[]:2
            products[]:4

or use postman collection (uploded) 

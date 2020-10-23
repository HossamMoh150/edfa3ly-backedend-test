1- clone the project 
        git clone https://github.com/HossamMoh150/edfa3ly-backedend-test.git
        <br>
2- intall composer 
        composer install
               <br>
3-create databse on your local host serve 
       <br>
4- migrate the talble 
       <br>
        php artisan migrate
               <br>
        php artisan db:seed       
               <br>

use psotman or any rest tool to create oreder and recive a bill       <br>
        api : http://127.0.0.1:8000/api/order       <br>
        form data :       <br>
            currency:egp       <br>
            products[]:1       <br>
            products[]:1       <br>
            products[]:2       <br>
            products[]:4       <br>

or use postman collection (uploded)        <br>

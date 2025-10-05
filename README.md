# Ingenieria_Software_2

En el microservicio de reportes para generar los pdf utilice la DOMPDF para lo cual se necesita ejecutar el comando: "composer require barryvdh/laravel-dompdf".
Ademas en ese mismo microservicio para generar reportes utilice maatwebsite para lo cual es necesario ejecutar el comando: "composer require maatwebsite/Excel".

Cuando se quiere descargar estos reportes desde Thunder Client, no funciono debido a que la versión gratuita no cuenta con esa función. 
Entonces toca levantar el proyecto con "php artisan serve", copiar el endpoint que se usaria en el Thunder Client y pegarlo en el navegador. Asi el navegador descargará el reporte solicitado.

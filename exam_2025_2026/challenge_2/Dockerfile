FROM dunglas/frankenphp AS app

COPY ./search.php /app/public


FROM nginx AS flag

COPY ./nginx.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/secret

RUN echo "This is the flag. You win." > /var/www/secret/flag.txt

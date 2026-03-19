FROM public.ecr.aws/l4b9c1g4/dunglas/frankenphp:1.12.1-php8.5 AS app

COPY ./search.php /app/public


FROM public.ecr.aws/nginx/nginx:1.29-alpine AS flag

COPY ./nginx.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/secret

RUN echo "This is the flag. You win." > /var/www/secret/flag.txt

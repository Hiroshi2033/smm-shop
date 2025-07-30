FROM webdevops/php-nginx:7.4
WORKDIR /app
COPY nginx-site.conf /opt/docker/etc/nginx/vhost.conf
RUN echo "#!/bin/bash\nphp artisan queue:work >/tmp/work.log 2>&1 &\nsupervisord" > /app/start.sh
RUN [ "sh", "-c", "chmod -R 777 /app" ]
CMD [ "sh", "-c","/app/start.sh" ]

## wp-dev-stack
Local WordPress dev setup using Docker Compose (PHP + Apache2 + MariaDB).

Overview:
- 2 containers, 1 for mariadb 1 for web
- Installation of wordpress manually in the web container 
- Error injection and debug practice
- Explore alternative ways

**Create the compose file (web + db only)**
- apache2 without wordpress
- volume to keep the wordpress installation and data
- read comments

#important commands

```bash
docker compose up -d
docker compose ps
docker exec -it <containerName> <commands> #bash or sh to get into running container

    # or you can put all of these extentions into a DockerFile. much safer
    #https://wilbrown.com/required-php-extensions-for-wordpress-wpquickies/
    apt-get update
    apt-get install -y unzip libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev 
    install -y default-mysql-client libmariadb-dev 
    docker-php-ext-install mysqli
    docker-php-ext-configure gd --with-freetype --with-jpeg
    docker-php-ext-install mysqli zip gd

    cd /var/www/html && rm -rf *
    curl -o wordpress.zip https://wordpress.org/latest.zip
    unzip wordpress.zip 
    mv wordpress/* .
    rmdir wordpress 
    rm wordpress.zip
    chown -R www-data:www-data /var/www/html


troubleshooting:
    ... ps

    docker compose up -d --force-recreate <serviceName> # after a change in compose
    docker volume <opt>
    docker logs <containerName> --tail 100
    

```


**Inside the web container**
- install php extentions needed for wordpress
- install wordpress at /var/www/html (curl and unzip)
    - clear: cd /var/www/html && rm -rf
    - curl: curl -o wordpress.zip https://wordpress.org/latest.zip
    - unzip: unzip wordpress.zip
    - move to main folder (var/www/html)
    - give web permission to the main folder

**Error injection or possible errors:**
- tried with and without DockerFile
- Break DB creds: change MARIADB_PASSWORD or WORDPRESS_DB_PASSWORD
- Stop DB: docker compose stop db - learn dependency failures and retries.
- Wrong DB host: set host to dbb - DNS/service name issues.
- Remove PHP extension: uninstall mysqli - learn extension-related WordPress errors.
- Permissions issue: chmod -R 000 /var/www/html - learn Apache 403/permissions.
- Port conflict: change web port to 80:80 if host uses 80 - learn port binding errors.
- Empty web root: delete html contents - missing index/403.
- Corrupt config: edit wp-config.php - parse and config errors.
- Volume reset: remove volume - data loss and re-init behavior.

**Alternatives: **
- Official wordpress image
- Nginx + PHP-FPM
- Custom Dockerfile
- Build your own PHP+Apache image with extensions preinstalled for repeatable builds.
- LAMP stack on VM
- Local dev tools (XAMPP, MAMP, or LocalWP for easy non-Docker installs)

**TODO or want to try:**
- Harden the setup: strong secrets, non‑root DB user only, .env file for config.
- Add backups: scheduled DB dumps + WordPress uploads backup.
- TLS + custom domain: add a reverse proxy (Traefik or Nginx) and HTTPS.
- Monitoring: basic healthchecks, logs, and uptime alerts.
- Scaling: split PHP‑FPM + Nginx, add caching (Redis) and CDN.
- CI/CD: build images, run tests, and deploy automatically.
- Production migration: move to managed DB, object storage, and container hosting.

**V1 findings:**
1. Not a good practice to use "docker compose exec -it <container> bash"
2. Hard‑coded credentials should be moved to .env file.
2. Latest Tag drift over time. It might break or change builds over time.
3. Add healthchecks.

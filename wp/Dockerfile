FROM wordpress:5.0.3-php7.3-apache

# 日本語化するために WordPress 日本語版をインストールして展開
ENV WORDPRESS_TAR_FILE wordpress-5.0.3-ja.tar.gz
RUN rm -fr /usr/src/wordpress \
 && curl -O https://ja.wordpress.org/${WORDPRESS_TAR_FILE} \
 && tar -xzf ${WORDPRESS_TAR_FILE} -C /usr/src/ \
 && rm ${WORDPRESS_TAR_FILE} \
 && chown -R www-data:www-data /usr/src/wordpress \
 && mkdir /usr/src/wordpress/wp-content/uploads

# ボリューム化
VOLUME /var/www/html
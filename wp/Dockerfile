FROM wordpress:5.0.3-php7.3-apache

# 日本語化するために WordPress 日本語版をインストールして展開
ENV WORDPRESS_TAR_FILE wordpress-5.0.3-ja.tar.gz
RUN rm -fr /usr/src/wordpress \
 && curl -O https://ja.wordpress.org/${WORDPRESS_TAR_FILE} \
 && tar -xzf ${WORDPRESS_TAR_FILE} -C /usr/src/ \
 && rm ${WORDPRESS_TAR_FILE} \
 && chown -R www-data:www-data /usr/src/wordpress \
 && mkdir /usr/src/wordpress/wp-content/uploads

# 必要なファイルをコピー
COPY --chown=www-data:www-data ./plugins/ /usr/src/wordpress/wp-content/plugins/
COPY --chown=www-data:www-data ./themes/kvjnf /usr/src/wordpress/wp-content/themes/kvjnf
COPY --chown=www-data:www-data ./wp-config.php /usr/src/wordpress/wp-config.php
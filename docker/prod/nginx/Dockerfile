FROM nginx:alpine

# Copia o arquivo de configuração customizado do Nginx
COPY default.conf /etc/nginx/conf.d/default.conf

# Expondo a porta 80
EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]

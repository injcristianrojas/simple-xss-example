FROM alpine:latest

RUN apk add --update nginx bash
RUN rm /var/cache/apk/*

COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 80
CMD ["nginx", "-g", "daemon off; error_log stderr info;"]

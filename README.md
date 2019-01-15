Extended videojs-vast plugin for wordpress
===================

Es un plugin para wordpress, mediante un shortcode crea un reproductor de video y carga un archivo VAST, al generar el reproductor de video necesita archivos mp4 y webm, pero lo inicia con el archivo VAST como publicidad previa que debe verse durante unos segundos para poder saltarla y ver el video

### Instalar

Copia la carpeta dentro de tu instalación de wordpress /wp-content/plugins/

Entra como administrador a wordpress y en la sección de plugins busca el plugin "Extended videojs-vast plugin for wordpress" y activalo

### Usar

Se usa como shortcode dentro de wordpress

```
[BESVID width="" height="" mp4="" webm="" vast=""]
```

width: pixeles
height: pixeles
mp4: url del archivo mp4, obligatorio
webm: url del archivo webm, obligatorio
vast: url del archivo xml VAST, obligatorio

Al generar el reproductor de video automáticamente le quita el sonido y lo reproducte

### Creditos
Este plugin fue adaptado de [videojs-vast-plugin](https://github.com/theonion/videojs-vast-plugin) para ser un plugin de wordpress
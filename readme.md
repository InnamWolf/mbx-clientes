# Sistema Mexicana Becas

Sistema para actualización

> Por favor lea el README para entender la configuración del ambiente de trabajo.

# Carpeta Javascript JS

## Carpeta LIB
Dentro de esta carpeta se colocaran todas las librerias ocupadas dentro del proyecto, asi mismo deberam ser indentificadas cada uno dentro de la carpeta correspondiente.

* Nombre_Carpeta => boostrap.js
* Nombre_Carpeta => sweetAlert2.js

# Carpeta SASS

**Importante**
> Ningun archivo dentro de estar carpetas debe de general un CSS el unico archivo que se general compila es el main.css

---

**Implementacion de SASS**
> Este documento sirve para organizar de una manera ordenada cada archivo que contenga la carpeta SASS a continuacion se describe el contenido de cada carpeta para mantener el orden.

## Modelo BEM

Se ocuapra siempre el modelo BEM para clases utilizados en SASS

[BEM video](https://www.youtube.com/watch?v=bvnzyXGkNY4&ab_channel=FalconMasters)

[BEM cheats sheet](https://9elements.com/bem-cheat-sheet/)

## Carpeta Base

Puedes encontrar el archivo reset para reiniciar los estilos CSS, algunas reglas tipográficas

* _reset.sass
* _typo.sass

## Carpeta Components
Para componentes más pequeños, como botones, tarjetas, modales, slider, etc.
* _buttons.scss
* _modal.scss

## Carpeta Layout
Esta carpeta puede contener hojas de estilo para las partes principales del sitio (header, footer, navigation, sidebar…)

* _header.sass
* _footer.sass
* _forms.sass
  
## Carpeta Pages
Estilos específicos para cada página, que contenga el proyecto

* _home.sass
* _contact.sass

## Carpeta Themes
Almacenar los estilos referidos a diferentes themes que pueda adoptar nuestro proyecto en función, por ejemplo, del tipo de usuario o la sección que esté visualizándose.

* _theme.scss
* _admin.scss
* _night.scsss
* _light.scss

## Carpeta Utilities
En esta carpeta se encuentran las funciones, variables y mixins que emplearemos en el resto de ficheros.

* _variables.sass
* _functions.sass
* _mixins.sass

## Vendor
Contiene todos los archivos CSS procedentes de librerías externas y frameworks – Normalize, Bootstrap, jQueryUI, FancyCarouselSliderjQueryPowered, etc.

* _normalize.scss
* _bootstrap.scss
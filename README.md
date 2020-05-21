# SGF-Refaccionaria
Sistema de Generación de Facturas e Inventario para una refaccionaria.
## Guia de Github

### Esencial con Github

1. Mostrar los archivos y directorios modificados o creados `git status`.
1. Agregar todos los cambios realizados `git add . `, si se desea agregar uno en especifico `git add nombre_archivo` si esta al mismo nivel, sino especificar la ruta `git add ruta/nombre_archivo`
1. Crear un commit  `git commit -m "mensaje del commit"` agrega una descripcion de los cambios que se hicieron.
1. Para subir los cambios hacer un push `git push origin master` despues de la palabra  `origin` agrega el branch en el que se encuentra, por lo regular ocuparemos la rama de  `master`. Si deseas hacer un push a otra branch cambia el nombre del branch.
1. Para descargar los cambios hacer un pull  `git pull origin master` despues de la palabra  `origin` agrega el branch en el que se encuntra, por lo regular ocuparemos la rama de  `master`. Si deseas hacer un pull a otra branch cambia el nombre del branch.
1. Si te equivocaste usa `git checkout nombre_archivo` para revertir todos los cambios sobre el arvhico. Si deseas volver por completo a la última version a la que hiciste pull usa `git checkout -- .` esto eliminara todos los cambios que hayas hecho.

### Como hacer un commit

1. Usar notacion `add():`, `update():`, `fix():` o `delete():` para indicar el tipo de commit.
2. Dentro del paréntesis indicar el modulo que se está actualizando, seguido del Caso de Uso.
3. Posterior a los dos puntos escribir una descripción de lo que se realizó.

Ejemplo:
```
  git commit -m "Se agreago la función de autocompletado"
```

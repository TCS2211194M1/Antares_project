import os
import fileinput
import re

def cambiar_direcciones_en_archivo(ruta_archivo, cadena_antigua, cadena_nueva):
    try:
        # Reemplazar la cadena antigua por la nueva en cada línea del archivo
        with fileinput.FileInput(ruta_archivo, inplace=True, backup=".bak") as archivo:
            for linea in archivo:
                # Reemplazar la cadena antigua por la nueva en la línea actual (insensible a mayúsculas/minúsculas)
                nueva_linea = re.sub(re.escape(cadena_antigua), cadena_nueva, linea, flags=re.IGNORECASE)
                # Imprimir la nueva línea en el archivo
                print(nueva_linea, end='')

        # Informar que el cambio de direcciones ha sido completado en el archivo
        print(f"Cambio de '{cadena_antigua}' a '{cadena_nueva}' completado en el archivo: {ruta_archivo}")
    except Exception as e:
        # Manejar cualquier excepción que pueda ocurrir durante el proceso
        print(f"Error: {e}")

if __name__ == "__main__":
    # Utilizar rutas absolutas y barras invertidas
    archivos_a_modificar = [
        r"C:\xampp\htdocs\www\Antares_project\main.php",
        r"C:\xampp\htdocs\www\Antares_project\login.php",
        r"C:\xampp\htdocs\www\Antares_project\account.php"
    ]
    cadena_antigua = "Project_Samava"
    cadena_nueva = "Antares_project"

    # Llamar a la función para cambiar direcciones en los archivos PHP
    for archivo_php in archivos_a_modificar:
        cambiar_direcciones_en_archivo(archivo_php, cadena_antigua, cadena_nueva)

#AGREGAR LA FUNCIONALIDAD DE QUE MUESTRE LA RUTA DONDE SE ALMACENAN LOS LOGS DE LA CLASE client.lib.php Y PREGUUNTARLE AL USUARIO SI LA DESEA CAMBIAR, 
       # EN CASO AFIRMATIVO INGRESAR LA RUTA DESEADA Y COMPROBAR QUE LA RUTA EXISTA EN CASO CONTRARIO DEJAR LA MISMA, NO MODIFICAR NAADA
        # ASI PARA TODAS LAS CLASES QUE GENEREN LOGS 


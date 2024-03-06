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

def cambiar_direcciones_en_carpeta(carpeta, cadena_antigua, cadena_nueva):
    try:
        # Recorrer todos los archivos en la carpeta y sus subdirectorios
        for carpeta_actual, subdirectorios, archivos in os.walk(carpeta):
            for nombre_archivo in archivos:
                if nombre_archivo.endswith(".php"):  # Cambiar solo archivos PHP, puedes ajustar según tus necesidades
                    ruta_archivo = os.path.join(carpeta_actual, nombre_archivo)
                    cambiar_direcciones_en_archivo(ruta_archivo, cadena_antigua, cadena_nueva)
    except Exception as e:
        print(f"Error al procesar archivos en la carpeta {carpeta}: {e}")

if __name__ == "__main__":
    # Utilizar rutas absolutas y barras invertidas
    carpeta_del_proyecto = r"C:\xampp\htdocs\www\Antares_project"
    cadena_antigua = "Project_Samava"
    cadena_nueva = "Antares_project"

    # Llamar a la función para cambiar direcciones en todos los archivos PHP dentro de la carpeta y subdirectorios
    cambiar_direcciones_en_carpeta(carpeta_del_proyecto, cadena_antigua, cadena_nueva)

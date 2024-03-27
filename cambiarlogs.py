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

def cambiar_ruta_logs():
    cambiar_logs = input("¿Desea cambiar la ruta de los logs? (s/n): ").strip().lower()
    if cambiar_logs == 's':
        nueva_ruta_logs = input("Ingrese la nueva ruta para los logs: ").strip()
        if nueva_ruta_logs:
            return nueva_ruta_logs
        else:
            print("No ha ingresado una nueva ruta para los logs. Manteniendo la ruta actual.")
    return None

if __name__ == "__main__":
    # Utilizar rutas absolutas y barras invertidas
    archivos_a_modificar = [
        r"C:\xampp\htdocs\www\Antares_project\main.php",
        r"C:\xampp\htdocs\www\Antares_project\login.php",
        r"C:\xampp\htdocs\www\Antares_project\account.php"
    ]
    cadena_antigua = "Project_Samava"
    cadena_nueva = "Antares_project"

    # Cambiar la ruta de los logs si es necesario
    nueva_ruta_logs = cambiar_ruta_logs()
    if nueva_ruta_logs:
        # Reemplazar la ruta de los logs en la cadena antigua y nueva
        cadena_antigua_logs = r"php\\logs\\log.txt"
        cadena_nueva_logs = nueva_ruta_logs.replace("\\", "\\\\") + r"\\log.txt"
        cadena_antigua = cadena_antigua.replace(cadena_antigua_logs, cadena_nueva_logs)
        cadena_nueva = cadena_nueva.replace(cadena_antigua_logs, cadena_nueva_logs)

    # Llamar a la función para cambiar direcciones en los archivos PHP
    for archivo_php in archivos_a_modificar:
        cambiar_direcciones_en_archivo(archivo_php, cadena_antigua, cadena_nueva)

# update_string.py
import os
import fileinput
import re
import datetime

# Variables
script_directory = os.path.dirname(os.path.abspath(__file__)) # Directorio donde de encuentra este script
log_dir = os.path.join(script_directory, "update_string_logs") # Directorio donde se almacenan los logs
log_file = os.path.join(log_dir, datetime.datetime.now().strftime('%Y-%m-%d_%H-%M-%S') + '_update_path_log.txt') # Archivo de log

cadena_antigua = "Project_Samava"
cadena_nueva = "Antares_project"

def cambiar_direcciones_en_archivo(ruta_archivo, cadena_antigua, cadena_nueva, log_file):
    try:
        # Reemplazar la cadena antigua por la nueva en cada línea del archivo
        with fileinput.FileInput(ruta_archivo, inplace=True, backup=".bak") as archivo:
            for linea in archivo:
                # Reemplazar la cadena antigua por la nueva en la línea actual (insensible a mayúsculas/minúsculas)
                nueva_linea = re.sub(re.escape(cadena_antigua), cadena_nueva, linea, flags=re.IGNORECASE)
                # Imprimir la nueva línea en el archivo
                print(nueva_linea, end='')

        # Informar que el cambio de direcciones ha sido completado en el archivo
        mensaje = f"Cambio de '{cadena_antigua}' a '{cadena_nueva}' completado en el archivo: {ruta_archivo}"
        print(mensaje)
        registrar_evento(log_file, mensaje)
    except Exception as e:
        # Manejar cualquier excepción que pueda ocurrir durante el proceso
        mensaje_error = f"Error: {e}"
        print(mensaje_error)
        registrar_evento(log_file, mensaje_error)

def crear_directorio_si_no_existe(directory):
    if not os.path.exists(directory):
        os.makedirs(directory)

def buscar_archivos_php(directorio):
    archivos_php = []
    for archivo in os.listdir(directorio):
        if archivo.endswith(".php"):
            archivos_php.append(os.path.join(directorio, archivo))
    return archivos_php

def registrar_evento(log_file, mensaje):
    with open(log_file, 'a') as log:
        log.write(f"{datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')} - {mensaje}\n")

def main():
    crear_directorio_si_no_existe(log_dir)

    # Buscar archivos PHP en el directorio del script
    archivos_php = buscar_archivos_php(script_directory)

    # Llamar a la función para cambiar direcciones en los archivos PHP
    for archivo_php in archivos_php:
        cambiar_direcciones_en_archivo(archivo_php, cadena_antigua, cadena_nueva, log_file)

if __name__ == "__main__":
    main()
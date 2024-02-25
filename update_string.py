import os
import fileinput
import re
import datetime

# Variables globales
script_directory = os.path.dirname(os.path.abspath(__file__))  # Directorio donde se encuentra este script
log_dir = os.path.join(script_directory, "update_string_logs")  # Directorio donde se almacenan los logs
log_file = os.path.join(log_dir, datetime.datetime.now().strftime('%Y-%m-%d_%H-%M-%S') + '_update_path_log.txt')  # Archivo de log

def solicitar_cadena(prompt):
    while True:
        cadena = input(prompt).strip()  # Eliminar espacios en blanco al principio y al final
        confirmacion = input(f"Ha ingresado: '{cadena}'. ¿Es esto correcto? (S/N): ").strip().lower()
        
        if confirmacion == "s" or confirmacion == "s":
            return cadena
        elif confirmacion == "n":
            print("Por favor, ingrese la cadena nuevamente.")
        else:
            print("Por favor, responda con 'S' o 'N'.")

def cambiar_direcciones_en_archivo(ruta_archivo, cadena_antigua, cadena_nueva, log_file):
    try:
        # Contador para el número de veces que se cambió la cadena en el archivo
        contador_cambios = 0
        
        # Reemplazar la cadena antigua por la nueva en cada línea del archivo
        with fileinput.FileInput(ruta_archivo, inplace=True, backup=".bak") as archivo:
            for linea in archivo:
                # Reemplazar la cadena antigua por la nueva en la línea actual (insensible a mayúsculas/minúsculas)
                nueva_linea, num_cambios = re.subn(re.escape(cadena_antigua), cadena_nueva, linea, flags=re.IGNORECASE)
                contador_cambios += num_cambios  # Actualizar el contador con el número de cambios en esta línea
                # Imprimir la nueva línea en el archivo
                print(nueva_linea, end='')

        # Informar que el cambio de direcciones ha sido completado en el archivo y cuántas veces se cambió
        mensaje = f"Cambio de '{cadena_antigua}' a '{cadena_nueva}' completado en el archivo: {ruta_archivo}. Número de cambios: {contador_cambios}"
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
    # Crear directorio de logs si no existe
    crear_directorio_si_no_existe(log_dir)

    
    # Solicitar al usuario el valor de cadena_antigua
    cadena_antigua = solicitar_cadena("Ingrese la cadena antigua: ")

    # Solicitar al usuario el valor de cadena_nueva
    cadena_nueva = solicitar_cadena("Ingrese la nueva cadena: ")

    # Buscar archivos PHP en el directorio del script
    archivos_php = buscar_archivos_php(script_directory)

    # Llamar a la función para cambiar direcciones en los archivos PHP
    for archivo_php in archivos_php:
        cambiar_direcciones_en_archivo(archivo_php, cadena_antigua, cadena_nueva, log_file)

if __name__ == "__main__":
    main()

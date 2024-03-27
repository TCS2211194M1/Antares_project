import os
import sys
import datetime

script_directory = os.path.dirname(os.path.abspath(__file__))
log_dir = os.path.join(script_directory, "logs")
log_file = os.path.join(log_dir, datetime.datetime.now().strftime('%Y-%m-%d_%H-%M-%S') + '_log.txt')

# Función para crear el directorio de logs si no existe
def crear_directorio_logs():
    if not os.path.exists(log_dir):
        os.makedirs(log_dir)

# Función para registrar un evento en el log y mostrarlo en la terminal
def registrar_evento(evento):
    # Crear el directorio de logs si no existe
    crear_directorio_logs()

    # Obtener la fecha y hora actual
    fecha_hora_actual = datetime.datetime.now()
    
    # Formatear el evento con la fecha y hora
    evento_formateado = "[{}] {}".format(fecha_hora_actual, evento)
    
    # Escribir el evento en el archivo de log
    with open(log_file, "a") as archivo_log:
        archivo_log.write(evento_formateado + "\n")

# Función para obtener la ruta del script
def obtener_ruta_script():
    # Obtener la ruta del script actual
    ruta_script = os.path.realpath(__file__)
    
    # Imprimir la ruta del script
    registrar_evento("La ruta del script actual es: " + ruta_script)
    return ruta_script

# Función para buscar archivos PHP en el directorio del script y guardarlos en el directorio php_control
def buscar_y_guardar_archivos_php():
    # Crear el directorio php_control si no existe
    php_control_dir = os.path.join(script_directory, "php_control")
    if not os.path.exists(php_control_dir):
        os.makedirs(php_control_dir)
        registrar_evento("Directorio php_control creado")
    
    # Obtener la lista de archivos en el directorio actual
    archivos_en_directorio = os.listdir(script_directory)
    
    # Filtrar archivos PHP
    archivos_php = [archivo for archivo in archivos_en_directorio if archivo.endswith(".php")]
    
    # Guardar los nombres de los archivos PHP en un archivo dentro del directorio php_control
    php_control_file = os.path.join(php_control_dir, "archivos_php.txt")
    with open(php_control_file, "w") as archivo_php_control:
        for archivo_php in archivos_php:
            archivo_php_control.write(archivo_php + "\n")
    
    registrar_evento(f"Archivos PHP guardados en php_control. Total encontrados: {len(archivos_php)}")
    
    # Crear directorios para cada archivo PHP
    for archivo_php in archivos_php:
        nombre_directorio = "logs_" + os.path.splitext(archivo_php)[0]
        directorio = os.path.join(script_directory, nombre_directorio)
        os.makedirs(directorio)
        registrar_evento(f"Directorio {nombre_directorio} creado para el archivo {archivo_php}")

# Función principal
def main():
    # Redirigir stdout al archivo de log
    crear_directorio_logs()  # Crear directorio de logs
    sys.stdout = open(log_file, "a")
    
    registrar_evento("Inicio del script")  # Generar log de inicio del script
    obtener_ruta_script()  # obtener la ruta del script
    
    # Buscar archivos PHP en el directorio del script y guardarlos en php_control
    buscar_y_guardar_archivos_php()

main()
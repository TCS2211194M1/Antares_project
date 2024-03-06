import os

def eliminar_archivos_bak(carpeta):
    try:
        # Recorrer todos los archivos en la carpeta y subdirectorios
        for carpeta_actual, _, archivos in os.walk(carpeta):
            for nombre_archivo in archivos:
                if nombre_archivo.endswith(".bak"):
                    ruta_archivo = os.path.join(carpeta_actual, nombre_archivo)
                    os.remove(ruta_archivo)
                    print(f"Archivo {ruta_archivo} eliminado.")
    except Exception as e:
        print(f"Error al eliminar archivos .bak en la carpeta {carpeta}: {e}")

if __name__ == "__main__":
    # Utilizar ruta absoluta y barras invertidas
    carpeta_del_proyecto = r"C:\xampp\htdocs\www\Antares_project"

    # Llamar a la función para eliminar archivos .bak en la carpeta y subdirectorios
    eliminar_archivos_bak(carpeta_del_proyecto)

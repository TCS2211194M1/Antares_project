import os
import fileinput

def cambiar_direcciones_en_archivo(ruta_archivo, cadena_antigua, cadena_nueva):
    try:
        # Reemplazar la cadena antigua por la nueva en cada línea del archivo
        with fileinput.FileInput(ruta_archivo, inplace=True, backup=".bak") as archivo:
            for linea in archivo:
                # Reemplazar la cadena antigua por la nueva en la línea actual
                nueva_linea = linea.replace(cadena_antigua, cadena_nueva)
                # Imprimir la nueva línea en el archivo
                print(nueva_linea, end='')

        # Informar que el cambio de direcciones ha sido completado en el archivo
        print(f"Cambio de '{cadena_antigua}' a '{cadena_nueva}' completado en el archivo.")
    except Exception as e:
        # Manejar cualquier excepción que pueda ocurrir durante el proceso
        print(f"Error: {e}")

if __name__ == "__main__":
    # Utilizar rutas absolutas y barras invertidas
    archivo_php = r"C:\xampp\htdocs\www\Antares_project\account.php"
    cadena_antigua = "../Project_Samava/"
    cadena_nueva = "../Antares_project/"

    # Llamar a la función para cambiar direcciones en el archivo PHP
    cambiar_direcciones_en_archivo(archivo_php, cadena_antigua, cadena_nueva)

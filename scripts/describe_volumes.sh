#!/bin/bash
# describe_volumes.sh

# variables
CURRENT_DIR="$(cd "$(dirname "${0}")" && pwd)"
CSV_STORAGE_FILE="t_storage.csv"
CSV_STORAGE_PATH="$CURRENT_DIR/$CSV_STORAGE_FILE"
CSV_PARTITIONS_FILE="t_partitions.csv"
CSV_PARTITIONS_PATH="$CURRENT_DIR/$CSV_PARTITIONS_FILE"

# Función para obtener información detallada sobre una unidad de disco
function get_disk_info() {
    local device_name="/dev/$1"
    
    # Comprobar si el dispositivo existe antes de ejecutar lsblk
    if [ -e "$device_name" ]; then
        # Obtener información de lsblk en formato JSON
        local lsblk_info=$(lsblk -Jbno NAME,SIZE,MOUNTPOINT "$device_name")
        
        if [ -n "$lsblk_info" ]; then
            echo "Información para el dispositivo '$device_name':"
            
            # Extraer el tamaño de la unidad de disco
            local size=$(echo "$lsblk_info" | jq -r '.blockdevices[0].size')
            echo "Tamaño de la unidad '$device_name': $size bytes"
            
            # Contador de particiones y espacio particionado
            local partition_count=0
            local partitioned_space=0
            local available_space=0
            
            # Crear un archivo CSV para almacenar la información
            
            # Comprobar si el archivo CSV ya existe
            if [ ! -e "$CSV_PARTITIONS_PATH" ]; then
                echo "Partición,Disco,Tamaño (bytes),Punto de montaje" > "$CSV_PARTITIONS_PATH"
            fi
            
            # Iterar a través de las particiones y dispositivos
            for entry in $(echo "$lsblk_info" | jq -c '.blockdevices[0].children[]?'); do
                local name=$(echo "$entry" | jq -r '.name')
                local size=$(echo "$entry" | jq -r '.size')
                local mountpoint=$(echo "$entry" | jq -r '.mountpoint')
                
                # Comprobar si es una partición
                if [ "$mountpoint" != "null" ]; then
                    echo "Partición: $name"
                    echo "Tamaño: $size bytes"
                    echo "Punto de montaje: $mountpoint"
                    ((partition_count++))
                    ((partitioned_space += size))
                    
                    # Guardar información de la partición en el archivo CSV
                    echo "$name,$device_name,$size,$mountpoint" >> "$CSV_PARTITIONS_PATH"
                fi
            done
            
            # Calcular espacio no particionado
            if [ $size -ge $partitioned_space ]; then
                available_space=$((size - partitioned_space))
            else
                available_space=0
            fi
            
            echo "Cantidad de particiones: $partition_count"
            echo "Espacio particionado: $partitioned_space bytes"
            echo "Espacio no particionado: $available_space bytes"
        else
            echo "No se pudo obtener información para '$device_name'."
        fi
    else
        echo "El dispositivo '$device_name' no existe"
    fi
}



# Función principal que procesa el CSV
function volumes() {
    local first_line=true
    
    while IFS=',' read -r _ device_name _; do
        # Saltar la primera línea (encabezado)
        if [ "$first_line" = true ]; then
            first_line=false
            continue
        fi
        
        # Procesar la línea actual
        echo "Unidad de disco: $device_name"

        # Llamar a la función para obtener el tamaño de la unidad de disco
        get_disk_info "$device_name"
        echo "---------------------------------------------------"
    done < "$CSV_STORAGE_PATH"
}

# Llamar a la función principal
volumes

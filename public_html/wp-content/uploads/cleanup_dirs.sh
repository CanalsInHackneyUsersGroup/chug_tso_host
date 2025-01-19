#!/bin/bash

# Function to check if a directory has been properly zipped
check_zip() {
    local dir=$1
    local dirname=${dir%/}
    
    # Check for regular zip
    if [ -f "${dirname}.zip" ]; then
        return 0
    fi
    
    # Check for split zip parts
    if ls "${dirname}.zip.part"* 1>/dev/null 2>&1; then
        return 0
    fi
    
    return 1
}

# Loop through all directories
for dir in */; do
    if [ -d "$dir" ]; then
        dirname=${dir%/}
        
        if check_zip "$dir"; then
            echo "Removing directory: $dirname (zip file exists)"
            rm -rf "$dir"
        else
            echo "Warning: Keeping $dirname - no zip file found"
        fi
    fi
done

echo "Cleanup complete!"

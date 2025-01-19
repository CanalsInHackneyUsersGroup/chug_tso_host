#!/bin/bash

# Maximum size in bytes (100MB = 100*1024*1024)
MAX_SIZE=$((100 * 1024 * 1024))

# Loop through all directories in current path
for dir in */; do
    if [ -d "$dir" ]; then
        # Remove trailing slash from directory name
        dirname=${dir%/}
        
        # Create initial zip
        zip -r "${dirname}.zip" "$dirname"
        
        # Check file size
        size=$(stat -f%z "${dirname}.zip")
        
        if [ $size -gt $MAX_SIZE ]; then
            # Remove the original zip
            rm "${dirname}.zip"
            
            # Split into 95MB chunks (leaving some buffer)
            split -b 95m -d "${dirname}.zip" "${dirname}.zip.part"
            
            echo "Split ${dirname}.zip into chunks due to size ($size bytes)"
        else
            echo "Created ${dirname}.zip ($size bytes)"
        fi
    fi
done

# Print completion message with instructions
echo "
Zipping complete!
If you have split files, you can reassemble them using:
cat filename.zip.part* > filename.zip"

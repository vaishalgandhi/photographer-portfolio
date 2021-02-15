<?php

/**
* This function will upload an image and return file name
*
* @param Object $file
* @param string $path
*
* @return string
*/
function uploadImage($file, $path)
{
	// Get filename with the extension
        $filenameWithExt = $file->getClientOriginalName();

        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
        // Upload Image
        $path = $file->move($path ,$fileNameToStore);

        return $fileNameToStore;
}
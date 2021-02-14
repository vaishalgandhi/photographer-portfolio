<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Photographer;
use App\Repositories\BaseRepository;

/**
 * Class PhotographersRepository.
 */
class PhotographersRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Photographer::class;

    /**
     * Returns list of all records
     * 
     * @return mixed
     */
    public function all()
    {
        return $this->getAll();
    }

    /**
     * Create new record.
     * 
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        $model = self::MODEL;

        $input["profile_picture"] = $this->uploadProfilePicture($input["profile_picture"]);

        if ($model::create($input)) {
            return true;
        }

        return false;
    }

    /**
     * Updates specific record.
     * 
     * @param \App\Models\Photographer $photographer
     * @param array $input
     *
     * @return bool
     */
    public function update($photographer, array $input)
    {
        if(array_key_exists('profile_picture', $input)) {
            $input["profile_picture"] = $this->uploadProfilePicture($input["profile_picture"]);
        }

        if ($photographer->update($input)) {
            return true;
        }

        return false;
    }

    /**
     * @param \App\Models\Photographer $photographer
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function delete(Photographer $photographer)
    {
        if ($photographer->delete()) {
            return true;
        }

        return false;
    }

    /**
     * Uploads profile picture
     * 
     * @param Object $file
     *
     * @return string
     */
    public function uploadProfilePicture($file)
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
        $path = $file->move('profile_picture',$fileNameToStore);

        return $fileNameToStore; 
    }
}
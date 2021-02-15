<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Album;
use App\Repositories\BaseRepository;

/**
 * Class AlbumsRepository.
 */
class AlbumsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Album::class;

    /**
     * Returns list of all albums
     * 
     * @return mixed
     */
    public function all()
    {
        return $this->getAll();
    }

    /**
     * Create new album.
     * 
     * @param array $input
     *
     * @return bool
     */
    public function create(array $input)
    {
        $model = self::MODEL;

        $input["img"] = uploadImage($input["img"], 'images/album');

        if ($model::create($input)) {
            return true;
        }

        return false;
    }

    /**
     * Updates specific album.
     * 
     * @param \App\Models\Album $Album
     * @param array $input
     *
     * @return bool
     */
    public function update($Album, array $input)
    {
        if(array_key_exists('img', $input)) {
            $input["img"] = uploadImage($input["img"], 'images/album');
        }

        if ($Album->update($input)) {
            return true;
        }

        return false;
    }

    /**
     * Deletes specific album.
     * 
     * @param \App\Models\Album $album
     *
     * @return bool
     */
    public function delete(Album $album)
    {
        if ($album->delete()) {
            return true;
        }

        return false;
    }
}
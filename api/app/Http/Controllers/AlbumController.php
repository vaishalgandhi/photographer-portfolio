<?php

namespace App\Http\Controllers;

use App\Repositories\AlbumsRepository;
use App\Repositories\PhotographersRepository;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;
use Validator;

class AlbumController extends Controller
{
    /**
     * Associated Repository.
     */
    protected $repository;

    /**
     * Photographer Repository.
     */
    protected $photographerRepository;

    /**
     * Associated Model.
     */
    const MODEL = Album::class;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(AlbumsRepository $repository, PhotographersRepository $photographerRepository)
    {
        $this->repository = $repository;
        $this->photographerRepository = $photographerRepository;
    }

    /**
     * Return the list of Albums.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->repository->all();

        return $this->setStatusCode(200)
            ->respond(AlbumResource::collection($list));
    }

     /**
     * Create Album.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $model = self::MODEL;

        $validation = Validator::make($request->all(), $model::$rules);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }
        
        $photographer = $this->photographerRepository->find($request->photographer_id);

        if(blank($photographer)) {
            return $this->respondNotFound("Photographer not found.");
        }

        $album = $this->repository->create($request->all());

        if($album == true) {
            return $this->setStatusCode(200)
                ->respond(["message" => "Record created successfully."]);
        } else {
            return $this->respondInternalError();
        }
    }

    /**
     * Return the specified album.
     *
     * @param Integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = $this->repository->find($id);
        
        if(blank($album)) {
            return $this->respondNotFound("Record not found.");
        }
        
        return $this->setStatusCode(200)
            ->respond(new AlbumResource($album));
    }

    /**
     * Update the specified album.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Integer $id
     *
     * @return   \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = self::MODEL;
        
        $validationRoles = $model::$rules;
        $validationRoles["img"] = 'nullable';

        $validation = Validator::make($request->all(), $validationRoles);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $photographer = $this->photographerRepository->find($request->photographer_id);

        if(blank($photographer)) {
            return $this->respondNotFound("Photographer not found.");
        }
        
        $album = $this->repository->find($id);

        if(blank($album)) {
            return $this->respondNotFound("Record not found.");
        }

        $album = $this->repository->update($album, $request->all());

        if($album == true) {
            return $this->setStatusCode(200)
                ->respond(["message" => "Record updated successfully."]);
        } else {
            return $this->respondInternalError();
        }
    }

    /**
     * Delete the specified album.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Integer $id
     *
     * @return   \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $album = $this->repository->find($id);

        if(blank($album)) {
            return $this->respondNotFound("Record not found.");
        }

        $album = $this->repository->delete($album);

        if($album == true) {
            return $this->setStatusCode(200)
                ->respond(["message" => "Record deleted successfully."]);
        } else {
            return $this->respondInternalError();
        }
    }
}

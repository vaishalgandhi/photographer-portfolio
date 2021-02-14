<?php

namespace App\Http\Controllers;

use App\Repositories\PhotographersRepository;
use App\Http\Resources\PhotographerResource;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Validator;

class PhotographerController extends Controller
{
    /**
     * Associated Repository.
     */
    protected $repository;

    /**
     * Associated Model.
     */
    const MODEL = Photographer::class;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(PhotographersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the list of photographers.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->repository->all();

        return $this->setStatusCode(200)
            ->respond(PhotographerResource::collection($list));
    }

     /**
     * Create Photographer.
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

        $photographer = $this->repository->create($request->all());

        if($photographer == true) {
            return $this->setStatusCode(200)
                ->respond(["message" => "Record created successfully."]);
        } else {
            return $this->respondInternalError();
        }
    }

    /**
     * Return the specified photographer.
     *
     * @param Integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photographer = $this->repository->find($id);
        
        if(blank($photographer)) {
            return $this->respondNotFound("Record not found.");
        }
        
        return $this->setStatusCode(200)
            ->respond(PhotographerResource::collection($photographer));
    }

    /**
     * Update the specified record.
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
        $validationRoles["email"] = 'email|unique:photographers,email,'.$id;
        $validationRoles["profile_picture"] = 'nullable';

        $validation = Validator::make($request->all(), $validationRoles);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $photographer = $this->repository->find($id);

        if(blank($photographer)) {
            return $this->respondNotFound("Record not found.");
        }

        $photographer = $this->repository->update($photographer, $request->all());

        if($photographer == true) {
            return $this->setStatusCode(200)
                ->respond(["message" => "Record updated successfully."]);
        } else {
            return $this->respondInternalError();
        }
    }

    /**
     * Delete the specified record.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Integer $id
     *
     * @return   \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $photographer = $this->repository->find($id);

        if(blank($photographer)) {
            return $this->respondNotFound("Record not found.");
        }

        $photographer = $this->repository->delete($photographer);

        if($photographer == true) {
            return $this->setStatusCode(200)
                ->respond(["message" => "Record deleted successfully."]);
        } else {
            return $this->respondInternalError();
        }
    }
}

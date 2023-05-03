<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotorRequest;
use App\Models\Motor;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class MotorController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return $this->returnResponse(
            data: Motor::all(),
            message: "ok",
            code: JsonResponse::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotorRequest $request): JsonResponse
    {
        try {
            Motor::create($request->validated());
            return $this->returnResponse(
                message: 'created',
                code: JsonResponse::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            return $this->returnResponse(
                message: $th->getMessage(),
                code: JsonResponse::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Motor $motor): JsonResponse
    {
        return $this->returnResponse(
            $motor,
            'ok',
            JsonResponse::HTTP_OK
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MotorRequest $request, Motor $motor): JsonResponse
    {
        try {
            $motor->update($request->validated());
            return $this->returnResponse(
                message: 'updated',
                code: JsonResponse::HTTP_OK
            );
        } catch (\Throwable $th) {
            return $this->returnResponse(
                message: $th->getMessage(),
                code: JsonResponse::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motor $motor): JsonResponse
    {
        try {
            $motor->delete();
            return $this->returnResponse(
                message: 'deleted',
                code: JsonResponse::HTTP_OK
            );
        } catch (\Throwable $th) {
            return $this->returnResponse(
                message: $th->getMessage(),
                code: JsonResponse::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}

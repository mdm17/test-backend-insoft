<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobilRequest;
use App\Models\Mobil;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class MobilController extends Controller
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
            data: Mobil::all(),
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
    public function store(MobilRequest $request): JsonResponse
    {
        try {
            Mobil::create($request->validated());
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
    public function show(Mobil $mobil): JsonResponse
    {
        return $this->returnResponse(
            $mobil,
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
    public function update(MobilRequest $request, Mobil $mobil): JsonResponse
    {
        try {
            $mobil->update($request->validated());
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
    public function destroy(Mobil $mobil): JsonResponse
    {
        try {
            $mobil->delete();
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

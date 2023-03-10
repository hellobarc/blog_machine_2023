<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveModuleRequest;

use App\Interfaces\ModuleRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\Module;

class ModuleController extends Controller
{
    private ModuleRepositoryInterface $moduleRepository;

    public function __construct(ModuleRepositoryInterface $moduleRepository) 
    {
        $this->moduleRepository = $moduleRepository;
    }

    public function index(): JsonResponse 
    {
        $getData = $this->moduleRepository->getAll();
        $allData = CategoryResource::collection($getData);
        return response()->json([
            'data' => $allData,
        ]);
    }

    public function store(SaveModuleRequest $request): JsonResponse 
    {
        $moduleDetails = $request->only([
            'name',
            'meta_keyword',
            'meta_description',
            'page_title',
        ]);
        $moduleDetails['slug'] = Str::slug($request->input('name') ,"-");
        return response()->json(
            [
                'status' => "success",
                'data' => $this->moduleRepository->create($moduleDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $moduleId = $request->route('id');

        return response()->json([
            'data' => $this->moduleRepository->getById($moduleId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $moduleId = $request->route('id');
        
        $moduleDetails = $request->only([
            'name',
            'meta_keyword',
            'meta_description',
            'page_title',
        ]);
        $moduleDetails['slug'] = Str::slug($request->input('name') ,"-");
        return response()->json([
            'status' => "success",
            'data' => $this->moduleRepository->update($moduleId, $moduleDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $moduleId = $request->route('id');
       
        $this->moduleRepository->delete($moduleId);


        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response()->json([
            'status' => "success deleted",
        ]);
    }
}

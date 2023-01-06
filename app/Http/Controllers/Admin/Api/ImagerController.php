<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Services\media\MediaService;
use Illuminate\Http\Request;

class ImagerController extends BaseController
{
    private $mediaService;

    public function __construct()
    {
        $this->mediaService = new MediaService();
    }


    public function upload(Request $request)
    {
        $model = $request->model;
        $column = $request->column;
        $entityColumnName = $request->entityColumnName;
        $entityColumnValue = $request->entityColumnValue;

        $path = $request->pathToSave . uniqid();
        $filename = $this->mediaService->storeFromBase64($request->image, $path);

        try {
            $createdRow = $model::create([
                $entityColumnName => $entityColumnValue,
                $column => $filename,
            ]);
        } catch (\Exception $exception) {
            return $this->sendError('An error occurred while saving data');
        }

        return $this->sendResponse([
            'row' => $createdRow
        ], 'Successful');
    }

    public function delete(Request $request)
    {
        $model = $request->model;
        $rowId = $request->rowId;

        if (!$model) {
            return $this->sendError('No table in data.');
        }

        try {
            $row = $model::where('id', $rowId)->first();
            $filename = $row->filename;

            $row->delete();
            $this->mediaService->delete($filename);
        } catch (\Exception $exception) {
            return $this->sendError('An error occurred while deleting');
        }

        return $this->sendResponse([], 'Successful');
    }

    public function setPreview(Request $request)
    {
        $model = $request->model;
        $id = $request->id;
        $column = $request->columnName;
        $filename = $request->imageUrl;

        if (!$model) {
            return $this->sendError('Model not found');
        }

        try {
            $row = $model::where('id', $id)->first();
            $row->$column = $filename;
            $row->save();
        } catch (\Exception $exception) {
            return $this->sendError('An error occurred while setting preview');
        }

        return $this->sendResponse([], 'Successful');
    }
}

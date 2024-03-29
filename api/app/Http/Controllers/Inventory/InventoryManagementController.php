<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Repository\Inventory\InventoryRepository;
use App\Http\Resources\Inventory\InventoryResource;
use App\Http\Requests\Inventory\InventoryCreateOrUpdateRequest;

class InventoryManagementController extends Controller
{
    use JsonResponseTrait;
    public function __construct(protected InventoryRepository $inventoryRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $offset         = $request['offset'];
        $limit          = $request['limit'];
        $option         = $request['option'];
        $searchData     = $request['searchData'];
        
        try {
            $inventory = $this->inventoryRepository->getAll($offset, $limit, $searchData, $option);
            $totalCount = $inventory['count'];
            return $this->successJsonResponseWithLimitOffset('List of inventory', $option, $offset, $limit, $totalCount, InventoryResource::collection($inventory['result']));
        } catch (\Exception $e) {

            return $this->errorJsonResponse('Error: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryCreateOrUpdateRequest $request)
    {
        try {
            $Inventory = $this->inventoryRepository->create($request->validated() + [
                'user_id' => Auth::user()->id
            ]);

            return $this->createdJsonResponse('Inventory create successfully', new InventoryResource($Inventory));
        } catch (\Exception $e) {
            return $this->errorJsonResponse('Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $inventory = $this->inventoryRepository->findOrFailByID($id);
            return $this->successJsonResponse("The inventory id is: $id", new InventoryResource($inventory));
        } catch (\Exception $e) {
            return $this->errorJsonResponse('Error: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $inventory = $this->inventoryRepository->updateByID($id, $request->all());
            return $this->createdJsonResponse('Inventory update successfully', ['inventory' => new InventoryResource($inventory)]);
        } catch (\Exception $e) {
            return $this->errorJsonResponse('Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->inventoryRepository->deletedByID($id);
            return $this->successJsonResponse('project delete successfully');
        } catch (\Exception $e) {
            return $this->errorJsonResponse('Error: ' . $e->getMessage());
        }
    }
}

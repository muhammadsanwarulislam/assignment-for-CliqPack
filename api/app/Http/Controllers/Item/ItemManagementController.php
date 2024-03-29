<?php

namespace App\Http\Controllers\Item;

use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use Repository\Item\ItemRepository;
use App\Http\Controllers\Controller;
use App\Http\Resources\Item\ItemResource;
use App\Http\Requests\Item\ItemCreateOrUpdateRequest;

class ItemManagementController extends Controller
{
    use JsonResponseTrait;
    public function __construct(protected ItemRepository $itemRepository)
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
            $items = $this->itemRepository->getAll($offset, $limit, $searchData, $option);
            $totalCount = $items['count'];
            return $this->successJsonResponseWithLimitOffset('Item of tasks', $option, $offset, $limit, $totalCount, ItemResource::collection($items['result']));
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
    public function store(ItemCreateOrUpdateRequest $request)
    {
        try {
            // Create the task
            $item = $this->itemRepository->create($request->validated() + [
                'inventory_id'    => $request->input('inventory_id'),
            ]);

            return $this->createdJsonResponse('Item created successfully', new ItemResource($item));
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
            $item = $this->itemRepository->findOrFailByID($id);
            return $this->successJsonResponse("The item id is: $id", new ItemResource($item));
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
            $item = $this->itemRepository->updateByID($id, $request->all());
            return $this->createdJsonResponse('Item update successfully', ['item' => new ItemResource($item)]);
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
            $this->itemRepository->deletedByID($id);
            return $this->successJsonResponse('Item delete successfully');
        } catch (\Exception $e) {
            return $this->errorJsonResponse('Error: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardType\CreateBoardTypeRequest;
use App\Http\Requests\BoardType\UpdateBoardTypeRequest;
use App\Models\BoardType;

class BoardTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boardTypes = BoardType::all();

        if ($boardTypes->isEmpty()) {
            return response()->json([
                'message' => 'no board types found',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'message' => 'success get all board types',
            'data' => $boardTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBoardTypeRequest $request)
    {
        $data = $request->validated();

        $boardType = BoardType::create($data);

        return response()->json([
            'message' => 'success create new board type',
            'data' => $boardType,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardType $boardtype)
    {
        return response()->json([
            'message' => 'success get detail board type',
            'data' => $boardtype,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoardTypeRequest $request, BoardType $boardtype)
    {
        $data = $request->validated();

        $boardtype->board_name = $data['board_name'];
        $boardtype->save();

        return response()->json([
            'message' => 'success update board type',
            'data' => $boardtype,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardType $boardtype)
    {
        $boardtype->delete();

        return response()->json([
            'message' => 'success delete board type',
            'data' => null,
        ]);
    }
}

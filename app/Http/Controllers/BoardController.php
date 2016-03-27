<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Repositories\BoardRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Services\Traits\StatusTrait;

class BoardController extends Controller
{
    use StatusTrait;

    /**
     * @var Board
     */
    private $board;

    /**
     * Validation to check if the board exists
     *
     * @param int $boardId
     * @param BoardRepository $boardRepository
     * @return string
     */
    private function boardExists($boardId, BoardRepository $boardRepository)
    {
        if (!$boardRepository->exists($boardId)) {
            return Response::json([
                'message' => 'This board not exists.',
                'error' => 'NO_RECORD_FOUND',
            ]);
        }

        $this->board = $boardRepository->find($boardId);
    }

    /**
     * Function to set a table as used
     *
     * @param int $boardId
     * @param BoardRepository $boardRepository
     * @return string
     */
    public function open($boardId, BoardRepository $boardRepository)
    {
        $this->boardExists($boardId, $boardRepository);

        // Check if the board is open
        if ($this->isOpen($this->board->status_id)) {
            try {
                $return = $boardRepository->update($boardId, [
                    'status_id' => 2
                ]);
            } catch (\Exception $e) {
                $return = [
                    'message' => 'An error happened.',
                    'error' => 'UNEXPECTED_ERROR',
                ];
            }
        } else {
            $return = [
                'message' => 'This board is already open',
                'error' => 'ALREADY_OPEN',
            ];
        }

        return Response::json($return);
    }

    public function close($boardId, BoardRepository $boardRepository)
    {

    }
}

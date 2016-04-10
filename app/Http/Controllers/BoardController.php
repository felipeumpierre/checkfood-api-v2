<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Dingo\Api\Http\Response;
use App\Repositories\BoardRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class BoardController extends Controller
{
    /**
     * @var BoardRepository
     */
    protected $boardRepository;

    /**
     * @param BoardRepository $boardRepository
     */
    public function __construct(BoardRepository $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }

    /**
     * Function to set a table as used
     *
     * @param  integer $id
     * @return string
     */
    public function open($id)
    {
        $this->handleUpdate($id, 2);
    }

    /**
     * Function to set a table as opened
     *
     * @param  integer $id
     * @return string
     */
    public function close($id)
    {
        $this->handleUpdate($id, 1);
    }

    /**
     * @param  integer $id
     * @param  integer $status
     * @return Response
     */
    protected function handleUpdate($id, $status)
    {
        $exists = Cache::remember(sprintf('board.exists.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            return $this->boardRepository->exists($id);
        });

        if (!$exists) {
            $this->response()->errorNotFound('This board not exists');
        }

        try {
            return $this->boardRepository->update($id, [
                'status_id' => $status
            ]);
        } catch (\Exception $e) {
            $this->response()->errorInternal($e->getMessage());
        }
    }
}

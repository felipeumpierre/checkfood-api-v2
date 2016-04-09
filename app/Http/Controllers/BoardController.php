<?php

namespace App\Http\Controllers;

use App\Repositories\BoardRepository;
use App\Http\Requests;
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
     * Validation to check if the board exists
     *
     * @param  integer $id
     * @return string
     */
    protected function boardExists($id)
    {
        $exists = Cache::remember(sprintf('board.exists.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            return $this->boardRepository->exists($id);
        });

        if (!$exists) {
            $this->response()->errorNotFound('This board not exists');
        }
    }

    /**
     * Function to set a table as used
     *
     * @param  integer $id
     * @return string
     */
    public function open($id)
    {
        $this->handle($id, 2);
    }

    /**
     * Function to set a table as opened
     *
     * @param  integer $id
     * @return string
     */
    public function close($id)
    {
        $this->handle($id, 1);
    }

    /**
     * @param  integer $id
     * @param  integer $status
     * @return mixed
     */
    protected function handle($id, $status)
    {
        $this->boardExists($id);

        try {
            return $this->boardRepository->update($id, [
                'status_id' => $status
            ]);
        } catch (\Exception $e) {
            $this->response()->errorInternal($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use App\Repositories\OpinionRepository;

class OpinionController extends Controller
{
    /**
     * @var OpinionRepository
     */
    protected $opinionRepository;

    /**
     * @param OpinionRepository $opinionRepository
     */
    public function __construct(OpinionRepository $opinionRepository)
    {
        $this->opinionRepository = $opinionRepository;
    }

    /**
     * Show all the opinions
     *
     * @return Response
     */
    public function index()
    {
        return Cache::remember('opinion', Config::get('checkfood.cache.main'), function () {
            return $this->opinionRepository->all();
        });
    }

    /**
     * Insert a new opinion
     *
     * @param  Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            return $this->opinionRepository->create($request->all());
        } catch (\Exception $e) {
            $this->response()->errorInternal();
        }
    }
}

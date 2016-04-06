<?php

namespace App\Http\Controllers;

use App\Repositories\OpinionRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

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
     * @return string
     */
    public function index()
    {
        $opinion = Cache::remember(
            'opinions',
            Config::get('checkfood.cache.main'),
            function () {
                return $this->opinionRepository->all();
            }
        );

        return Response::json($opinion, 200);
    }

    /**
     * Insert a new opinion
     *
     * @param  Request $request
     * @return string
     */
    public function create(Request $request)
    {
        return Response::json(
            $this->opinionRepository->create(
                $request->all()
            ), 201
        );
    }
}

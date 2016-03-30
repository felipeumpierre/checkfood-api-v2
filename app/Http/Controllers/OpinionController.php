<?php

namespace App\Http\Controllers;

use App\Repositories\OpinionRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OpinionController extends Controller
{
    /**
     * Show all the opinions
     *
     * @param  OpinionRepository $opinionRepository
     * @return string
     */
    public function index(OpinionRepository $opinionRepository)
    {
        return Response::json($opinionRepository->all());
    }

    /**
     * Insert a new opinion
     *
     * @param  Request $request
     * @param  OpinionRepository $opinionRepository
     * @return string
     */
    public function create(Request $request, OpinionRepository $opinionRepository)
    {
        try {
            $response = $opinionRepository->create($request->all());
        } catch (\Exception $e) {
            $response = [
                'message' => 'An error happened.',
                'error' => 'UNEXPECTED_ERROR',
            ];
        }

        return Response::json($response);
    }
}

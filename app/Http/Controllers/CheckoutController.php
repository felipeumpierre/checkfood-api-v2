<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\BoardRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StatusRepository;
use App\Services\Traits\RequestTrait;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use App\Repositories\RequestRepository;

class CheckoutController extends Controller
{
    use RequestTrait;

    /**
     * @var RequestRepository
     */
    protected $requestRepository;

    /**
     * @var BoardRepository
     */
    protected $boardRepository;

    /**
     * @var StatusRepository
     */
    protected $statusRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param  RequestRepository $requestRepository
     * @param  BoardRepository $boardRepository
     * @param  StatusRepository $statusRepository
     * @param  ProductRepository $productRepository
     */
    public function __construct(
        RequestRepository $requestRepository,
        BoardRepository $boardRepository,
        StatusRepository $statusRepository,
        ProductRepository $productRepository
    )
    {
        $this->requestRepository = $requestRepository;
        $this->boardRepository = $boardRepository;
        $this->statusRepository = $statusRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param  integer $id
     * @return Response
     */
    public function show($id)
    {
        return Cache::remember(sprintf('checkout.board.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            return $this->requestRepository->with([
                'board',
                'products',
            ])->find($id);
        });
    }

    public function save($id, Request $request)
    {
        $board = $this->boardRepository->find($id);
        $status = $this->statusRepository->find(1);

        $requestModel = $this->requestRepository->getCurrentPlan()->getModel();
        $requestModel->boards_id = $board->id;
        $requestModel->status_id = $status->id;
        $requestModel->save();

        $this->addProducts($request, $requestModel, $this->productRepository);

        return $this->requestRepository->with([
            'products'
        ])->find($requestModel->id);
    }

    public function edit($id, Request $request)
    {

    }
}

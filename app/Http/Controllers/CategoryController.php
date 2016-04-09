<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show all the categories, just `id` and `name`
     *
     * @return string
     */
    public function index()
    {
        return Cache::remember('category', Config::get(), function () {
            return $this->categoryRepository->all([
                'id',
                'name'
            ]);
        });
    }

    /**
     * Show all the details from one category, with the total of products in that category
     *
     * @param  integer $id
     * @return string
     */
    public function show($id)
    {
        return Cache::remember(sprintf('category.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            $category = $this->categoryRepository->find($id);
            $category->totalProducts();
        });
    }

    /**
     * Create a new category
     *
     * @param  Request $request
     * @return string
     */
    public function add(Request $request)
    {
        try {
            return $this->categoryRepository->create(
                $request->all()
            );
        } catch (\Exception $e) {
            $this->response()->errorInternal('An error happened.');
        }
    }

    /**
     * Edit a category
     *
     * @param  integer $id
     * @param  Request $request
     * @return string
     */
    public function edit($id, Request $request)
    {
        $exists = Cache::remember(sprintf('category.exists.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            return $this->categoryRepository->exists($id);
        });

        if (!$exists) {
            $this->response()->errorNotFound('This category not exist');
        }

        try {
            return $this->categoryRepository->update($id, $request->all());
        } catch (\Exception $e) {
            $this->response()->errorInternal('An error happened');
        }
    }
}

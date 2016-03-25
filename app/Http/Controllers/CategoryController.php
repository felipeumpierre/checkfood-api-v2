<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    /**
     * Show all the categories, just `id` and `name`
     *
     * @param CategoryRepository $categoryRepository
     * @return mixed
     */
    public function index(CategoryRepository $categoryRepository)
    {
        return Response::json($categoryRepository->all(['id', 'name']));
    }

    /**
     * Show all the details from one category, with the total of products in that category
     *
     * @param int $categoryId
     * @param CategoryRepository $categoryRepository
     * @return mixed
     */
    public function show($categoryId, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($categoryId);
        $category->totalProducts();

        return Response::json($category);
    }
}

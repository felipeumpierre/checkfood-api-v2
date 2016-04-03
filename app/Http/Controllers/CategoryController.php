<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show all the categories, just `id` and `name`
     *
     * @param  CategoryRepository $categoryRepository
     * @return string
     */
    public function index(CategoryRepository $categoryRepository)
    {
        return response()->json($categoryRepository->all(['id', 'name']));
    }

    /**
     * Show all the details from one category, with the total of products in that category
     *
     * @param  integer $categoryId
     * @param  CategoryRepository $categoryRepository
     * @return string
     */
    public function show($categoryId, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($categoryId);
        $category->totalProducts();

        return response()->json($category);
    }

    /**
     * Create a new category
     *
     * @param  Request $request
     * @param  CategoryRepository $categoryRepository
     * @return string
     */
    public function add(Request $request, CategoryRepository $categoryRepository)
    {
        try {
            $response = $categoryRepository->create($request->all());
        } catch (\Exception $e) {
            $response = [
                'message' => 'An error happened.',
                'error' => 'UNEXPECTED_ERROR',
            ];
        }

        return response()->json($response);
    }

    /**
     * Edit a category
     *
     * @param  integer $id
     * @param  Request $request
     * @param  CategoryRepository $categoryRepository
     * @return string
     */
    public function edit($id, Request $request, CategoryRepository $categoryRepository)
    {
        try {
            if ($categoryRepository->exists($id)) {
                $response = $categoryRepository->update($id, $request->all());
            } else {
                $response = [
                    'message' => 'This category not exist.',
                    'error' => 'NO_RECORD_FOUND',
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'message' => 'An error happened.',
                'error' => 'UNEXPECTED_ERROR',
            ];
        }

        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Get List of books
     * @OA\Get (
     *     path="/api/book",
     *     tags={"Book"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="author",
     *                         type="string",
     *                         example="example name"
     *                     ),
     *                     @OA\Property(
     *                         property="price",
     *                         type="float",
     *                         example="example price"
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         example="example title"
     *                     ),
     *                     @OA\Property(
     *                         property="rate",
     *                         type="number",
     *                         example="example rate"
     *                     ),
     *                      @OA\Property(
     *                         property="description",
     *                         type="string",
     *                         example="example description"
     *                      ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Create book
     * @OA\Post (
     *     path="/api/book",
     *     tags={"Book"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     type="object",
     *                     @OA\Property(
     *                         property="author",
     *                         type="string"
     *                     ),
     *                     @OA\Property(
     *                         property="price",
     *                         type="float"
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string"
     *                     ),
     *                     @OA\Property(
     *                         property="rate",
     *                         type="number"
     *                     ),
     *                      @OA\Property(
     *                         property="description",
     *                         type="string"
     *                     )
     *                 ),
     *                 example={
     *                     "author": "example name",
     *                     "price": "example price",
     *                     "title": "example title",
     *                     "rate": "example rate",
     *                     "description": "example description"
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="number", example=1),
     *             @OA\Property(property="author", type="string", example="name"),
     *             @OA\Property(property="price", type="float", example="price"),
     *             @OA\Property(property="title", type="string", example="title"),
     *             @OA\Property(property="rate", type="number", example="rate"),
     *             @OA\Property( property="description", type="string", example="description"),
     *             @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *             @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="invalid",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="fail")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'author' => 'required',
            'price' => 'required|numeric',
            'title' => 'required',
            'rate' => 'integer',
            'description' => 'string'
        ]);

        $book = Book::create($field);

        return ['book' => $book];
    }

    /**
     * Get a book
     * @OA\Get (
     *     path="/api/book/{id}",
     *     tags={"Book"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="number", example=1),
     *             @OA\Property(property="author", type="string", example="name"),
     *             @OA\Property(property="price", type="float", example="price"),
     *             @OA\Property(property="title", type="string", example="title"),
     *             @OA\Property(property="rate", type="number", example="rate"),
     *             @OA\Property( property="description", type="string", example="description"),
     *             @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *             @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z")
     *         )
     *     )
     * )
     */
    public function show(Book $book)
    {
        return ['book' => $book];
    }

    /**
     * Update book
     * @OA\Put (
     *     path="/api/book/{id}",
     *     tags={"Book"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     type="object",
     *                     @OA\Property(
     *                         property="author",
     *                         type="string"
     *                     ),
     *                     @OA\Property(
     *                         property="price",
     *                         type="float"
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string"
     *                     ),
     *                     @OA\Property(
     *                         property="rate",
     *                         type="number"
     *                     ),
     *                     @OA\Property(
     *                         property="description",
     *                         type="string"
     *                     )
     *                 ),
     *                 example={
     *                     "author": "example name",
     *                     "price": "example price",
     *                     "title": "example title",
     *                     "rate": "example rate",
     *                     "description": "example description",
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="numberr", example=1),
     *             @OA\Property(property="author", type="string", example="name"),
     *             @OA\Property(property="price", type="float", example="price"),
     *             @OA\Property(property="title", type="string", example="title"),
     *             @OA\Property(property="rate", type="number", example="rate"),
     *             @OA\Property( property="description", type="string", example="description"),
     *             @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *             @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z")
     *         )
     *     )
     * )
     */
    public function update(Request $request, Book $book)
    {
        $field = $request->validate([
            'author' => 'required',
            'price' => 'required|numeric',
            'title' => 'required',
            'rate' => 'required|integer',
            'description' => 'required'
        ]);

        $book->update($field);

        return $book;
    }

    /**
     * Delete book
     * @OA\Delete (
     *     path="/api/book/{id}",
     *     tags={"Book"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="THE BOOK IS DELETED")
     *         )
     *     )
     * )
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return ['message' => 'THE BOOK IS DELETED'];
    }
}
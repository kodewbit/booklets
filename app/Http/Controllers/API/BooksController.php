<?php

namespace App\Http\Controllers\API;

use App\Http\Filters\BookFilter;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BooksController extends ApiController
{
    /**
     * Paginate Books model.
     *
     * @param Request $request
     * @param BookFilter $filter
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, BookFilter $filter)
    {
        $resource = Book::filter($filter);

        if ($this->wantsExtendedInformation($request)) {
            $resource = $resource->with($resource->getModel()->getRelations());
        }

        return BookResource::collection($resource->simplePaginate());
    }

    /**
     * Show specific book details.
     *
     * @param Request $request
     * @param $id
     * @return BookResource
     */
    public function show(Request $request, $id)
    {
        $resource = Book::findOrFail($id);

        if ($this->wantsExtendedInformation($request)) {
            $resource = $resource->loadMissing($resource->getRelations());
        }

        return BookResource::make($resource);
    }
}

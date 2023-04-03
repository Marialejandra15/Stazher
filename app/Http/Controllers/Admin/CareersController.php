<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Career\BulkDestroyCareer;
use App\Http\Requests\Admin\Career\DestroyCareer;
use App\Http\Requests\Admin\Career\IndexCareer;
use App\Http\Requests\Admin\Career\StoreCareer;
use App\Http\Requests\Admin\Career\UpdateCareer;
use App\Models\Career;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CareersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCareer $request
     * @return array|Factory|View
     */
    public function index(IndexCareer $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Career::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name_career'],

            // set columns to searchIn
            ['id', 'name_career']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.career.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.career.create');

        return view('admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCareer $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCareer $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Career
        $career = Career::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/careers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/careers');
    }

    /**
     * Display the specified resource.
     *
     * @param Career $career
     * @throws AuthorizationException
     * @return void
     */
    public function show(Career $career)
    {
        $this->authorize('admin.career.show', $career);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Career $career
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Career $career)
    {
        $this->authorize('admin.career.edit', $career);


        return view('admin.career.edit', [
            'career' => $career,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCareer $request
     * @param Career $career
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCareer $request, Career $career)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Career
        $career->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/careers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/careers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCareer $request
     * @param Career $career
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCareer $request, Career $career)
    {
        $career->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCareer $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCareer $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Career::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

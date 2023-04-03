<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Typeinstitution\BulkDestroyTypeinstitution;
use App\Http\Requests\Admin\Typeinstitution\DestroyTypeinstitution;
use App\Http\Requests\Admin\Typeinstitution\IndexTypeinstitution;
use App\Http\Requests\Admin\Typeinstitution\StoreTypeinstitution;
use App\Http\Requests\Admin\Typeinstitution\UpdateTypeinstitution;
use App\Models\Typeinstitution;
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

class TypeinstitutionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTypeinstitution $request
     * @return array|Factory|View
     */
    public function index(IndexTypeinstitution $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Typeinstitution::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'typeinstitution'],

            // set columns to searchIn
            ['id', 'typeinstitution']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.typeinstitution.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.typeinstitution.create');

        return view('admin.typeinstitution.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTypeinstitution $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTypeinstitution $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Typeinstitution
        $typeinstitution = Typeinstitution::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/typeinstitutions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/typeinstitutions');
    }

    /**
     * Display the specified resource.
     *
     * @param Typeinstitution $typeinstitution
     * @throws AuthorizationException
     * @return void
     */
    public function show(Typeinstitution $typeinstitution)
    {
        $this->authorize('admin.typeinstitution.show', $typeinstitution);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Typeinstitution $typeinstitution
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Typeinstitution $typeinstitution)
    {
        $this->authorize('admin.typeinstitution.edit', $typeinstitution);


        return view('admin.typeinstitution.edit', [
            'typeinstitution' => $typeinstitution,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTypeinstitution $request
     * @param Typeinstitution $typeinstitution
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTypeinstitution $request, Typeinstitution $typeinstitution)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Typeinstitution
        $typeinstitution->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/typeinstitutions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/typeinstitutions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTypeinstitution $request
     * @param Typeinstitution $typeinstitution
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTypeinstitution $request, Typeinstitution $typeinstitution)
    {
        $typeinstitution->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTypeinstitution $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTypeinstitution $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Typeinstitution::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

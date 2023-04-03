<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Modality\BulkDestroyModality;
use App\Http\Requests\Admin\Modality\DestroyModality;
use App\Http\Requests\Admin\Modality\IndexModality;
use App\Http\Requests\Admin\Modality\StoreModality;
use App\Http\Requests\Admin\Modality\UpdateModality;
use App\Models\Modality;
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

class ModalitiesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexModality $request
     * @return array|Factory|View
     */
    public function index(IndexModality $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Modality::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name_modality'],

            // set columns to searchIn
            ['id', 'name_modality']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.modality.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.modality.create');

        return view('admin.modality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreModality $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreModality $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Modality
        $modality = Modality::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/modalities'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/modalities');
    }

    /**
     * Display the specified resource.
     *
     * @param Modality $modality
     * @throws AuthorizationException
     * @return void
     */
    public function show(Modality $modality)
    {
        $this->authorize('admin.modality.show', $modality);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Modality $modality
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Modality $modality)
    {
        $this->authorize('admin.modality.edit', $modality);


        return view('admin.modality.edit', [
            'modality' => $modality,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateModality $request
     * @param Modality $modality
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateModality $request, Modality $modality)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Modality
        $modality->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/modalities'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/modalities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyModality $request
     * @param Modality $modality
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyModality $request, Modality $modality)
    {
        $modality->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyModality $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyModality $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Modality::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

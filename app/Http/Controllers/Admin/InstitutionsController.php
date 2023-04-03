<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Institution\BulkDestroyInstitution;
use App\Http\Requests\Admin\Institution\DestroyInstitution;
use App\Http\Requests\Admin\Institution\IndexInstitution;
use App\Http\Requests\Admin\Institution\StoreInstitution;
use App\Http\Requests\Admin\Institution\UpdateInstitution;
use App\Models\Institution;
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

class InstitutionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexInstitution $request
     * @return array|Factory|View
     */
    public function index(IndexInstitution $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Institution::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name_institution', 'address_institution', 'phone_institution'],

            // set columns to searchIn
            ['id', 'name_institution', 'address_institution']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.institution.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.institution.create');

        return view('admin.institution.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInstitution $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreInstitution $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Institution
        $institution = Institution::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/institutions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/institutions');
    }

    /**
     * Display the specified resource.
     *
     * @param Institution $institution
     * @throws AuthorizationException
     * @return void
     */
    public function show(Institution $institution)
    {
        $this->authorize('admin.institution.show', $institution);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Institution $institution
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Institution $institution)
    {
        $this->authorize('admin.institution.edit', $institution);


        return view('admin.institution.edit', [
            'institution' => $institution,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInstitution $request
     * @param Institution $institution
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateInstitution $request, Institution $institution)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Institution
        $institution->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/institutions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/institutions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyInstitution $request
     * @param Institution $institution
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyInstitution $request, Institution $institution)
    {
        $institution->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyInstitution $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyInstitution $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Institution::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

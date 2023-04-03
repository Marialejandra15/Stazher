<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gender\BulkDestroyGender;
use App\Http\Requests\Admin\Gender\DestroyGender;
use App\Http\Requests\Admin\Gender\IndexGender;
use App\Http\Requests\Admin\Gender\StoreGender;
use App\Http\Requests\Admin\Gender\UpdateGender;
use App\Models\Gender;
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

class GendersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGender $request
     * @return array|Factory|View
     */
    public function index(IndexGender $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Gender::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name_gender'],

            // set columns to searchIn
            ['id', 'name_gender']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.gender.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.gender.create');

        return view('admin.gender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGender $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGender $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Gender
        $gender = Gender::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/genders'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/genders');
    }

    /**
     * Display the specified resource.
     *
     * @param Gender $gender
     * @throws AuthorizationException
     * @return void
     */
    public function show(Gender $gender)
    {
        $this->authorize('admin.gender.show', $gender);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gender $gender
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Gender $gender)
    {
        $this->authorize('admin.gender.edit', $gender);


        return view('admin.gender.edit', [
            'gender' => $gender,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGender $request
     * @param Gender $gender
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGender $request, Gender $gender)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Gender
        $gender->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/genders'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/genders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGender $request
     * @param Gender $gender
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGender $request, Gender $gender)
    {
        $gender->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGender $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGender $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Gender::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

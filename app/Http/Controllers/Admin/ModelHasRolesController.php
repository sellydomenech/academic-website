<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModelHasRole\BulkDestroyModelHasRole;
use App\Http\Requests\Admin\ModelHasRole\DestroyModelHasRole;
use App\Http\Requests\Admin\ModelHasRole\IndexModelHasRole;
use App\Http\Requests\Admin\ModelHasRole\StoreModelHasRole;
use App\Http\Requests\Admin\ModelHasRole\UpdateModelHasRole;
use App\Models\ModelHasRole;
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

class ModelHasRolesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexModelHasRole $request
     * @return array|Factory|View
     */
    public function index(IndexModelHasRole $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ModelHasRole::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'role_id', 'model_type', 'model_id'],

            // set columns to searchIn
            ['id', 'model_type']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.model-has-role.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.model-has-role.create');

        return view('admin.model-has-role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreModelHasRole $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreModelHasRole $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ModelHasRole
        $modelHasRole = ModelHasRole::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/model-has-roles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/model-has-roles');
    }

    /**
     * Display the specified resource.
     *
     * @param ModelHasRole $modelHasRole
     * @throws AuthorizationException
     * @return void
     */
    public function show(ModelHasRole $modelHasRole)
    {
        $this->authorize('admin.model-has-role.show', $modelHasRole);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ModelHasRole $modelHasRole
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ModelHasRole $modelHasRole)
    {
        $this->authorize('admin.model-has-role.edit', $modelHasRole);


        return view('admin.model-has-role.edit', [
            'modelHasRole' => $modelHasRole,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateModelHasRole $request
     * @param ModelHasRole $modelHasRole
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateModelHasRole $request, ModelHasRole $modelHasRole)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ModelHasRole
        $modelHasRole->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/model-has-roles'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/model-has-roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyModelHasRole $request
     * @param ModelHasRole $modelHasRole
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyModelHasRole $request, ModelHasRole $modelHasRole)
    {
        $modelHasRole->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyModelHasRole $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyModelHasRole $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ModelHasRole::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

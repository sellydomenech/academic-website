<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModelHasPermission\BulkDestroyModelHasPermission;
use App\Http\Requests\Admin\ModelHasPermission\DestroyModelHasPermission;
use App\Http\Requests\Admin\ModelHasPermission\IndexModelHasPermission;
use App\Http\Requests\Admin\ModelHasPermission\StoreModelHasPermission;
use App\Http\Requests\Admin\ModelHasPermission\UpdateModelHasPermission;
use App\Models\ModelHasPermission;
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

class ModelHasPermissionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexModelHasPermission $request
     * @return array|Factory|View
     */
    public function index(IndexModelHasPermission $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ModelHasPermission::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'permission_id', 'model_type', 'model_id'],

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

        return view('admin.model-has-permission.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.model-has-permission.create');

        return view('admin.model-has-permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreModelHasPermission $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreModelHasPermission $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ModelHasPermission
        $modelHasPermission = ModelHasPermission::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/model-has-permissions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/model-has-permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param ModelHasPermission $modelHasPermission
     * @throws AuthorizationException
     * @return void
     */
    public function show(ModelHasPermission $modelHasPermission)
    {
        $this->authorize('admin.model-has-permission.show', $modelHasPermission);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ModelHasPermission $modelHasPermission
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ModelHasPermission $modelHasPermission)
    {
        $this->authorize('admin.model-has-permission.edit', $modelHasPermission);


        return view('admin.model-has-permission.edit', [
            'modelHasPermission' => $modelHasPermission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateModelHasPermission $request
     * @param ModelHasPermission $modelHasPermission
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateModelHasPermission $request, ModelHasPermission $modelHasPermission)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ModelHasPermission
        $modelHasPermission->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/model-has-permissions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/model-has-permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyModelHasPermission $request
     * @param ModelHasPermission $modelHasPermission
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyModelHasPermission $request, ModelHasPermission $modelHasPermission)
    {
        $modelHasPermission->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyModelHasPermission $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyModelHasPermission $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ModelHasPermission::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

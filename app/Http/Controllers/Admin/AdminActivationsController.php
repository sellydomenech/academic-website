<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminActivation\BulkDestroyAdminActivation;
use App\Http\Requests\Admin\AdminActivation\DestroyAdminActivation;
use App\Http\Requests\Admin\AdminActivation\IndexAdminActivation;
use App\Http\Requests\Admin\AdminActivation\StoreAdminActivation;
use App\Http\Requests\Admin\AdminActivation\UpdateAdminActivation;
use App\Models\AdminActivation;
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

class AdminActivationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAdminActivation $request
     * @return array|Factory|View
     */
    public function index(IndexAdminActivation $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AdminActivation::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['email', 'token', 'used'],

            // set columns to searchIn
            ['email', 'token']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.admin-activation.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.admin-activation.create');

        return view('admin.admin-activation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdminActivation $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAdminActivation $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AdminActivation
        $adminActivation = AdminActivation::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/admin-activations'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/admin-activations');
    }

    /**
     * Display the specified resource.
     *
     * @param AdminActivation $adminActivation
     * @throws AuthorizationException
     * @return void
     */
    public function show(AdminActivation $adminActivation)
    {
        $this->authorize('admin.admin-activation.show', $adminActivation);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AdminActivation $adminActivation
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AdminActivation $adminActivation)
    {
        $this->authorize('admin.admin-activation.edit', $adminActivation);


        return view('admin.admin-activation.edit', [
            'adminActivation' => $adminActivation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdminActivation $request
     * @param AdminActivation $adminActivation
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAdminActivation $request, AdminActivation $adminActivation)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AdminActivation
        $adminActivation->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/admin-activations'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/admin-activations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAdminActivation $request
     * @param AdminActivation $adminActivation
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAdminActivation $request, AdminActivation $adminActivation)
    {
        $adminActivation->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAdminActivation $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAdminActivation $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AdminActivation::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

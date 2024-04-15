<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPasswordReset\BulkDestroyAdminPasswordReset;
use App\Http\Requests\Admin\AdminPasswordReset\DestroyAdminPasswordReset;
use App\Http\Requests\Admin\AdminPasswordReset\IndexAdminPasswordReset;
use App\Http\Requests\Admin\AdminPasswordReset\StoreAdminPasswordReset;
use App\Http\Requests\Admin\AdminPasswordReset\UpdateAdminPasswordReset;
use App\Models\AdminPasswordReset;
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

class AdminPasswordResetsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAdminPasswordReset $request
     * @return array|Factory|View
     */
    public function index(IndexAdminPasswordReset $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AdminPasswordReset::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['email', 'token'],

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

        return view('admin.admin-password-reset.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.admin-password-reset.create');

        return view('admin.admin-password-reset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdminPasswordReset $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAdminPasswordReset $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AdminPasswordReset
        $adminPasswordReset = AdminPasswordReset::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/admin-password-resets'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/admin-password-resets');
    }

    /**
     * Display the specified resource.
     *
     * @param AdminPasswordReset $adminPasswordReset
     * @throws AuthorizationException
     * @return void
     */
    public function show(AdminPasswordReset $adminPasswordReset)
    {
        $this->authorize('admin.admin-password-reset.show', $adminPasswordReset);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AdminPasswordReset $adminPasswordReset
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AdminPasswordReset $adminPasswordReset)
    {
        $this->authorize('admin.admin-password-reset.edit', $adminPasswordReset);


        return view('admin.admin-password-reset.edit', [
            'adminPasswordReset' => $adminPasswordReset,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdminPasswordReset $request
     * @param AdminPasswordReset $adminPasswordReset
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAdminPasswordReset $request, AdminPasswordReset $adminPasswordReset)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AdminPasswordReset
        $adminPasswordReset->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/admin-password-resets'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/admin-password-resets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAdminPasswordReset $request
     * @param AdminPasswordReset $adminPasswordReset
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAdminPasswordReset $request, AdminPasswordReset $adminPasswordReset)
    {
        $adminPasswordReset->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAdminPasswordReset $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAdminPasswordReset $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AdminPasswordReset::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

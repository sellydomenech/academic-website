<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Migration\BulkDestroyMigration;
use App\Http\Requests\Admin\Migration\DestroyMigration;
use App\Http\Requests\Admin\Migration\IndexMigration;
use App\Http\Requests\Admin\Migration\StoreMigration;
use App\Http\Requests\Admin\Migration\UpdateMigration;
use App\Models\Migration;
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

class MigrationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMigration $request
     * @return array|Factory|View
     */
    public function index(IndexMigration $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Migration::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'migration', 'batch'],

            // set columns to searchIn
            ['id', 'migration']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.migration.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.migration.create');

        return view('admin.migration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMigration $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMigration $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Migration
        $migration = Migration::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/migrations'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/migrations');
    }

    /**
     * Display the specified resource.
     *
     * @param Migration $migration
     * @throws AuthorizationException
     * @return void
     */
    public function show(Migration $migration)
    {
        $this->authorize('admin.migration.show', $migration);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Migration $migration
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Migration $migration)
    {
        $this->authorize('admin.migration.edit', $migration);


        return view('admin.migration.edit', [
            'migration' => $migration,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMigration $request
     * @param Migration $migration
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMigration $request, Migration $migration)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Migration
        $migration->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/migrations'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/migrations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMigration $request
     * @param Migration $migration
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMigration $request, Migration $migration)
    {
        $migration->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMigration $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMigration $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Migration::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

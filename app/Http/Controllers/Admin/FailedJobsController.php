<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FailedJob\BulkDestroyFailedJob;
use App\Http\Requests\Admin\FailedJob\DestroyFailedJob;
use App\Http\Requests\Admin\FailedJob\IndexFailedJob;
use App\Http\Requests\Admin\FailedJob\StoreFailedJob;
use App\Http\Requests\Admin\FailedJob\UpdateFailedJob;
use App\Models\FailedJob;
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

class FailedJobsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFailedJob $request
     * @return array|Factory|View
     */
    public function index(IndexFailedJob $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(FailedJob::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'uuid', 'failed_at'],

            // set columns to searchIn
            ['id', 'uuid', 'connection', 'queue', 'payload', 'exception']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.failed-job.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.failed-job.create');

        return view('admin.failed-job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFailedJob $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFailedJob $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the FailedJob
        $failedJob = FailedJob::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/failed-jobs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/failed-jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param FailedJob $failedJob
     * @throws AuthorizationException
     * @return void
     */
    public function show(FailedJob $failedJob)
    {
        $this->authorize('admin.failed-job.show', $failedJob);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FailedJob $failedJob
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(FailedJob $failedJob)
    {
        $this->authorize('admin.failed-job.edit', $failedJob);


        return view('admin.failed-job.edit', [
            'failedJob' => $failedJob,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFailedJob $request
     * @param FailedJob $failedJob
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFailedJob $request, FailedJob $failedJob)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values FailedJob
        $failedJob->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/failed-jobs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/failed-jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFailedJob $request
     * @param FailedJob $failedJob
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFailedJob $request, FailedJob $failedJob)
    {
        $failedJob->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFailedJob $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFailedJob $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    FailedJob::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

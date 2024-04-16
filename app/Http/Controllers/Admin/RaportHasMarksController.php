<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RaportHasMark\BulkDestroyRaportHasMark;
use App\Http\Requests\Admin\RaportHasMark\DestroyRaportHasMark;
use App\Http\Requests\Admin\RaportHasMark\IndexRaportHasMark;
use App\Http\Requests\Admin\RaportHasMark\StoreRaportHasMark;
use App\Http\Requests\Admin\RaportHasMark\UpdateRaportHasMark;
use App\Models\RaportHasMark;
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

class RaportHasMarksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRaportHasMark $request
     * @return array|Factory|View
     */
    public function index(IndexRaportHasMark $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(RaportHasMark::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'raport_id', 'subject_id', 'mark'],

            // set columns to searchIn
            ['id', 'mark', 'note']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.raport-has-mark.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.raport-has-mark.create');

        return view('admin.raport-has-mark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRaportHasMark $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRaportHasMark $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RaportHasMark
        $raportHasMark = RaportHasMark::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/raport-has-marks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/raport-has-marks');
    }

    /**
     * Display the specified resource.
     *
     * @param RaportHasMark $raportHasMark
     * @throws AuthorizationException
     * @return void
     */
    public function show(RaportHasMark $raportHasMark)
    {
        $this->authorize('admin.raport-has-mark.show', $raportHasMark);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RaportHasMark $raportHasMark
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RaportHasMark $raportHasMark)
    {
        $this->authorize('admin.raport-has-mark.edit', $raportHasMark);


        return view('admin.raport-has-mark.edit', [
            'raportHasMark' => $raportHasMark,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRaportHasMark $request
     * @param RaportHasMark $raportHasMark
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRaportHasMark $request, RaportHasMark $raportHasMark)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RaportHasMark
        $raportHasMark->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/raport-has-marks'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/raport-has-marks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRaportHasMark $request
     * @param RaportHasMark $raportHasMark
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRaportHasMark $request, RaportHasMark $raportHasMark)
    {
        $raportHasMark->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRaportHasMark $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRaportHasMark $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RaportHasMark::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

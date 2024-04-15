<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WysiwygMedia\BulkDestroyWysiwygMedia;
use App\Http\Requests\Admin\WysiwygMedia\DestroyWysiwygMedia;
use App\Http\Requests\Admin\WysiwygMedia\IndexWysiwygMedia;
use App\Http\Requests\Admin\WysiwygMedia\StoreWysiwygMedia;
use App\Http\Requests\Admin\WysiwygMedia\UpdateWysiwygMedia;
use App\Models\WysiwygMedia;
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

class WysiwygMediaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWysiwygMedia $request
     * @return array|Factory|View
     */
    public function index(IndexWysiwygMedia $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(WysiwygMedia::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'file_path', 'wysiwygable_id', 'wysiwygable_type'],

            // set columns to searchIn
            ['id', 'file_path', 'wysiwygable_type']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.wysiwyg-media.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.wysiwyg-media.create');

        return view('admin.wysiwyg-media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWysiwygMedia $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWysiwygMedia $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the WysiwygMedia
        $wysiwygMedia = WysiwygMedia::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/wysiwyg-media'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/wysiwyg-media');
    }

    /**
     * Display the specified resource.
     *
     * @param WysiwygMedia $wysiwygMedia
     * @throws AuthorizationException
     * @return void
     */
    public function show(WysiwygMedia $wysiwygMedia)
    {
        $this->authorize('admin.wysiwyg-media.show', $wysiwygMedia);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WysiwygMedia $wysiwygMedia
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(WysiwygMedia $wysiwygMedia)
    {
        $this->authorize('admin.wysiwyg-media.edit', $wysiwygMedia);


        return view('admin.wysiwyg-media.edit', [
            'wysiwygMedia' => $wysiwygMedia,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWysiwygMedia $request
     * @param WysiwygMedia $wysiwygMedia
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWysiwygMedia $request, WysiwygMedia $wysiwygMedia)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values WysiwygMedia
        $wysiwygMedia->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/wysiwyg-media'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/wysiwyg-media');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWysiwygMedia $request
     * @param WysiwygMedia $wysiwygMedia
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWysiwygMedia $request, WysiwygMedia $wysiwygMedia)
    {
        $wysiwygMedia->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWysiwygMedia $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWysiwygMedia $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    WysiwygMedia::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

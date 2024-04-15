<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Activation\BulkDestroyActivation;
use App\Http\Requests\Admin\Activation\DestroyActivation;
use App\Http\Requests\Admin\Activation\IndexActivation;
use App\Http\Requests\Admin\Activation\StoreActivation;
use App\Http\Requests\Admin\Activation\UpdateActivation;
use App\Models\Activation;
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

class ActivationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexActivation $request
     * @return array|Factory|View
     */
    public function index(IndexActivation $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Activation::class)->processRequestAndGet(
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

        return view('admin.activation.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.activation.create');

        return view('admin.activation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreActivation $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreActivation $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Activation
        $activation = Activation::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/activations'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/activations');
    }

    /**
     * Display the specified resource.
     *
     * @param Activation $activation
     * @throws AuthorizationException
     * @return void
     */
    public function show(Activation $activation)
    {
        $this->authorize('admin.activation.show', $activation);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Activation $activation
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Activation $activation)
    {
        $this->authorize('admin.activation.edit', $activation);


        return view('admin.activation.edit', [
            'activation' => $activation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateActivation $request
     * @param Activation $activation
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateActivation $request, Activation $activation)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Activation
        $activation->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/activations'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/activations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyActivation $request
     * @param Activation $activation
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyActivation $request, Activation $activation)
    {
        $activation->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyActivation $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyActivation $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Activation::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

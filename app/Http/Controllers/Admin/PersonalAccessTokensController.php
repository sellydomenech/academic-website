<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PersonalAccessToken\BulkDestroyPersonalAccessToken;
use App\Http\Requests\Admin\PersonalAccessToken\DestroyPersonalAccessToken;
use App\Http\Requests\Admin\PersonalAccessToken\IndexPersonalAccessToken;
use App\Http\Requests\Admin\PersonalAccessToken\StorePersonalAccessToken;
use App\Http\Requests\Admin\PersonalAccessToken\UpdatePersonalAccessToken;
use App\Models\PersonalAccessToken;
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

class PersonalAccessTokensController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPersonalAccessToken $request
     * @return array|Factory|View
     */
    public function index(IndexPersonalAccessToken $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PersonalAccessToken::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'tokenable_type', 'tokenable_id', 'name', 'token', 'last_used_at', 'expires_at'],

            // set columns to searchIn
            ['id', 'tokenable_type', 'name', 'token', 'abilities']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.personal-access-token.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.personal-access-token.create');

        return view('admin.personal-access-token.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePersonalAccessToken $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePersonalAccessToken $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PersonalAccessToken
        $personalAccessToken = PersonalAccessToken::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/personal-access-tokens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/personal-access-tokens');
    }

    /**
     * Display the specified resource.
     *
     * @param PersonalAccessToken $personalAccessToken
     * @throws AuthorizationException
     * @return void
     */
    public function show(PersonalAccessToken $personalAccessToken)
    {
        $this->authorize('admin.personal-access-token.show', $personalAccessToken);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PersonalAccessToken $personalAccessToken
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PersonalAccessToken $personalAccessToken)
    {
        $this->authorize('admin.personal-access-token.edit', $personalAccessToken);


        return view('admin.personal-access-token.edit', [
            'personalAccessToken' => $personalAccessToken,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePersonalAccessToken $request
     * @param PersonalAccessToken $personalAccessToken
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePersonalAccessToken $request, PersonalAccessToken $personalAccessToken)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PersonalAccessToken
        $personalAccessToken->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/personal-access-tokens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/personal-access-tokens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPersonalAccessToken $request
     * @param PersonalAccessToken $personalAccessToken
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPersonalAccessToken $request, PersonalAccessToken $personalAccessToken)
    {
        $personalAccessToken->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPersonalAccessToken $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPersonalAccessToken $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PersonalAccessToken::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

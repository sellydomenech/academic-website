<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordResetToken\BulkDestroyPasswordResetToken;
use App\Http\Requests\Admin\PasswordResetToken\DestroyPasswordResetToken;
use App\Http\Requests\Admin\PasswordResetToken\IndexPasswordResetToken;
use App\Http\Requests\Admin\PasswordResetToken\StorePasswordResetToken;
use App\Http\Requests\Admin\PasswordResetToken\UpdatePasswordResetToken;
use App\Models\PasswordResetToken;
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

class PasswordResetTokensController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPasswordResetToken $request
     * @return array|Factory|View
     */
    public function index(IndexPasswordResetToken $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PasswordResetToken::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'email', 'token'],

            // set columns to searchIn
            ['id', 'email', 'token']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.password-reset-token.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.password-reset-token.create');

        return view('admin.password-reset-token.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePasswordResetToken $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePasswordResetToken $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PasswordResetToken
        $passwordResetToken = PasswordResetToken::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/password-reset-tokens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/password-reset-tokens');
    }

    /**
     * Display the specified resource.
     *
     * @param PasswordResetToken $passwordResetToken
     * @throws AuthorizationException
     * @return void
     */
    public function show(PasswordResetToken $passwordResetToken)
    {
        $this->authorize('admin.password-reset-token.show', $passwordResetToken);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PasswordResetToken $passwordResetToken
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PasswordResetToken $passwordResetToken)
    {
        $this->authorize('admin.password-reset-token.edit', $passwordResetToken);


        return view('admin.password-reset-token.edit', [
            'passwordResetToken' => $passwordResetToken,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePasswordResetToken $request
     * @param PasswordResetToken $passwordResetToken
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePasswordResetToken $request, PasswordResetToken $passwordResetToken)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PasswordResetToken
        $passwordResetToken->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/password-reset-tokens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/password-reset-tokens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPasswordResetToken $request
     * @param PasswordResetToken $passwordResetToken
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPasswordResetToken $request, PasswordResetToken $passwordResetToken)
    {
        $passwordResetToken->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPasswordResetToken $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPasswordResetToken $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PasswordResetToken::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

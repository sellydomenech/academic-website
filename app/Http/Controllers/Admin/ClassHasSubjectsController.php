<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassHasSubject\BulkDestroyClassHasSubject;
use App\Http\Requests\Admin\ClassHasSubject\DestroyClassHasSubject;
use App\Http\Requests\Admin\ClassHasSubject\IndexClassHasSubject;
use App\Http\Requests\Admin\ClassHasSubject\StoreClassHasSubject;
use App\Http\Requests\Admin\ClassHasSubject\UpdateClassHasSubject;
use App\Models\ClassHasSubject;
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

class ClassHasSubjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexClassHasSubject $request
     * @return array|Factory|View
     */
    public function index(IndexClassHasSubject $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ClassHasSubject::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'class_group_id', 'subject_id', 'day'],

            // set columns to searchIn
            ['id', 'day']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.class-has-subject.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.class-has-subject.create');

        return view('admin.class-has-subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClassHasSubject $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreClassHasSubject $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ClassHasSubject
        $classHasSubject = ClassHasSubject::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/class-has-subjects'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/class-has-subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param ClassHasSubject $classHasSubject
     * @throws AuthorizationException
     * @return void
     */
    public function show(ClassHasSubject $classHasSubject)
    {
        $this->authorize('admin.class-has-subject.show', $classHasSubject);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClassHasSubject $classHasSubject
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ClassHasSubject $classHasSubject)
    {
        $this->authorize('admin.class-has-subject.edit', $classHasSubject);


        return view('admin.class-has-subject.edit', [
            'classHasSubject' => $classHasSubject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClassHasSubject $request
     * @param ClassHasSubject $classHasSubject
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateClassHasSubject $request, ClassHasSubject $classHasSubject)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ClassHasSubject
        $classHasSubject->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/class-has-subjects'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/class-has-subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyClassHasSubject $request
     * @param ClassHasSubject $classHasSubject
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyClassHasSubject $request, ClassHasSubject $classHasSubject)
    {
        $classHasSubject->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyClassHasSubject $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyClassHasSubject $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ClassHasSubject::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

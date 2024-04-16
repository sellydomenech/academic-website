<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentHasClass\BulkDestroyStudentHasClass;
use App\Http\Requests\Admin\StudentHasClass\DestroyStudentHasClass;
use App\Http\Requests\Admin\StudentHasClass\IndexStudentHasClass;
use App\Http\Requests\Admin\StudentHasClass\StoreStudentHasClass;
use App\Http\Requests\Admin\StudentHasClass\UpdateStudentHasClass;
use App\Models\StudentHasClass;
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

class StudentHasClassesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStudentHasClass $request
     * @return array|Factory|View
     */
    public function index(IndexStudentHasClass $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StudentHasClass::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'student_id', 'class_group_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.student-has-class.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.student-has-class.create');

        return view('admin.student-has-class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudentHasClass $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStudentHasClass $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the StudentHasClass
        $studentHasClass = StudentHasClass::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-has-classes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-has-classes');
    }

    /**
     * Display the specified resource.
     *
     * @param StudentHasClass $studentHasClass
     * @throws AuthorizationException
     * @return void
     */
    public function show(StudentHasClass $studentHasClass)
    {
        $this->authorize('admin.student-has-class.show', $studentHasClass);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StudentHasClass $studentHasClass
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(StudentHasClass $studentHasClass)
    {
        $this->authorize('admin.student-has-class.edit', $studentHasClass);


        return view('admin.student-has-class.edit', [
            'studentHasClass' => $studentHasClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentHasClass $request
     * @param StudentHasClass $studentHasClass
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStudentHasClass $request, StudentHasClass $studentHasClass)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values StudentHasClass
        $studentHasClass->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/student-has-classes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/student-has-classes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStudentHasClass $request
     * @param StudentHasClass $studentHasClass
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStudentHasClass $request, StudentHasClass $studentHasClass)
    {
        $studentHasClass->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStudentHasClass $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStudentHasClass $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    StudentHasClass::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

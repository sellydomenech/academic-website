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
    public function create(IndexClassHasSubject $request)
    {
        $this->authorize('admin.class-has-subject.create');

        $results = DB::table('class_group')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(class_name,  " - ", year_of_study, " semester ", semester) as name'),
        )
        ->get();

        if ($request->ajax()) {
            return response()->json($results);
        }

        $subjects = DB::table('subject')
        ->select(
            DB::raw('id as id'),
            DB::raw('subject_name as name'),
        )
        ->get();

        if ($request->ajax()) {
            return response()->json($subjects);
        }

        $listOfDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        // $page = array(
        //     [ 'id' => '1', 'name' => 'Sunday',],
        //     [ 'id' => '2', 'name' => 'Monday',],
        //     [ 'id' => '3', 'name' => 'Tuesday',],
        //     [ 'id' => '4', 'name' => 'Wednesday',],
        //     [ 'id' => '5', 'name' => 'Thursday',],
        //     [ 'id' => '6', 'name' => 'Friday',],
        //     [ 'id' => '7', 'name' => 'Saturday',],
        // );

        return view('admin.class-has-subject.create', [
            'listOfClasses' => $results,
            'listOfSubjects' => $subjects,
            'listOfDays' => json_encode($listOfDays)
        ]);
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
    public function edit(IndexClassHasSubject $request, ClassHasSubject $classHasSubject)
    {
        $this->authorize('admin.class-has-subject.edit', $classHasSubject);

        $results = DB::table('class_group')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(class_name,  " - ", year_of_study, " semester ", semester) as name'),
        )
        ->get();

        if ($request->ajax()) {
            return response()->json($results);
        }

        $subjects = DB::table('subject')
        ->select(
            DB::raw('id as id'),
            DB::raw('subject_name as name'),
        )
        ->get();

        if ($request->ajax()) {
            return response()->json($subjects);
        }


        // Selected Class Group and Subject
        $selectedClassGroup = DB::table('class_group')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(class_name,  " - ", year_of_study, " semester ", semester) as name'),
        )
        ->where('id', $classHasSubject['class_group_id'])
        ->get();

        if ($request->ajax()) {
            return response()->json($selectedClassGroup);
        }

        $selectedSubject = DB::table('subject')
        ->select(
            DB::raw('id as id'),
            DB::raw('subject_name as name'),
        )
        ->where('id', $classHasSubject['subject_id'])
        ->get();

        if ($request->ajax()) {
            return response()->json($selectedSubject);
        }
        $classHasSubject->class_group_selected = $selectedClassGroup;
        $classHasSubject->subject_selected = $selectedSubject;
        // $classHasSubject->day = array($classHasSubject['day']);

        $listOfDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        // $page = array(
        //     [ 'id' => '1', 'name' => 'Sunday',],
        //     [ 'id' => '2', 'name' => 'Monday',],
        //     [ 'id' => '3', 'name' => 'Tuesday',],
        //     [ 'id' => '4', 'name' => 'Wednesday',],
        //     [ 'id' => '5', 'name' => 'Thursday',],
        //     [ 'id' => '6', 'name' => 'Friday',],
        //     [ 'id' => '7', 'name' => 'Saturday',],
        // );

        return view('admin.class-has-subject.edit', [
            'classHasSubject' => $classHasSubject,
            'listOfClasses' => $results,
            'listOfSubjects' => $subjects,
            'listOfDays' => json_encode($listOfDays)
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

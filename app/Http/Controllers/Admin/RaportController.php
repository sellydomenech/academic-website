<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Raport\BulkDestroyRaport;
use App\Http\Requests\Admin\Raport\DestroyRaport;
use App\Http\Requests\Admin\Raport\IndexRaport;
use App\Http\Requests\Admin\Raport\StoreRaport;
use App\Http\Requests\Admin\Raport\UpdateRaport;
use App\Models\Raport;
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

class RaportController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRaport $request
     * @return array|Factory|View
     */
    public function index(IndexRaport $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Raport::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'student_id', 'class_group_id', 'given_in', 'signed_at', 'published', 'sick', 'permission', 'absence'],

            // set columns to searchIn
            ['id', 'given_in', 'moral_religious', 'social_emotion', 'speaking', 'cognitive', 'physical', 'art', 'note']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.raport.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(IndexRaport $request)
    {
        $this->authorize('admin.raport.create');

        $results = DB::table('class_group')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(class_name,  " - ", year_of_study, " semester ", semester) as name'),
        )
        ->get();

        if ($request->ajax()) {
            return response()->json($results);
        }

        $student = DB::table('student')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(first_name,  " ", last_name) as name'),
        )
        ->get();

        if ($request->ajax()) {
            return response()->json($student);
        }

        // $page = array(
        //     [ 'id' => '1', 'name' => 'Sunday',],
        //     [ 'id' => '2', 'name' => 'Monday',],
        //     [ 'id' => '3', 'name' => 'Tuesday',],
        //     [ 'id' => '4', 'name' => 'Wednesday',],
        //     [ 'id' => '5', 'name' => 'Thursday',],
        //     [ 'id' => '6', 'name' => 'Friday',],
        //     [ 'id' => '7', 'name' => 'Saturday',],
        // );

        return view('admin.raport.create', [
            'listOfClasses' => $results,
            'listOfStudents' => $student,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRaport $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRaport $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Raport
        $raport = Raport::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/raports'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/raports');
    }

    /**
     * Display the specified resource.
     *
     * @param Raport $raport
     * @throws AuthorizationException
     * @return void
     */
    public function show(Raport $raport)
    {
        $this->authorize('admin.raport.show', $raport);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Raport $raport
     * @throws AuthorizationException
     * @return Factory|View
     */

    public function edit(IndexRaport $request, Raport $raport)
    {
        $this->authorize('admin.raport.edit', $raport);


        // Jika mau menghilangkan class, hapus bawah
        $results = DB::table('class_group')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(class_name,  " - ", year_of_study, " semester ", semester) as name'),
        )
        ->get();

        if ($request->ajax()) {
            return response()->json($results);
        }

        
        // Jika mau menghilangkan student, hapus bawah
        $student = DB::table('student')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(first_name,  " ", last_name) as name'),
        )
        ->get();

        if ($request->ajax()) {
            return response()->json($student);
        }


        // Selected Class Group and Subject
        $selectedClassGroup = DB::table('class_group')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(class_name,  " - ", year_of_study, " semester ", semester) as name'),
        )
        ->where('id', $raport['class_group_id'])
        ->get();

        if ($request->ajax()) {
            return response()->json($selectedClassGroup);
        }

        $selectedStudent = DB::table('student')
        ->select(
            DB::raw('id as id'),
            DB::raw('concat(first_name,  " ", last_name) as name'),
        )
        ->where('id', $raport['student_id'])
        ->get();

        if ($request->ajax()) {
            return response()->json($selectedStudent);
        }
        $raport->class_group_selected = $selectedClassGroup;
        $raport->student_selected = $selectedStudent;
        // $classHasSubject->day = array($classHasSubject['day']);

        // $page = array(
        //     [ 'id' => '1', 'name' => 'Sunday',],
        //     [ 'id' => '2', 'name' => 'Monday',],
        //     [ 'id' => '3', 'name' => 'Tuesday',],
        //     [ 'id' => '4', 'name' => 'Wednesday',],
        //     [ 'id' => '5', 'name' => 'Thursday',],
        //     [ 'id' => '6', 'name' => 'Friday',],
        //     [ 'id' => '7', 'name' => 'Saturday',],
        // );

        return view('admin.raport.edit', [
            'raport' => $raport,
            'listOfClasses' => $results,
            'listOfStudents' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRaport $request
     * @param Raport $raport
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRaport $request, Raport $raport)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Raport
        $raport->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/raports'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/raports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRaport $request
     * @param Raport $raport
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRaport $request, Raport $raport)
    {
        $raport->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRaport $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRaport $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Raport::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

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
    public function create(IndexRaportHasMark $request)
    {
        $this->authorize('admin.raport-has-mark.create');

        $results = DB::select("SELECT RAPORT.ID as id, CONCAT(student.first_name, ' ', student.last_name, ' - ', class_group.class_name, ' ', class_group.year_of_study, ' Semester ', class_group.semester) AS 'name'
            FROM raport
            LEFT JOIN student ON student.id = raport.student_id
            LEFT JOIN class_group ON raport.class_group_id = class_group.id;");

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

        // $page = array(
        //     [ 'id' => '1', 'name' => 'Sunday',],
        //     [ 'id' => '2', 'name' => 'Monday',],
        //     [ 'id' => '3', 'name' => 'Tuesday',],
        //     [ 'id' => '4', 'name' => 'Wednesday',],
        //     [ 'id' => '5', 'name' => 'Thursday',],
        //     [ 'id' => '6', 'name' => 'Friday',],
        //     [ 'id' => '7', 'name' => 'Saturday',],
        // );

        return view('admin.raport-has-mark.create', [
            'listOfRaports' => json_encode($results),
            'listOfSubjects' => $subjects,
        ]);
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
    public function edit(IndexRaportHasMark $request, RaportHasMark $raportHasMark)
    {
        $this->authorize('admin.raport-has-mark.edit', $raportHasMark);


        // Jika mau menghilangkan class, hapus bawah
        $results = DB::select("SELECT RAPORT.ID as id, CONCAT(student.first_name, ' ', student.last_name, ' - ', class_group.class_name, ' ', class_group.year_of_study, ' Semester ', class_group.semester) AS 'name'
            FROM raport
            LEFT JOIN student ON student.id = raport.student_id
            LEFT JOIN class_group ON raport.class_group_id = class_group.id;");

        if ($request->ajax()) {
            return response()->json($results);
        }

        
        // Jika mau menghilangkan student, hapus bawah
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
        $selectedRaport = DB::select("SELECT RAPORT.ID as id, CONCAT(student.first_name, ' ', student.last_name, ' - ', class_group.class_name, ' ', class_group.year_of_study, ' Semester ', class_group.semester) AS 'name'
            FROM raport
            LEFT JOIN student ON student.id = raport.student_id
            LEFT JOIN class_group ON raport.class_group_id = class_group.id
            WHERE raport.id = :id;", ["id"=>$raportHasMark['raport_id']]);

        if ($request->ajax()) {
            return response()->json($selectedRaport);
        }

        $selectedSubject = DB::table('subject')
        ->select(
            DB::raw('id as id'),
            DB::raw('subject_name as name'),
        )
        ->where('id', $raportHasMark['subject_id'])
        ->get();

        if ($request->ajax()) {
            return response()->json($selectedSubject);
        }
        $raportHasMark->raport_selected = $selectedRaport;
        $raportHasMark->subject_selected = $selectedSubject;
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

        return view('admin.raport-has-mark.edit', [
            'raportHasMark' => $raportHasMark,
            'listOfRaports' => json_encode($results),
            'listOfSubjects' => $subjects,
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

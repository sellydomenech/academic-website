<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassGroup\BulkDestroyClassGroup;
use App\Http\Requests\Admin\ClassGroup\DestroyClassGroup;
use App\Http\Requests\Admin\ClassGroup\IndexClassGroup;
use App\Http\Requests\Admin\ClassGroup\StoreClassGroup;
use App\Http\Requests\Admin\ClassGroup\UpdateClassGroup;
use App\Models\ClassGroup;
use Brackets\AdminAuth\Activation\Facades\Activation;
use Brackets\AdminAuth\Services\ActivationService;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class ClassGroupController extends Controller
{
    /**
     * Guard used for admin user
     *
     * @var string
     */
    protected $guard = 'admin';

    /**
     * AdminUsersController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->guard = config('admin-auth.defaults.guard');
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexClassGroup $request
     * @return array|Factory|View
     */
    public function index(IndexClassGroup $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ClassGroup::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'class_name', 'start_date', 'end_date', 'semester', 'year_of_study', 'teacher_id'],

            // set columns to searchIn
            ['id', 'class_name', 'semester', 'year_of_study', 'teacher_id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.class-group.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(IndexClassGroup $request)
    {
        $this->authorize('admin.class-group.create');

        $results = DB::table('teacher')
        ->select(
            DB::raw('concat(first_name,  " ", last_name) as full_name'),
        )
        ->where('enabled', true)
        ->get();


        // $results = DB::raw("SELECT id, concat(first_name, ' ', last_name) as full_name FROM teacher WHERE 'enabled'=1");
        // ->get();

        if ($request->ajax()) {
            return response()->json($results);
        }

        return view('admin.class-group.create', [
            // 'activation' => Config::get('admin-auth.activation_enabled'),
            'teachers' => $results,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClassGroup $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreClassGroup $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ClassGroup
        $classGroup = ClassGroup::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/class-groups'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/class-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param ClassGroup $classGroup
     * @throws AuthorizationException
     * @return void
     */
    public function show(ClassGroup $classGroup)
    {
        $this->authorize('admin.class-group.show', $classGroup);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClassGroup $classGroup
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ClassGroup $classGroup)
    {
        $this->authorize('admin.class-group.edit', $classGroup);
        $results = DB::table('teacher')
        ->where('enabled', true)
        ->get();

        if ($request->ajax()) {
            return response()->json($results);
        }

        return view('admin.class-group.edit', [
            'classGroup' => $classGroup,
            'teachers' => $results,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClassGroup $request
     * @param ClassGroup $classGroup
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateClassGroup $request, ClassGroup $classGroup)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ClassGroup
        $classGroup->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/class-groups'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/class-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyClassGroup $request
     * @param ClassGroup $classGroup
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyClassGroup $request, ClassGroup $classGroup)
    {
        $classGroup->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyClassGroup $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyClassGroup $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ClassGroup::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

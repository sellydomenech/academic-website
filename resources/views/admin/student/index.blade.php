@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student.actions.index'))

@section('body')

    <student-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/students') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.student.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/students/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.student.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.student.columns.id') }}</th>
                                        <th is='sortable' :column="'first_name'">{{ trans('admin.student.columns.first_name') }}</th>
                                        <th is='sortable' :column="'last_name'">{{ trans('admin.student.columns.last_name') }}</th>
                                        <th is='sortable' :column="'nick_name'">{{ trans('admin.student.columns.nick_name') }}</th>
                                        <th is='sortable' :column="'registration_number'">{{ trans('admin.student.columns.registration_number') }}</th>
                                        <th is='sortable' :column="'gender'">{{ trans('admin.student.columns.gender') }}</th>
                                        <th is='sortable' :column="'place_of_birth'">{{ trans('admin.student.columns.place_of_birth') }}</th>
                                        <th is='sortable' :column="'date_of_birth'">{{ trans('admin.student.columns.date_of_birth') }}</th>
                                        <th is='sortable' :column="'email'">{{ trans('admin.student.columns.email') }}</th>
                                        <th is='sortable' :column="'status'">{{ trans('admin.student.columns.status') }}</th>
                                        <th is='sortable' :column="'child'">{{ trans('admin.student.columns.child') }}</th>
                                        <th is='sortable' :column="'number_of_children'">{{ trans('admin.student.columns.number_of_children') }}</th>
                                        <th is='sortable' :column="'father_name'">{{ trans('admin.student.columns.father_name') }}</th>
                                        <th is='sortable' :column="'father_occupation'">{{ trans('admin.student.columns.father_occupation') }}</th>
                                        <th is='sortable' :column="'father_phone_number'">{{ trans('admin.student.columns.father_phone_number') }}</th>
                                        <th is='sortable' :column="'mother_name'">{{ trans('admin.student.columns.mother_name') }}</th>
                                        <th is='sortable' :column="'mother_occupation'">{{ trans('admin.student.columns.mother_occupation') }}</th>
                                        <th is='sortable' :column="'mother_phone_number'">{{ trans('admin.student.columns.mother_phone_number') }}</th>
                                        <th is='sortable' :column="'emergency_contact_name'">{{ trans('admin.student.columns.emergency_contact_name') }}</th>
                                        <th is='sortable' :column="'emergency_contact_occupation'">{{ trans('admin.student.columns.emergency_contact_occupation') }}</th>
                                        <th is='sortable' :column="'emergency_contact_phone_number'">{{ trans('admin.student.columns.emergency_contact_phone_number') }}</th>
                                        <th is='sortable' :column="'registration_date'">{{ trans('admin.student.columns.registration_date') }}</th>
                                        <th is='sortable' :column="'start_date'">{{ trans('admin.student.columns.start_date') }}</th>
                                        <th is='sortable' :column="'end_date'">{{ trans('admin.student.columns.end_date') }}</th>
                                        <th is='sortable' :column="'class_id'">{{ trans('admin.student.columns.class_id') }}</th>
                                        <th is='sortable' :column="'login_id'">{{ trans('admin.student.columns.login_id') }}</th>
                                        <th is='sortable' :column="'enabled'">{{ trans('admin.student.columns.enabled') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="29">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/students')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/students/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.first_name }}</td>
                                        <td>@{{ item.last_name }}</td>
                                        <td>@{{ item.nick_name }}</td>
                                        <td>@{{ item.registration_number }}</td>
                                        <td>@{{ item.gender }}</td>
                                        <td>@{{ item.place_of_birth }}</td>
                                        <td>@{{ item.date_of_birth | date }}</td>
                                        <td>@{{ item.email }}</td>
                                        <td>@{{ item.status }}</td>
                                        <td>@{{ item.child }}</td>
                                        <td>@{{ item.number_of_children }}</td>
                                        <td>@{{ item.father_name }}</td>
                                        <td>@{{ item.father_occupation }}</td>
                                        <td>@{{ item.father_phone_number }}</td>
                                        <td>@{{ item.mother_name }}</td>
                                        <td>@{{ item.mother_occupation }}</td>
                                        <td>@{{ item.mother_phone_number }}</td>
                                        <td>@{{ item.emergency_contact_name }}</td>
                                        <td>@{{ item.emergency_contact_occupation }}</td>
                                        <td>@{{ item.emergency_contact_phone_number }}</td>
                                        <td>@{{ item.registration_date | date }}</td>
                                        <td>@{{ item.start_date | date }}</td>
                                        <td>@{{ item.end_date | date }}</td>
                                        <td>@{{ item.class_id }}</td>
                                        <td>@{{ item.login_id }}</td>
                                        <td>
                                            <label class="switch switch-3d switch-success">
                                                <input type="checkbox" class="switch-input" v-model="collection[index].enabled" @change="toggleSwitch(item.resource_url, 'enabled', collection[index])">
                                                <span class="switch-slider"></span>
                                            </label>
                                        </td>

                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/students/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.student.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </student-listing>

@endsection
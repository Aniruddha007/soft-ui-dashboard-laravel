@extends('layouts.user_type.auth')

@section('content')
    
<div>
    <div class="alert alert-secondary mx-4 d-none" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
            <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank" class="text-white">here</a></strong>
            to see the PRO product!
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Permissions</h5>
                        </div>
                        <a href="{{ route('permissions.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Permission</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                  
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       Gaurd
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td scope="row" class="ps-4">
                            <p class="text-xs font-weight-bold mb-0">{{ $permission->name }} </p></td>
                            <td scope="row" class="ps-4">
                                <p class="text-xs font-weight-bold mb-0">{{ $permission->guard_name }} </p> </td>
                        <td class="text-center">
                            <a href="{{ route('permissions.show', $permission->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Show user">
                                <i class="fas fa-eye text-secondary"></i>
                            </a>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                <i class="fas fa-user-edit text-secondary"></i>
                            </a>
                            <span>
                                {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                {{ Form::button('<i class="cursor-pointer fas fa-trash text-secondary"></i>', ['class' => 'btn', 'type' => 'submit']) }}
                                {!! Form::close() !!}
                                
                            </span>
                        </td>
                    </tr>
                @endforeach
             
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
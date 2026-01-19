@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Coupon List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="{{route('type.create')}}">Add type</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <div id="myTable" class="dataTables_wrapper no-footer"><div id="table_id_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="table_id"></label></div>
                                        <table class="table all-package coupon-list-table table-hover theme-table dataTable no-footer" id="myTable">
                                            <thead>
                                            <tr><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">#</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Type</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;"> Type Status</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Option</th></tr>
                                            </thead>

                                            <tbody>

                                            @foreach($types as $key=> $type)

                                            <tr class="odd">

                                                <td>{{$key +1}}</td>
                                                <td>{{$type->name}}</td>
                                                <td class="menu-status">
                                                    @if($type->status == 1)
                                                        <span class="success">Active</span>
                                                    @else
                                                        <span class="danger">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <ul class="d-flex gap-2 list-unstyled">
                                                        <li>


                                                        <!-- Modal -->
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $type->id }}">
                                                            Edit
                                                        </button>

                                                        <div class="modal fade" id="exampleModal{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $type->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <form action="{{route('type.update',$type->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <div class="theme-form theme-form-2 mega-form">
                                                                            <div class="mb-4 row align-items-center">
                                                                                <label class="form-label-title col-sm-3 mb-0">Type Name</label>
                                                                                <div class="col-sm-9">
                                                                                    <input name="name" class="form-control" type="text" placeholder="Type Name" value="{{ old('name', $type->name) }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-4 row align-items-center">
                                                                                <div class="col-sm-3 form-label-title">Status</div>

                                                                                <div class="col-sm-9">
                                                                                    <select name="status"  class="form-control w-50  form-select shadow-sm rounded-pill ">
                                                                                        <option value="1" {{ $type->status == 1 ? 'selected' : '' }}>Active</option>
                                                                                        <option value="0" {{ $type->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <li>
                                                            <form action="{{ route('type.destroy', $type->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-primary"

                                                                onclick="return confirm('Are you sure?')">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </button>
                                                            </form>
                                                        </li>

                                                    </ul>
                                                </td>
                                           </tbody>
                                            @endforeach
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
    $(document).ready(function() {
    $('#myTable').DataTable();
    });
    </script>


@endsection


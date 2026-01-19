@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>BodyLevel List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="{{route('muscle.create')}}">Add Muscle</a>
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
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Name</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Option</th></tr>



                                            </thead>

                                            <tbody>

                                            @foreach($muscle as $key=> $muscles)

                                                <tr class="odd">

                                                    <td>{{$key +1}}</td>
                                                    <td>{{$muscles->name}}</td>


                                                    <td>
                                                        <ul class="d-flex gap-2 list-unstyled">

                                                            <li>


                                                                <a href="{{route('muscle.edit',$muscles->id)}}" class="btn">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>


                                                                <form action="{{ route('muscle.destroy',$muscles->id) }}" method="POST">
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



@endsection


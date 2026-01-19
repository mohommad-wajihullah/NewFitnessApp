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
                                            <a class="btn btn-solid" href="{{route('exerciseposition.create')}}">Add Exercise Position</a>
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
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Description</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Exercise Id</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Option</th></tr>
                                            </thead>

                                            <tbody>

                                            @foreach($exercisePosition as $key=> $postions)

                                                <tr class="odd">
                                                    <td>{{$key +1}}</td>
                                                    <td>{{$postions->description}}</td>
                                                    <td>
                                                        @if($postions->exercise_id )
                                                            <span>{{$postions->exercise->title}}</span>
                                                        @else
                                                            <span >not</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <ul class="d-flex gap-2 list-unstyled">

                                                            <li>
                                                                <a href="{{route('exerciseposition.edit',$postions->id)}}" class="btn">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>


                                                                <form action="{{ route('exerciseposition.destroy', $postions->id) }}" method="POST">
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


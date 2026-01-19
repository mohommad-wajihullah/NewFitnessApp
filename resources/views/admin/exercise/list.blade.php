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
                                            <a class="btn btn-solid" href="{{route('exercise.create')}}">Add type</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                         <table class="table all-package coupon-list-table table-hover theme-table dataTable no-footer" id="myTable">
                                            <thead>
                                            <tr><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">#</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Name</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Order By</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Youtube Video</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">CloudFlare Video</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">ThumbNail</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Time</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Going Down</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Going Up</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;"> BodyPart</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">BodyLevel</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Level of Exercise</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Muscles</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;">Actions</th>


                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($exercise as $key => $exercises)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $exercises->title}}</td>
                                                    <td>{{ $exercises->order_by }}</td>
                                                    <td>{{ $exercises->youtube_video }}</td>
                                                    <td>{{ $exercises->cloudflare_video }}</td>
                                                    <td>{{ $exercises->thumbnail }}</td>
                                                    <td>{{$exercises->time_tense}}</td>
                                                    <td class="menu-status">
                                                        @if($exercises->going_down == 1)
                                                            <span class="success">Active</span>
                                                        @else
                                                            <span class="danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td class="menu-status">
                                                        @if($exercises->going_up == 1)
                                                            <span class="success">Active</span>
                                                        @else
                                                            <span class="danger">Inactive</span>
                                                        @endif
                                                    </td>

                                                    <td >
                                                        @if($exercises->part_id )
                                                            <span>{{$exercises->bodyPart->name}}</span>
                                                        @else
                                                            <span >not</span>
                                                        @endif
                                                    </td>
                                                    <td >
                                                        @if($exercises->body_id )
                                                            <span>{{$exercises->bodyLevel->name}}</span>
                                                        @else
                                                            <span >not</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span>{{ $exercises->levelExercise?->name ?? 'not' }}</span>
                                                    </td>

                                                    <td >
                                                        @if($exercises->muscle_id )
                                                            <span>{{$exercises->muscle->name}}</span>
                                                        @else
                                                            <span >not</span>
                                                        @endif
                                                    </td>


                                                    <td>
                                                        <a href="{{ route('exercise.edit', $exercises->id) }}" class="btn">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>

                                                        <form action="{{ route('exercise.destroy', $exercises->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary"
                                                                    onclick="return confirm('Are you sure?')">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
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


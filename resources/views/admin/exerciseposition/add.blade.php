@extends('admin.layouts.app')
@section('content')
    <div class="page-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-10 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Type Information</h5>
                                    </div>
                                    <form action="{{route('exerciseposition.store')}}" method="POST" >
                                        @csrf

                                        <div class="theme-form theme-form-2 mega-form pt-4">
                                    <div class="theme-form theme-form-2 mega-form pt-4">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Discription</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" class="form-control" cols="5"></textarea>
                                            </div>
                                        </div>


                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3 form-label-title">Exercise Name</div>
                                            <div class="col-sm-9">
                                                <select name="exercise_id" class="form-select w-50 shadow-sm rounded-pill">
                                                    <option value="">Select Exercise</option>
                                                    @foreach ($exercise as $exercises)
                                                        <option value="{{ $exercises->id }}">
                                                            {{ $exercises->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">
                                            Add Types
                                        </button>

                                    </form>

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

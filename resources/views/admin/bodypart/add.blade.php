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
                                        <h5>Body Part information</h5>
                                    </div>
                                    <form action="{{route('bodypart.store')}}" method="POST" >
                                        @csrf


                                    <div class="theme-form theme-form-2 mega-form pt-4">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"> Name</label>
                                            <div class="col-sm-9">
                                                <input name="name" class="form-control w-50" type="text" placeholder=" Name">
                                            </div>
                                        </div>
                                        w
                                        <button type="submit" class="btn btn-primary mt-3">
                                            Add BodyPart
                                        </button>
                                    </div>
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

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
                                    <form action="{{route('type.store')}}" method="POST" >
                                        @csrf


                                    <div class="theme-form theme-form-2 mega-form pt-4">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Type Name</label>
                                            <div class="col-sm-9">
                                                <input name="name" class="form-control" type="text" placeholder="Type Name">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3 form-label-title">Status</div>

                                            <div class="col-sm-9">
                                                <select name="status"  class="form-control w-50  form-select shadow-sm rounded-pill ">
                                                    <option value="0">In Active</option>
                                                    <option value="1">Active</option>
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

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
                                        <h5> Edit Bodylevel </h5>
                                    </div>
                                    <form action="{{route('bodylevel.update',$bodyLevel->id)}}" method="POST" >
                                        @csrf
                                        @method('PUT')


                                        <div class="theme-form theme-form-2 mega-form pt-4">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0"> Name</label>
                                                <div class="col-sm-9">
                                                    <input name="name" class="form-control w-50" type="text" value="{{old('name',$bodyLevel->name)}}" placeholder=" Name">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <div class="col-sm-3 form-label-title">Equipment Details</div>

                                                <div class="col-sm-9">
                                                    <select name="with_equipment"  class="form-control w-50  form-select shadow-sm rounded-pill ">
                                                        <option value="0" {{ $bodyLevel->with_equipment == 0 ? 'selected' : '' }}>Without Equipment</option>
                                                        <option value="1" {{ $bodyLevel->with_equipment == 1 ? 'selected' : '' }}>With Equipment</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="mb-4 row align-items-center">
                                                <div class="col-sm-3 form-label-title">Type Name</div>
                                                <div class="col-sm-9">
                                                    <select name="type_id" class="form-control w-50 form-select shadow-sm rounded-pill">

                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->id }}"
                                                                    @if($bodyLevel->type_id == $type->id)
                                                                        selected
                                                                @endif
                                                            >
                                                                {{ $type->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>




                                            <button type="submit" class="btn btn-primary mt-3">
                                                Edit BodyLevel
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


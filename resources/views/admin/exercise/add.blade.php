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
                                        <h5>Body level information</h5>
                                    </div>
                                    <form action="{{route('exercise.store')}}" method="POST" >
                                        @csrf


                                    <div class="theme-form theme-form-2 mega-form pt-4">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"> Title</label>
                                            <div class="col-sm-9">
                                                <input name="title" class="form-control w-50" type="text" placeholder=" Name">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>Order</label>
                                            <input type="number" name="order_by" class="form-control" value="{{ old('order_by') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label>YouTube Video URL</label>
                                            <input type="text" name="youtube_video" class="form-control" value="{{ old('youtube_video') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>ThumbNail  </label>
                                            <input type="text" name="thumbnail" class="form-control" value="{{ old('thumbnail') }}">
                                        </div>



                                        <div class="mb-3">
                                            <label>Cloudflare Video URL</label>
                                            <input type="text" name="cloudflare_video" class="form-control" value="{{ old('cloudflare_video') }}">
                                        </div>


                                        <div class="mb-3">
                                            <label>Going Up</label>
                                            <input type="checkbox" name="going_up" value="1">
                                        </div>

                                        <div class="mb-3">
                                            <label>Going Down</label>
                                            <input type="checkbox" name="going_down" value="1">
                                        </div>


                                        <div class="form-group">
                                            <label for="time_tense">Time</label>
                                            <input type="time" name="time_tense" step="1" class="form-control">

                                        </div>


                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3 form-label-title">Body Level</div>
                                            <div class="col-sm-9">
                                                <select name="body_id"  class="form-control w-50  form-select shadow-sm rounded-pill ">
                                                    @foreach ($bodyLevel as  $bodylvl)
                                                        <option value="{{ $bodylvl->id }}">{{ $bodylvl->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3 form-label-title">Exercise Level</div>
                                            <div class="col-sm-9">
                                                <select name="level_id"  class="form-control w-50  form-select shadow-sm rounded-pill ">
                                                    @foreach ($levelExercise as  $lvl)
                                                        <option value="{{ $lvl->id }}">{{ $lvl->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3 form-label-title">  Body Part</div>
                                            <div class="col-sm-9">
                                                <select name="part_id"  class="form-control w-50  form-select shadow-sm rounded-pill ">
                                                    @foreach ($bodyPart as  $part)
                                                        <option value="{{ $part->id }}">{{ $part->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3 form-label-title">  Body Muscle</div>
                                            <div class="col-sm-9">
                                                <select name="muscle_id"  class="form-control w-50  form-select shadow-sm rounded-pill ">
                                                    @foreach ($muscle as  $mus)
                                                        <option value="{{ $mus->id }}">{{ $mus->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3 form-label-title">Going Up</div>

                                            <div class="col-sm-9">
                                                <select name="going_up"  class="form-control w-50  form-select shadow-sm rounded-pill ">
                                                    <option value="0">In Active</option>
                                                    <option value="1">Active</option>
                                                </select>
                                            </div>
                                        </div>








                                        <button type="submit" class="btn btn-primary mt-3">
                                            Add Exercise
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

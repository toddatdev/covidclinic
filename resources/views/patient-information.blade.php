@extends('layouts.web')

@section('title', 'PDF Generator')


@section('content')


    {{--    @if(is_null($patientInformation))--}}
    <form class="" method="post" action="{{route('patient-information.store')}}">
        <div class="container my-5">

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="col px-0">
                        <h4 class="font-weight-bold text-primary mb-5"> Patient Information</h4>
                        <div class="form-width w-75 ">
                            @csrf
                            <div class="form-group my-4">
                                <input type="text" class="form-control form-control-lg" autofocus
                                       name="first_name" id="first_name"
                                       type="text" placeholder="Patient First Name">
                            </div>

                            <div class="form-group my-4">
                                <input type="text" class="form-control form-control-lg" name="last_name"
                                       id="last_name"
                                       type="text" placeholder="Patient Last Name">
                            </div>

                            <div class="form-group my-4">
                                <input onfocus="(this.type='date')"
                                       class="form-control form-control-lg date-from-control" name="patient_dob"
                                       id="patient_dob" type="text"
                                       placeholder="Patient's Date of Birth (MM/DD/YYYY)">
                            </div>

                            <div class="form-group my-4">
                                <select class="form-control select-option" name="gender" id="">
                                    <option value=" ">Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Intersex</option>
                                </select>
                            </div>

                            <div class="form-group my-4">
                                <input type="text" class="form-control form-control-lg" name="phone_no"
                                       id="phone_no"
                                       type="text" placeholder="Patient's Phone">
                            </div>

                            <div class="form-group mt-4">
                                <input type="text" class="form-control form-control-lg" name="email" id="email"
                                       type="text" placeholder="Patient's Email">
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-6 text-right">
                    <img class="w-100" src="{{asset('media/sidebar_main_img.jpg')}}" alt="">
                    <button type="submit" class="btn web-btn mt-5 w-50">Next</button>
                </div>


            </div>
        </div>
    </form>

    @push('scripts')

    @endpush

@endsection





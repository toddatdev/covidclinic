@extends('layouts.web')

@section('title', 'PDF Generator')


@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-lg-6 my-2">
                <div class="col px-0 pt-4">
                    <h1 class="text-primary h1">Covid Clinic Result</h1>
                    <h1 class="text-primary h1">Form Generation</h1>
                    <p class="my-5 p-des">
                        Welcome to Covid Clinic's result generator.
                        This is to only be used in the the case where the results system is down and the patient needs their results immediately.
                    </p>
                    <a href="{{route('patient-information.index')}}" class="btn web-btn btn-form-generate ">Generate Result Form</a>
                </div>

            </div>

            <div class="col-12 col-lg-6 my-2">
                <img class="w-100 " src="{{asset('media/sidebar_main_img.jpg')}}" alt="">
            </div>


        </div>
    </div>

    @push('scripts')

    @endpush

@endsection





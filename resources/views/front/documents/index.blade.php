@extends('layouts.front.master-2')

@section('css')
    <style>
        .single-input-inner{
            max-height: 66px;
        }
    </style>
@endsection

@section('main')
    <!-- Button trigger modal -->
    <button style="display: none;" type="button" id="modal-alert-button" class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModalCenter">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!-- signup-page-Start -->
    <div style="padding-top:210px;" class="signup-page-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <h3 style="padding-bottom: 10px; text-align: center; width: 100%; font-weight: initial">{{__("Apply")}}</h3>
                    <h4 style="padding-bottom: 10px; text-align: center; width: 100%;">{{$university['name_'.$locale]}}</h4>
                    <form class="signin-inner" method="post" enctype="multipart/form-data"
                          action="{{ route("admission-send",$locale) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="number" value="{{$university->id}}" name="university_id" hidden>
                                    <input required type="text" value="{{$university->name_en}}" name="university_name" hidden>
                                    <input required type="text" value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}"
                                           name="first_name" placeholder="{{__("First Name")}}" readonly>
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text" value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}"
                                           name="last_name" placeholder="{{__("Last Name")}}" readonly>
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text" value="{{\Illuminate\Support\Facades\Auth::user()->middle_name}}"
                                           name="middle_name" placeholder="{{__("Middle Name")}}" readonly>
                                    @error('middle_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->phone_number}}"
                                           name="phone_number" placeholder="{{__("Phone Number")}}" readonly>
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text"
                                           value="@php $city = explode('-', \App\Models\Branch::REGION_SELECT[\Illuminate\Support\Facades\Auth::user()->region]['city']); @endphp @if($locale == 'uz'){{$city[0]}}@elseif($locale == 'ru') {{$city[1]}} @elseif($locale == 'en') {{$city[2]}} @endif
                                               " name="region" placeholder="{{__("Region")}}" readonly>

                                    @error('region')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                           name="email" placeholder="{{__("Email")}}" readonly>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <select required id="program" name="program">
                                        <option value="" disabled selected>{{__('Programs')}}</option>
                                        @foreach($universityPrograms as $key => $program)
                                            <option data-name="{{$program['name_uz']}}"
                                                    value="{{$program->id}}">{{$program['name_'.$locale]}}</option>
                                        @endforeach
                                        @error('program')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <select required id="direction" name="direction">
                                        <option value="" disabled selected>{{__('Directions')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="photo-div" class="single-input-inner style-bg-border">
                                    <img src="" id="photo-img" alt=""
                                         style="height: 100px; display: none;border-radius: .375rem; padding-bottom: 5px">
                                    <label class="label" for="photo"><p aria-required="photo"><i
                                                class="fa fa-user"></i> &nbsp{{__('Your Photo')}} (3x4)</p></label>
                                    <input style="opacity: 0; height: 0" required onchange="readURL_photo(this)" id="photo" type="file" name="photo">
                                    @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="passport-div" class="single-input-inner style-bg-border">
                                    <img src="" id="passport-img" alt=""
                                         style="height: 100px; display: none;border-radius: .375rem; padding-bottom: 5px">
                                    <label class="label" for="passport"><p><i
                                                class="fa fa-file-text"></i> &nbsp{{__('Your Passport')}}</p></label>
                                    <input required onchange="readURL_passport(this)" id="passport" type="file" name="passport"
                                           style="opacity: 0; height: 0">
                                    @error('passport')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="diploma col-12 col-md-6">
                                <div id="diploma-div" class="single-input-inner style-bg-border">
                                    <img src="" id="diploma-img" alt=""
                                         style="height: 100px; display: none;border-radius: .375rem; padding-bottom: 5px">
                                    <label class="label" for="diploma"><p><i
                                                class="fa fa-certificate"></i> &nbsp{{__('Your Diploma')}}</p></label>
                                    <input required onchange="readURL_diploma(this)" id="diploma" type="file" name="diploma"
                                           style="opacity: 0; height: 0">
                                    @error('diploma')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="certificate-div" class="single-input-inner style-bg-border">
                                    <img src="" id="certificate-img" alt=""
                                         style="height: 100px; display: none;border-radius: .375rem; padding-bottom: 5px">
                                    <label class="label" for="certificate"><p><i
                                                class="fa fa-language"></i> &nbsp{{__('Your Certificate')}}</p></label>
                                    <input required onchange="readURL_certificate(this)" id="certificate" type="file"
                                           name="certificate"  style="opacity: 0; height: 0">
                                    @error('certificate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="certificates-div" class="single-input-inner style-bg-border">
                                    <img src="" id="certificates-img" alt=""
                                         style="height: 100px; display: none;border-radius: .375rem; padding-bottom: 5px">
                                    <label class="label" for="certificates"><p>
                                            <i class="fa fa-file"></i> &nbsp{{__('Your Other Certificates')}}</p>
                                    </label>
                                    <input required onchange="readURL_certificates(this)" id="certificates" type="file"
                                           name="certificates" hidden>
                                    @error('certificates')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 mb-4">
                                <button type="submit" class="btn btn-base w-100">{{__('Send')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- signup-page-end -->
@endsection
@section('js')
    <script>
        @php
            $directions = \Illuminate\Support\Facades\DB::table('direction_university')->where('university_id',$university->id)->join('direction_programm','direction_university.direction_id','=','direction_programm.direction_id')->join('directions','directions.id','=','direction_programm.direction_id')->select('direction_programm.programm_id','direction_programm.direction_id','directions.name_en','directions.name_ru','directions.name_uz')->orderBy('direction_programm.programm_id', 'asc')->get();

            $program_ids = [];

            foreach ($directions as $direction){
                $program_ids[] = $direction->programm_id;
            }

            $program_ids = array_unique($program_ids);
        @endphp
        $(document).ready(function () {
            $("#program").change(function () {
                var val = $(this).val();
                var name = $(this).find(':selected').data('name');

                $(".diploma").css("display", "block");

                if (name == 'Bakalavriat') {
                    $('.diploma .single-input-inner label').html("<p style=\"padding: 10px 0;font-size: 20px\"><i class=\"fa fa-certificate\"></i> &nbsp{{__('Your Attestat')}}</p>")
                } else {
                    $('.diploma .single-input-inner label').html("<p style=\"padding: 10px 0;font-size: 20px\"><i class=\"fa fa-certificate\"></i> &nbsp{{__('Your Diploma')}}</p>")
                }

                @foreach($program_ids as $program_id)
                if (val == "{{$program_id}}") {
                    $("#direction").html("@foreach($directions as $direction)@if($program_id == $direction->programm_id)<option value='{{$direction->direction_id}}'>@if($locale=='en'){{$direction->name_en}}@elseif($locale=='ru'){{$direction->name_ru}}@elseif($locale=='uz'){{$direction->name_uz}}@endif</option>@endif @endforeach");
                }
                @endforeach

            });
        });

        function readURL_photo(input) {
            document.getElementById('photo-img').style.display = 'block';
            document.getElementById('photo-div').style.maxHeight = '166px';

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo-img')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL_passport(input) {

            document.getElementById('passport-img').style.display = 'block';
            document.getElementById('passport-div').style.maxHeight = '166px';

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#passport-img')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }

        }

        function readURL_diploma(input) {

            document.getElementById('diploma-img').style.display = 'block';
            document.getElementById('diploma-div').style.maxHeight = '166px';

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#diploma-img')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }

        }

        function readURL_certificate(input) {

            document.getElementById('certificate-img').style.display = 'block';
            document.getElementById('certificate-div').style.maxHeight = '166px';

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#certificate-img')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }

        }

        function readURL_certificates(input) {
            document.getElementById('certificates-img').style.display = 'block';
            document.getElementById('certificates-div').style.maxHeight = '166px';

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#certificates-img')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        @php
            if (session()->has('success')){
                  echo "document.getElementById('modal-alert-button').click(); document.getElementById('exampleModalLongTitle').style.color = 'green'; document.getElementById('exampleModalLongTitle').innerHTML = '".__(session()->get('success'))."';";
            }elseif (session()->has('fail')){
                  echo "document.getElementById('modal-alert-button').click(); document.getElementById('exampleModalLongTitle').style.color = 'red'; document.getElementById('exampleModalLongTitle').innerHTML = '".__(session()->get('fail'))."';";
            }
        @endphp

    </script>
@endsection


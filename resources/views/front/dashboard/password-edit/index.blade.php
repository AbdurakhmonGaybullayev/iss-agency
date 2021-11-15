@extends('layouts.front.master-2')

@section('main')

    <!-- signup-page-Start -->
    <div style="padding-top: 210px" class="signup-page-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 style="padding-bottom: 10px; text-align: center; width: 100%">{{__("Edit Password")}}</h3>
                    <form class="signin-inner" method="post" action="{{route('password-edit', $locale)}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="password" name="current_password" placeholder="{{__("Current Password")}}">
                                    @error('current_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @if(session()->has('incorrect'))
                                        <div class="alert alert-danger">{{ __(session()->get('incorrect')) }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="password" name="new_password" placeholder="{{__("New Password")}}">
                                    @error('new_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @if(session()->has('same'))
                                        <div class="alert alert-danger">{{ __(session()->get('same'))}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="password" name="confirm_new_password" placeholder="{{__("Confirm New Password")}}">
                                    @error('confirm_new_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-base w-100">{{__('Edit')}}</button>
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
        @if(session()->has('success'))

        alert('{{__(session()->get('success'))}}');

        @endif
        @if(session()->has('fail'))

        alert('{{__(session()->get('fail'))}}');

        @endif
    </script>
@endsection

@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.branch.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.Branches.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="number">{{ trans('cruds.branch.fields.number') }}</label>
                    <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '') }}" step="1" required>
                    @if($errors->has('number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name_uz">{{ trans('cruds.branch.fields.name_uz') }}</label>
                    <input class="form-control {{ $errors->has('name_uz') ? 'is-invalid' : '' }}" type="text" name="name_uz" id="name_uz" value="{{ old('name_uz', '') }}" required>
                    @if($errors->has('name_uz'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_uz') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.name_uz_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name_ru">{{ trans('cruds.branch.fields.name_ru') }}</label>
                    <input class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}" type="text" name="name_ru" id="name_ru" value="{{ old('name_ru', '') }}" required>
                    @if($errors->has('name_ru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_ru') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.name_ru_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name_en">{{ trans('cruds.branch.fields.name_en') }}</label>
                    <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', '') }}" required>
                    @if($errors->has('name_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.name_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="address_uz">{{ trans('cruds.branch.fields.address_uz') }}</label>
                    <textarea class="form-control {{ $errors->has('address_uz') ? 'is-invalid' : '' }}" name="address_uz" id="address_uz" required>{{ old('address_uz') }}</textarea>
                    @if($errors->has('address_uz'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address_uz') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.address_uz_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="address_ru">{{ trans('cruds.branch.fields.address_ru') }}</label>
                    <textarea class="form-control {{ $errors->has('address_ru') ? 'is-invalid' : '' }}" name="address_ru" id="address_ru" required>{{ old('address_ru') }}</textarea>
                    @if($errors->has('address_ru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address_ru') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.address_ru_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="address_en">{{ trans('cruds.branch.fields.address_en') }}</label>
                    <textarea class="form-control {{ $errors->has('address_en') ? 'is-invalid' : '' }}" name="address_en" id="address_en" required>{{ old('address_en') }}</textarea>
                    @if($errors->has('address_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.address_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="target_uz">{{ trans('cruds.branch.fields.target_uz') }}</label>
                    <input class="form-control {{ $errors->has('target_uz') ? 'is-invalid' : '' }}" type="text" name="target_uz" id="target_uz" value="{{ old('target_uz', '') }}" required>
                    @if($errors->has('target_uz'))
                        <div class="invalid-feedback">
                            {{ $errors->first('target_uz') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.target_uz_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="target_ru">{{ trans('cruds.branch.fields.target_ru') }}</label>
                    <input class="form-control {{ $errors->has('target_ru') ? 'is-invalid' : '' }}" type="text" name="target_ru" id="target_ru" value="{{ old('target_ru', '') }}" required>
                    @if($errors->has('target_ru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('target_ru') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.target_ru_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="target_en">{{ trans('cruds.branch.fields.target_en') }}</label>
                    <input class="form-control {{ $errors->has('target_en') ? 'is-invalid' : '' }}" type="text" name="target_en" id="target_en" value="{{ old('target_en', '') }}" required>
                    @if($errors->has('target_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('target_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.target_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="working_days_from">{{ trans('cruds.branch.fields.working_days_from') }}</label>
                    <select class="form-control {{ $errors->has('working_days_from') ? 'is-invalid' : '' }}" name="working_days_from" id="working_days_from" required>
                        <option value disabled {{ old('working_days_from', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Branch::WEEKDAYS as $key => $label)
                            <option value="{{ $key }}" {{ old('working_days_from', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('working_days_from'))
                        <div class="invalid-feedback">
                            {{ $errors->first('working_days_from') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.working_days_from_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="working_days_to">{{ trans('cruds.branch.fields.working_days_to') }}</label>
                    <select class="form-control {{ $errors->has('working_days_to') ? 'is-invalid' : '' }}" name="working_days_to" id="working_days_to" required>
                        <option value disabled {{ old('working_days_to', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Branch::WEEKDAYS as $key => $label)
                            <option value="{{ $key }}" {{ old('working_days_to', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('working_days_to'))
                        <div class="invalid-feedback">
                            {{ $errors->first('working_days_to') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.working_days_to_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="working_hours_from">{{ trans('cruds.branch.fields.working_hours_from') }}</label>
                    <input class="form-control {{ $errors->has('working_hours_from') ? 'is-invalid' : '' }}" type="time" name="working_hours_from" id="working_hours_from" value="{{ old('working_hours_from', '') }}" required>
                    @if($errors->has('working_hours_from'))
                        <div class="invalid-feedback">
                            {{ $errors->first('working_hours_from') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.working_hours_from_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="working_hours_to">{{ trans('cruds.branch.fields.working_hours_to') }}</label>
                    <input class="form-control {{ $errors->has('working_hours_to') ? 'is-invalid' : '' }}" type="time" name="working_hours_to" id="working_hours_to" value="{{ old('working_hours_to', '') }}" required>
                    @if($errors->has('working_hours_to'))
                        <div class="invalid-feedback">
                            {{ $errors->first('working_hours_to') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.working_hours_to_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="google_map_link">{{ trans('cruds.branch.fields.google_map_link') }}</label>
                    <textarea class="form-control {{ $errors->has('google_map_link') ? 'is-invalid' : '' }}" name="google_map_link" id="google_map_link" required>{{ old('google_map_link') }}</textarea>
                    @if($errors->has('google_map_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('google_map_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.google_map_link_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="region">{{ trans('cruds.branch.fields.region') }}</label>
                    <select onchange="region_abduvohid()"  class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}" name="region" id="region" required>
                        <option value disabled {{ old('region', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Branch::REGION_SELECT as $key => $label)
                            <option data-id="{{(string) $key}}" value="{{ (string) $label['city'] }}" {{ old('region', '') ===  $key ? 'selected' : '' }}>{{ $label['city'] }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('region'))
                        <div class="invalid-feedback">
                            {{ $errors->first('region') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.region_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="city">{{ trans('cruds.branch.fields.city') }}</label>
                    <select  id="city_abduvohid" class="form-control {{ $errors->has('cityis-invalid') ? : '' }}" name="city" id="city" required>




                    </select>

                    @if($errors->has('city'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.branch.fields.city_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>

        function region_abduvohid(){
            let $select=document.getElementById('region');
            let active_option=$select.options[$select.selectedIndex].dataset.id;

            let city_select= document.getElementById('city_abduvohid');


            <?php
            $php_array = \App\Models\Branch::REGION_SELECT;
            ?>

            let cities=      <?php echo json_encode($php_array); ?>;


            let massiv=(JSON.stringify(cities[active_option].districts).split(','));
            let options='';
            massiv.forEach(element => {

                options+='<option value='+element.split(":")[1]+'>'+element.split(":")[1]+"</option>";
            });
            str = options.replace(/"/g, '');
            str = str.replace(/{/g, '');
            str = str.replace(/}/g, '');

            city_select.innerHTML=str;

        }

    </script>

@endsection

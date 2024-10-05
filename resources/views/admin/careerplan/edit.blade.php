@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.careerplan.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">@lang('Title')</label>
                                    <input name="title" type="text" value="{{ $edit->title }}" id="tittle" class="form-control" placeholder="Enter Title" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="image" class="font-weight-bold">@lang('Image')</label>
                                    <input name="image" type="file" value="{{ $edit->image }}" id="image" class="form-control" placeholder="Place Image" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Description')</label>
                                    <textarea name="description" id="description" cols="30" rows="10">{{ $edit->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="link" class="font-weight-bold">@lang('Link')</label>
                                    <input name="link" type="text" id="tittle" value="{{ $edit->link }}" class="form-control" placeholder="Enter Link" required>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="form-group float-end p-3">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang('Update')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.careerplan.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('long description');
        });
    </script>

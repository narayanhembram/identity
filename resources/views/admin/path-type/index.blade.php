@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-30">
                <div class="card-body">
                    <form action="{{ route('admin.pathtype.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">@lang('Path Type')</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                        placeholder="@lang('Enter Path Type')" required>
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn--primary btn-block btn-lg">@lang('Create')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('ID')</th>
                                    <th>@lang('Titile')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($path_types as $path_type)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $path_type->title }} </td>
                                        <td>
                                            <button title="@lang('Edit')" data-id="{{ $path_type->id }}"
                                                data-name="{{ $path_type->title }}" class="btn btn-sm btn--primary editBtn">
                                                <i class="las la-edit"></i>
                                            </button>

                                            <button title="@lang('Remove')" data-id="{{ $path_type->id }}"
                                                class="btn btn-sm btn--danger rejectBtn">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit modal --}}
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Edit Country')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form id="editForm" action="{{ isset($path_type) ? route('admin.pathtype.update', $path_type->id) : '#' }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_name">@lang('Title')</label>
                            <input type="text" class="form-control" id="edit_name" name="title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('Save Changes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- delete modal --}}
    <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Delete Pathtype Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.pathtype.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this Pathtype') <span
                                class="fw-bold withdraw-user"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--danger btn-global">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $('.rejectBtn').on('click', function() {
            var modal = $('#rejectModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.modal('show');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.editBtn').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#edit_name').val(name);
                var action = "{{ route('admin.pathtype.update', ':id') }}";
                action = action.replace(':id', id);
                $('#editForm').attr('action', action);
                $('#editModal').modal('show');
            });
        });
    </script>
@endpush

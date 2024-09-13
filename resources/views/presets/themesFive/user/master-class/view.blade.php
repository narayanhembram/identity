@extends($activeTemplate . 'layouts.master')

<style>
    .category-card {
        transition: transform 0.3s, border-color 0.3s;
        border: 2px solid transparent;
    }

    .category-card:hover {
        transform: scale(1.05);
        border-color: hsl(var(--base));
    }
</style>

<style>
    .path-box {
        display: flex;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .path-step {
        padding: 15px;
        position: relative;
        background-color: #e6e9ef;
    }

    .path-step:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .path-step:nth-of-type(even) {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        background-color: #4558d1;
        color: #fff !important;
    }
</style>

<style>
    .exam-card {
        display: flex;
        align-items: center;
        background-color: #f9f9f9;
        padding: 10px;
        margin: 10px 0;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }

    .exam-info {
        display: flex;
        align-items: center;
        flex-grow: 1;
    }

    .exam-label {
        font-size: 12px;
    }

    .exam-name,
    .form-issue-date,
    .last-date {
        flex-basis: 30%;
        flex-shrink: 0;
        font-size: 14px;
        margin-right: 20px;
    }

    .exam-dates {
        display: flex;
        align-items: center;
    }

    .exam-dates div {
        font-size: 14px;
        margin-right: 20px;
    }

    .arrow {
        width: 34px;
        height: 34px;
        background-color: #f1f1f1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .arrow::after {
        content: '➔';
        font-size: 25px;
        color: #555;
    }
</style>

<style>
    .card {
        padding: 15px 15px 15px 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background-color: #fff;
    }

    .card .card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card .card-head .status-1 {
        text-align: left;
        font-size: .75rem;
    }

    .card .card-head .status-2 i {
        text-align: right;
        font-size: 1.5rem;
    }

    .card .card-head .circle {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #0fbf61;
        border-radius: 100px;
    }

    .card .card-title {
        text-align: center;
        font-weight: bold;
    }

    .card .card-title i {
        font-size: 35px;
    }

    .card .card-info .label {
        font-size: .75rem;
    }

    .card .card-info .value {
        font-size: .75rem;
        font-weight: bold;
    }

    .card .card-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
<style>
    .card.custom-card video {
        height: 300px;
        width: 100%;
        object-fit: cover;
        border-bottom: 1px solid black;
    }

    .card.custom-card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card.custom-card .card-body {
        padding: 0;
    }

    .card.custom-card video {
        max-height: 300px;
        max-width: 100%;
        border-bottom: 1px solid #ddd;
    }

    .card.custom-card .video-title {
        padding: 8px;
        text-align: center;
        font-weight: bold;
        margin-top: 5px;

    }

    .card.custom-card .video-title h6 {
        color: rgba(33, 113, 138, .89);
        font-size: 1.25rem;
        margin: 0;
    }
</style>

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div class="row pt-3 pb-3" style="background-color: rgba(33, 113, 138, .89); border-radius:8px; color:#fff">
                <div class="col-md-2">
                    <p style="margin-top:7px; font-size:1.2rem; color:#fff;">Search Title</p>
                </div>
                <div class="col-md-5">
                    {{-- <input type="text" id="search" placeholder="Search..."
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"> --}}
                    <select id="mySelect2" style="width: 100%;">
                        <option value="">select title</option>
                        @foreach ($masterclass as $titles)
                            <option value="{{ $titles->title }}"> {{ $titles->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <div class="row" id="videos">
                    @foreach ($video as $index => $videos)
                        <div class="col-md-6 mb-3">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <iframe id="frame{{ $index }}" width="100%" height="315"
                                        src="{{ $videos->link }}?enablejsapi=1" title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    <div class="video-title">
                                        <h6>{{ $videos->title }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('#mySelect2').select2({
            placeholder: "Select an option",
            allowClear: true
        });

        $(document).on('change', '#mySelect2', function() {
            var Title = $(this).val();
            // console.log(Title);
            $.ajax({
                type: "POST",
                url: '{{ route('user.masterclass.get_videos') }}',
                data: {
                    'Title': Title,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    $('#videos').empty();
                    if (response.length == 0) {
                        console.log(response.length);
                        $('#videos').append(
                            '<p>No Videos Found.</p>'
                        );
                    } else {
                        $.each(response, function(key, videos) {
                            $('#videos').append(
                                '<div class="col-md-6 mb-3">' +
                                '<div class="card custom-card">' +
                                '<div class="card-body">' +
                                '<iframe width="100%" height="315" src="' +
                                videos.link + '"' +
                                'title="YouTube video player" frameborder="0"' +
                                'allow="accelerometer; autoplay; clipboard-write;' +
                                'encrypted-media; gyroscope; picture-in-picture; web-share"' +
                                'referrerpolicy="strict-origin-when-cross-origin"' +
                                'allowfullscreen></iframe>' +
                                '<div class="video-title">' +
                                '<h6>' + videos.title + '</h6>' +
                                ' </div>' +
                                '</div>' +
                                '</div>' +
                                '</div>');

                        });
                    }
                    $('.pagination').hide();
                },
            });
        });
    });
</script>

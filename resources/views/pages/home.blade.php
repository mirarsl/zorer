@extends('layout.master')
@section('content')
{!! Breadcrumbs::view('breadcrumbs::json-ld','home') !!}
@foreach ($Page->modules as $module)
@if (View::exists('modules.' . $module->slug))
@include('modules.' . $module->slug, ['module' => $module])
@else
{{-- @include('modules.default', ['module' => $module]) --}}
@endif
@endforeach

@endsection
@push('page_codes')
{!! $Page->page_codes !!}
@endpush
@if($sharedContent['Popup']->status)
    @if(!session()->has('popup_status'))
        @push('modals')
        <!-- Popup Modal -->
        <div id="popup-modal" class="popup-modal mfp-hide">
            <div class="popup-content">
                <button class="popup-modal-dismiss"><i class="fas fa-times"></i></button>
                <div class="popup-image-container">
                    <a {!! $sharedContent['Popup']->link ? 'href="'.$sharedContent['Popup']->link.'" target="_blank"' : 'href="javascript:void(0)"' !!}>
                        <img src="{{Voyager::image($sharedContent['Popup']->image)}}" alt="{{$sharedContent['Popup']->title}}">
                    </a>
                </div>
            </div>
        </div>

        @endpush
        @push('styles')
        <style>
        .popup-modal {
            position: relative;
            max-width: 800px;
            width: 100%;
            height: 100%;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .popup-content {
            position: relative;
            padding: 0;
        }

        .popup-image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-image-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .popup-modal-dismiss {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .popup-modal-dismiss:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: rotate(90deg);
        }

        /* Magnific Popup özelleştirmeleri */
        .mfp-bg {
            opacity: 0.9;
        }
        </style>
        @endpush
        @push('scripts')
        <script>
            $(document).ready(function() {
                $.magnificPopup.open({
                    items: {
                        src: '#popup-modal'
                    },
                    type: 'inline',
                    preloader: false,
                    modal: false,
                    showCloseBtn: false,
                    closeOnBgClick: true,
                    removalDelay: 300,
                    mainClass: 'mfp-fade',
                    callbacks: {
                        open: function() {
                            $('html').css('margin-right', 0);
                        }
                    }
                });

                $(document).on('click', '.popup-modal-dismiss', function (e) {
                    e.preventDefault();
                    $.magnificPopup.close();
                });
            });
        </script>
        @endpush
        @php
        switch ($sharedContent['Popup']->type) {
            case '1':
                session()->remove('popup_status');
                break;
            case '2':
                session()->put('popup_status', 'opened', 60);
                break;
            case '3':
                session()->put('popup_status', 'opened', 60*6);
                break;
            case '4':
                session()->put('popup_status', 'opened', 60*24);
                break;
        }
        @endphp
    @endif
@endif

<div class="rts-about-area-about career rts-section-gapTop">
    <div class="container plr_sm--15 rts-section-gapBottom">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-inner-wrapper-inner">
                    <div class="title-three-left">
                        <div class="disc">
                            {!! $module->getTranslatedAttribute('text') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($module->image)
    <div class="sustain-inner" style="background-image: url({{ Voyager::image($module->image) }})">
        <div class="thumbnail thumbnail-service-about bg-image">
            <div class="reveal-item overflow-hidden aos-init">
                <div class="reveal-animation reveal-end reveal-primary aos aos-init" data-aos="reveal-end"></div>
            </div>
        </div>
    </div>
    @endif
</div>
<div id="apply-here" class="rts-make-an-appoinemtn-area career rts-section-gapBottom rts-section-gapTop">
    <div class="container">
        <div class="row g-0 bg-appoinment">
            <div class="col-xl-5 col-lg-12 pr--80 pr_md--0 pr_sm--0">
                <div class="thumbnail appoinment-m-thumb">
                    <img src="{{Voyager::image($module->image2)}}" alt="appoinment-area">
                </div>
            </div>
            <div class="col-xl-7 col-lg-12">
                <div class="appoinment-inner-content-wrapper career">
                    <span>{{$module->getTranslatedAttribute('top')}}</span>
                    <h2 class="h3 title">{{$module->getTranslatedAttribute('title')}}</h2>
                    <form id="hrForm" action="{{route('store')}}" method="POST" enctype="multipart/form-data" class="appoinment-form mt--40">
                        @csrf
                        <input type="hidden" name="type" value="İnsan Kaynakları">
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        <div class="form-group">
                            <input class="form-control name" type="text" name="json[fullname]" placeholder="{{__('hr.form.fullname')}}" required>
                            <div class="error"></div>
                        </div>
                        <div class="input-half-wrapper">
                            <div class="form-group single-input phone">
                                <input type="text" name="json[phone]" placeholder="{{__('hr.form.phone')}}" required>
                                <div class="error"></div>
                            </div>
                            <div class="form-group single-input">
                                <input type="email" name="json[email]" placeholder="{{__('hr.form.email')}}" required>
                                <div class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input accept=".pdf, .doc, .docx" class="form-control file" type="file" name="json[file]" placeholder="{{__('hr.form.cv')}}" required>
                            <div class="error"></div>   
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="json[message]" placeholder="{{__('hr.form.message')}}" required=""></textarea>
                            <div class="error"></div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="" name="json[kvkk]" value="1" id="kvkk">
                            <label class="small ml-4" for="kvkk">{!! __('hr.form.kvkk') !!}</label>
                            <div class="error position-relative"></div>
                        </div>
                        <button type="submit" class="rts-btn btn-primary">{{__('hr.form.button')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
{!! RecaptchaV3::initJs() !!}
<script>
    $.validator.addMethod("regex", function(value, element, regexp) {
        if (regexp.constructor !== RegExp) {
            regexp = new RegExp(regexp);
        }
        return this.optional(element) || regexp.test(value);
    });
    $(document).ready(function() {
        $('input[name="json[phone]"]').on('input', function() {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
        $("#hrForm").validate({
            rules: {
                "json[fullname]": {
                    required: true,
                    minlength: 3,
                    regex: /^[a-zA-Z]+\s+[a-zA-Z]+$/
                },
                "json[email]": {
                    required: true,
                    email: true
                },
                "json[phone]": {
                    required: true,
                    minlength: 10,
                    regex: /^[0-9]+$/
                },
                "json[file]": {
                    required: true,
                    accept: "application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                },
                "json[message]": {
                    required: true,
                    minlength: 10
                },
                "json[kvkk]": {
                    required: true
                }
            },
            messages: {
                "json[fullname]": {
                    required: "{{__('hr.form.fullname.required')}}",
                    minlength: "{{__('hr.form.fullname.minlength')}}",
                    regex: "{{__('hr.form.fullname.regex')}}"
                },
                "json[email]": {
                    required: "{{__('hr.form.email.required')}}",
                    email: "{{__('hr.form.email.email')}}"
                },
                "json[phone]": {
                    required: "{{__('hr.form.phone.required')}}",
                    minlength: "{{__('hr.form.phone.minlength')}}",
                    regex: "{{__('hr.form.phone.regex')}}"
                },
                "json[file]": {
                    required: "{{__('hr.form.cv.required')}}",
                    accept: "{{__('hr.form.cv.accept')}}"
                },
                "json[message]": {
                    required: "{{__('hr.form.message.required')}}",
                    minlength: "{{__('hr.form.message.minlength')}}"
                },
                "json[kvkk]": {
                    required: "{{__('hr.form.kvkk.required')}}"
                }
            },
            errorElement: "span",
            errorClass: "error-message",
            errorPlacement: function(error, element) {
                element.closest('.form-group').find('div.error').html(error);
            },
            submitHandler: function(form) {
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{config('recaptchav3.sitekey')}}', {action: 'form'}).then(function(token) {
                        document.getElementById('g-recaptcha-response').value = token;
                        form.submit();
                    });
                });
            }
        });
    });
</script>
@if (session()->has('dialog'))
<script>
    $(window).scrollTop($('#hrForm').offset().top);
</script>
@endif
@endpush
@push('links')
<style>
    .grecaptcha-badge { visibility: hidden !important; }
    .error{
        font-size: 9px;
        line-height: 1;
        margin: 0;
        display: inline-block;
        position: absolute;
        left: 3px;
        bottom: 3px;
    }
</style>
@endpush
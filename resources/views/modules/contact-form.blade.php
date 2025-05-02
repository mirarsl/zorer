<div class="rts-contact-page-form-area contact-2 rts-section-gapBottom">
    <div class="container">
        <div class="row">
            @if($module->data()->iframe_url)
            <div class="col-lg-6">
                <iframe src="{{$module->data()->iframe_url}}" width="600" height="640" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            @endif
            <div class="@if($module->data()->iframe_url) col-lg-6 @else col-lg-12 @endif">
                <div class="mian-wrapper-form">
                    <div class="title-mid-wrapper-home-two" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                        <span class="pre">{{$module->getTranslatedAttribute('top')}}</span>
                        <h2 class="title">{{$module->getTranslatedAttribute('title')}}</h2>
                    </div>
                    <form id="contactForm" action="{{route('store')}}" method="POST" class="appoinment-form mt--40">
                        @csrf
                        <input type="hidden" name="type" value="İletişim Formu">
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        <div class="form-group">
                            <input class="form-control" type="text" name="json[fullname]" placeholder="{{__('contact.form.fullname')}}" required>
                            <div class="error"></div>
                        </div>
                        <div class="input-half-wrapper">
                            <div class="form-group single-input">
                                <input type="text" name="json[phone]" placeholder="{{__('contact.form.phone')}}" required>
                                <div class="error"></div>
                            </div>
                            <div class="form-group single-input">
                                <input type="email" name="json[email]" placeholder="{{__('contact.form.email')}}" required>
                                <div class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="json[message]" placeholder="{{__('contact.form.message')}}" required=""></textarea>
                            <div class="error"></div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="" name="json[kvkk]" value="1" id="kvkk">
                            <label class="small ml-4" for="kvkk">{!! __('contact.form.kvkk') !!}</label>
                            <div class="error position-relative"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="rts-btn btn-primary">{{__('contact.form.button')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
{!! RecaptchaV3::initJs() !!}
<script>
    $(document).ready(function() {
        $.validator.addMethod("regex", function(value, element, regexp) {
            if (regexp.constructor !== RegExp) {
                regexp = new RegExp(regexp);
            }
            return this.optional(element) || regexp.test(value);
        });
        $("#contactForm").validate({
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
                    required: "{{__('contact.form.fullname.required')}}",
                    minlength: "{{__('contact.form.fullname.minlength')}}",
                },
                "json[email]": {
                    required: "{{__('contact.form.email.required')}}",
                    email: "{{__('contact.form.email.email')}}"
                },
                "json[phone]": {
                    required: "{{__('contact.form.phone.required')}}",
                    minlength: "{{__('contact.form.phone.minlength')}}",
                    regex: "{{__('contact.form.phone.regex')}}"
                },
                "json[message]": {
                    required: "{{__('contact.form.message.required')}}",
                    minlength: "{{__('contact.form.message.minlength')}}"
                },
                "json[kvkk]": {
                    required: "{{__('contact.form.kvkk.required')}}"
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: "{{ session('status') == 'success' ? __('success') : __('error') }}",
        text: "{{ session('message') }}",
        icon: "{{ session('status') }}",
        confirmButtonText: "@lang('confirm')",
    });
</script>
@endif
@endpush
@push('links')
<style>
    .grecaptcha-badge { visibility: hidden !important; }
    .error{
        color: var(--secondary-color);
        font-size: 9px;
        margin: 0;
        display: inline-block;
        background: var(--text-color);
        position: absolute;
        padding: 3px 10px;
        left: 8px;
        bottom: -8px;
    }
</style>
@endpush
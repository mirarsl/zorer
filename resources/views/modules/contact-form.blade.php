<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-left">
                    <span class="h6">{{setting('site.title')}}</span>
                    <h2>{{$Page->getTranslatedAttribute('hero')}}</h2>
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="contact-form">
                    <h3>{{__('contact.form.title')}}</h3>
                    <form id="contactForm" class="w-100" method="POST" action="{{route('store')}}">
                        @csrf
                        <input type="hidden" name="type" value="İletişim Formu">
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="json[fullname]" placeholder="{{__('contact.form.fullname')}}">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="json[email]" placeholder="{{__('contact.form.email')}}">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="json[subject]" id="">
                                        <option selected disabled>{{__('contact.form.subject')}}</option>
                                        <option value="{{__('contact.form.subject.option1')}}">{{__('contact.form.subject.option1')}}</option>
                                        <option value="{{__('contact.form.subject.option2')}}">{{__('contact.form.subject.option2')}}</option>
                                        <option value="{{__('contact.form.subject.option3')}}">{{__('contact.form.subject.option3')}}</option>
                                        <option value="{{__('contact.form.subject.option4')}}">{{__('contact.form.subject.option4')}}</option>
                                    </select>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="json[message]" placeholder="{{__('contact.form.message')}}"></textarea>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="json[kvkk]" value="1" id="kvkk">
                                    <label class="form-check-label text-white small ml-4" for="kvkk">{{__('contact.form.kvkk')}}</label>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">    
                                    <button class="custom-button"  type="submit">{{__('contact.form.button')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
{!! RecaptchaV3::initJs() !!}
<script>
    $(document).ready(function() {
        $("#contactForm").validate({
            rules: {
                "json[fullname]": {
                    required: true,
                    minlength: 3,
                },
                "json[email]": {
                    required: true,
                    email: true
                },
                "json[subject]": {
                    required: true
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
                "json[subject]": {
                    required: "{{__('contact.form.subject.required')}}"
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
                    grecaptcha.execute('{{config('recaptchav3.sitekey')}}', {action: 'contact'}).then(function(token) {
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
        title: "{{ session('status') == 'success' ? __('swal.success') : __('swal.error') }}",
        text: "{{ session('message') }}",
        icon: "{{ session('status') }}",
        confirmButtonText: "@lang('swal.confirm')",
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
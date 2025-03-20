<section class="content-section">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($Page->data() as $certificate)
            <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
                <div class="certificate">
                    <a href="{{asset($certificate->file)}}" data-fancybox data-caption="{{$certificate->title}}">
                        <img src="{{asset($certificate->file)}}" alt="{{$certificate->title}}">
                    </a>
                    <div class="certificate-title">{{$certificate->title}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@push('links')
<style>
    .certificate a{
        filter: drop-shadow(0px 0px 15px #00000030);
        margin-bottom: .5em;
        border: 1px solid var(--primary-color);
        display: block;
    }
    .certificate a img{
        object-fit: cover;
        width: 100%;
    }
    .certificate .certificate-title{
        display: block;
        width: 100%;
        text-align: center;
        font-size: 16px;
        font-family: 'Recoleta';
        color: var(--primary-color);
    }
</style>
@endpush
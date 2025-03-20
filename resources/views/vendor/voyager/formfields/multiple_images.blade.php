<br>
@if(isset($dataTypeContent->{$row->field}))
<?php $images = json_decode($dataTypeContent->{$row->field}); ?>
@if($images != null)
<div class="orderable-images" style="display:flex;flex-wrap:wrap">                    
    @foreach($images as $image)
    <div class="sortable-el" style="width:200px;" data-id="{{$loop->index}}">
        <div class=" img_settings_container" data-field-name="{{ $row->field }}" style="padding-right:15px;">
            <a href="#" class="voyager-x remove-multi-image" style="position: absolute;"></a>
            <img src="{{ Voyager::image( $image ) }}" data-file-name="{{ $image }}" data-id="{{ $dataTypeContent->getKey() }}" style="pointer-events:none;max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:5px;">
        </div>
    </div>
    @endforeach
</div>
@endif
@endif
<div class="clearfix"></div>
<input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file" name="{{ $row->field }}[]" multiple="multiple" accept="image/*">
@push('javascript')
@if (!empty($dataTypeContent->getKey()))
<script>
    $('.orderable-images').sortable({
        handle:'.sortable-el',
        onEnd: function (event) {
            $.post('{{ route('voyager.orderImages',['table' => $dataType->slug ,'id' => $dataTypeContent->getKey(),"field" => $row->field]) }}', {
                order: JSON.stringify($('.orderable-images').sortable('toArray')),
                _token: '{{ csrf_token() }}'
            }, function (data) {
                toastr.success("Başarılı");
                window.location.reload();
            });
        }
    });
</script>
@endif

@endpush
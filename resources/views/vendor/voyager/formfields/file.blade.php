@if(isset($dataTypeContent->{$row->field}))
@if(json_decode($dataTypeContent->{$row->field}) !== null)
<div class="dd">                    
  <ol class="dd-list">
    @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
    <li class="dd-item" data-id="{{$loop->index}}">
      <div data-field-name="{{ $row->field }}" style="    display: flex;
        align-items: center;
        justify-content: space-between;">
        <a style="width: 100%;" class="fileType dd-handle w-100" target="_blank" href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" data-file-name="{{ $file->original_name }}" data-id="{{ $dataTypeContent->getKey() }}">{{ $file->original_name ?: '' }}</a>
        <a href="#" class="remove-multi-file btn btn-sm btn-danger pull-right item_actions">
          <i class="voyager-trash"></i> {{ __('voyager::generic.delete') }}
        </a>
      </div>
    </li>
    @endforeach
  </ol>
</div>
@else
<div data-field-name="{{ $row->field }}" style="    display: flex;
  align-items: center;
  justify-content: space-between;">
  <a style="width: 100%;" class="fileType dd-handle w-100" target="_blank" href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" data-file-name="{{ $file->original_name }}" data-id="{{ $dataTypeContent->getKey() }}">{{ $file->original_name ?: '' }}</a>
  <a href="#" class="remove-multi-file btn btn-sm btn-danger pull-right item_actions">
    <i class="voyager-trash"></i> {{ __('voyager::generic.delete') }}
  </a>
</div>
@endif
@endif
<input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file" name="{{ $row->field }}[]" multiple="multiple">
@push('javascript')
@if (!empty($dataTypeContent->getKey()))
<script>
  $('.dd').nestable({
    expandBtnHTML: '',
    collapseBtnHTML: ''
  });
  $('.dd').on('change', function (e) {
    $.post('{{ route('voyager.orderFiles',['table' => $dataType->slug ,'id' => $dataTypeContent->getKey(),"field" => $row->field]) }}', {
      order: JSON.stringify($('.dd').nestable('serialize')),
      _token: '{{ csrf_token() }}'
    }, function (data) {
      toastr.success("Başarılı");
    });
  });
</script>
@endif

@endpush
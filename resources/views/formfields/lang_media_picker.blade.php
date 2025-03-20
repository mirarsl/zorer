<input type="hidden" class="form-control opacity-0" name="{{ $row->field }}" id="richtext{{ $row->field }}" value="{{ $dataTypeContent->{$row->field} }}">
<div class="panel">
    <div class="page-content settings container-fluid">
        <div id="media_picker_{{ $row->field }}">
            <media-manager
                base-path="{{ $options->base_path ?? '/'.$dataType->slug.'/' }}"
                :filename="mediaData"
                :allow-multi-select="{{ isset($options->max) && $options->max > 1 ? 'true' : 'false' }}"
                :max-selected-files="{{ $options->max ?? 0 }}"
                :min-selected-files="{{ $options->min ?? 0 }}"
                :show-folders="{{ var_export($options->show_folders ?? false, true) }}"
                :show-toolbar="{{ var_export($options->show_toolbar ?? true, true) }}"
                :allow-upload="{{ var_export($options->allow_upload ?? true, true) }}"
                :allow-move="{{ var_export($options->allow_move ?? false, true) }}"
                :allow-delete="{{ var_export($options->allow_delete ?? true, true) }}"
                :allow-create-folder="{{ var_export($options->allow_create_folder ?? true, true) }}"
                :allow-rename="{{ var_export($options->allow_rename ?? true, true) }}"
                :allow-crop="{{ var_export($options->allow_crop ?? true, true) }}"
                :allowed-types="{{ isset($options->allowed) && is_array($options->allowed) ? json_encode($options->allowed) : '[]' }}"
                :pre-select="false"
                :expanded="{{ var_export($options->expanded ?? false, true) }}"
                :show-expand-button="true"
                :element="'input[name=&quot;{{ $row->field }}&quot;]'"
                :details="{{ json_encode($options ?? []) }}"
            ></media-manager>
            {{-- <input type="hidden" :value="{{ $dataTypeContent->{$row->field} }}" name="{{ $row->field }}"> --}} 
        </div>
    </div>
</div>
@push('javascript')
<script>
new Vue({
    el: '#media_picker_{{ $row->field }}',
    data: {
        mediaData: {{$options->rename ?? 'null'}}
    },
    methods: {
        updateData(newData) {
            this.mediaData = newData;
            console.log('Vue data updated:', this.mediaData);
        }
    }
});

$('.language-selector .btn').on('click', function(){
    setTimeout(function(){
        var data = $('[name="{{$row->field}}"]').val();
        var vueInstance = document.querySelector('#media_picker_{{ $row->field }}').__vue__;
        if (vueInstance) {
            vueInstance.updateData(data);
        }
    }, 100);
});
</script>
@endpush

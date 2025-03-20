<textarea class="form-control opacity-0" hidden name="{{ $row->field }}" id="richtext{{ $row->field }}">
    {{ old($row->field, $dataTypeContent->{$row->field} ?? '') }}
</textarea>
@php
$values = json_decode(old($row->field, $dataTypeContent->{$row->field} ?? ''));
@endphp
@if ($values)
@foreach ($values->q as $key => $item)
<li class="list-group-item list-group-item{{$row->field}}">
 <div class="control-group">
  <div id="row{{$key}}" style="display:flex;width:100%; align-items:center">
   <div class="row" style="width:100%;">
    <div class="col-md-6">
     <label for="">Metin</label>
     <input type="text" name="ext{{$row->field}}[q][]" value="{{$item}}" placeholder="Metin" class="form-control"/> 
    </div>
    <div class="col-md-3">
     <label for="">Metin</label>
     <input type="text" name="ext{{$row->field}}[0][]" value="{{$values->{0}[$key]}}" placeholder="100g İçin" class="form-control"/> 
    </div>
    <div class="col-md-3">
     <label for="">Metin</label>
     <input type="text" name="ext{{$row->field}}[1][]" value="{{$values->{1}[$key]}}" placeholder="Metin" class="form-control"/> 
    </div>
   </div>
   <button type="button" name="remove" id="{{$key}}" class="btn btn-danger btn_remove{{$row->field}}" style="margin-left: 1em">X</button>
  </div>
 </div>
</li>
@endforeach
@else
@endif
<div id="dynamic_field{{$row->field}}"></div>
<button type="button" name="add" id="add{{$row->field}}" class="btn btn-success">Ekle</button>

@push('javascript')
<script>
 $(document).ready(function () {
    $(document).on('.list-group-item{{$row->field}} input, #dynamic_field{{$row->field}} input',function(){
        var data = $('[name^="ext{{$row->field}}"]').serializeArray();
        var json = {
            q: [],
            '0': [],
            '1': []
        };
        for (var i = 0; i < data.length; i += 3) {
            json.q.push(data[i].value);
            json['0'].push(data[i + 1].value);
            json['1'].push(data[i + 2].value);
        }
        $('#richtext{{ $row->field }}').val(JSON.stringify(json));
    });
  var i=1;  
  $('#add{{$row->field}}').click(function(){ 
   i++;  
   $('#dynamic_field{{$row->field}}').append('<div id="row'+i+'" class="dynamic-added{{$row->field}} list-group-item{{$row->field}}" style="display:flex;width:100%; align-items:center"><div class="row" style="width:100%;"><div class="col-md-6"><input type="text" name="ext{{$row->field}}[q][]" placeholder="Metin" class="form-control name_list" /></div><div class="col-md-3"><input type="text" name="ext{{$row->field}}[0][]" placeholder="Metin" class="form-control name_list" /></div><div class="col-md-3"><input type="text" name="ext{{$row->field}}[1][]" placeholder="Metin" class="form-control name_list" /></div></div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove{{$row->field}}" style="margin-left: 1em">X</button></div>');  
  });  
  
  
  $(document).on('click', '.btn_remove{{$row->field}}', function(){  
   var button_id = $(this).attr("id");   
   $(this).parents('#row'+button_id+'').remove();
//    console.log($('#row'+button_id+''));
//    $('#row'+button_id+'').parent().parent().remove();
//    $('#row'+button_id+'').remove(); 
//    $(button_id).remove(); 
   $('.list-group-item{{$row->field}} input, #dynamic_field{{$row->field}} input').trigger('input');
  });  

  $('.language-selector .btn').on('click', function(){
    setTimeout(function(){
        var data = $('[name="{{$row->field}}"]').val();
        var json = JSON.parse(data);
        $('#dynamic_field{{$row->field}}').empty();
        $('.list-group-item{{$row->field}}').remove();
        populateFieldsFromJson(json);
    }, 100);
  });

  function populateFieldsFromJson(json) {
    json.q.forEach(function(item, index) {
        var rowHtml = 
        '<div id="row'+index+'" class="dynamic-added{{$row->field}} list-group-item{{$row->field}}" style="display:flex;width:100%; align-items:center">' +
            '<div class="row" style="width:100%;">' +
                '<div class="col-md-6"><input type="text" name="ext{{$row->field}}[q][]" value="'+item+'" placeholder="Metin" class="form-control name_list" /></div>' +
                    '<div class="col-md-3"><input type="text" name="ext{{$row->field}}[0][]" value="'+json['0'][index]+'" placeholder="Metin" class="form-control name_list" /></div>' +
                    '<div class="col-md-3"><input type="text" name="ext{{$row->field}}[1][]" value="'+json['1'][index]+'" placeholder="Metin" class="form-control name_list" /></div>' +
                '</div>' +
            '<button type="button" name="remove" id="'+index+'" class="btn btn-danger btn_remove{{$row->field}}" style="margin-left: 1em">X</button>' +
        '</div>';
        $('#dynamic_field{{$row->field}}').append(rowHtml);
    });
  }
 });
</script>
@endpush

<br>
@php
    $data = json_decode($content);
    $lang = [
        'name' => "İsim",
        "surname" => "Soyisim",
        'fullname' => "İsim Soyisim",
        "email" => 'E-Posta',
        'phone' => "Telefon",
        'subject' => "Konu",
        'message' => "Mesaj",
        "file" => "Dosya",
        "mesaj" => "Mesaj"
    ];
    $sira = [
        'fullname','name','isim','soyisim','email', 'phone','subject','message', 'telefon','blok','kat','daire','nakit','aylik_butce','extra_odeme','ara_odeme_tutar','ara_odeme_tarih','takas','takas_deger','takas_tanimi','mesaj'
    ];
    $data = collect($data)->only($sira)->toArray();
@endphp
@foreach ($sira as $key)
    @if (array_key_exists($key, $data))
    <strong style="width:200px;display:inline-block">{{$lang[$key] ?? $key}}:</strong>
        @if ($key == "file")
        <a href="/{{asset($data[$key])}}" target="_blank">Görüntüle</a>
        @else
        {{$data[$key] ?? ''}} 
        @endif
        <br>
    @endif 
@endforeach 
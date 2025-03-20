@php
    $data = json_decode(json_encode($json));
    $lang = [
        'name' => "Name",
        "email" => 'Email',
        'phone' => "Phone",
        'message' => "Message"
    ];
@endphp
<div id="frame" class="ui-sortable">
    <div class="parentOfBg">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="currentTable">
        <tbody>
          <tr>
            <td valign="top" align="center" bgcolor="#f5f5f5" style="background-attachment: scroll; -webkit-background-size: cover; background-size: cover; color: rgb(255, 255, 255); font-size: 18px; background-position: 50% 50%; background-repeat: no-repeat no-repeat;" data-bg="Header" background="{{asset(url('/').'/storage/pages/banner.jpg')}}">
              <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="textAlignCenter">
                <tbody>
                  <tr>
                    <td height="100" style="line-height: 0px; font-size: 1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center">
                      <a href="#" class="change_link">
                        <img onerror="src='/img/empty.jpg'"  src="{{asset(url('/').'/storage\/'.setting('site.logo'))}}" border="0" style="display: block;" class="reset" width="150px">
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td height="80" style="line-height: 0px; font-size: 1px;">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="textAlignCenter" style="color: #323232;" data-module="intro" >
      <tbody>
        <tr>
          <td bgcolor="#FFFFFF" style="border-bottom: 1px solid #ededed;">
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="alignCenter" style="font-family: 'ProximaNW01-AltLightReg', Helvetica, Arial, sans-serif;">
              <tbody>
                <tr>
                  <td height="70" style="line-height: 0px; font-size: 1px;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="center" class="paddingBoth" style="font-size: 30px;">
                    <p style="color: #323232; padding: 0px 0px 0px 0px;" data-color="Headline Big" data-size="Headline Big" data-min="16">İletişim Mesajı</p>
                  </td>
                </tr>
                <tr>
                  <td height="60" style="line-height: 0px; font-size: 1px;">&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="textAlignCenter" style="font-size: 32px; color: #323232;" data-module="image right">
      <tbody>
        <tr>
          <td bgcolor="#FFFFFF">
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="textAlignCenter">
              <tbody>
                <tr>
                  <td height="60" style="line-height: 0px; font-size: 1px;">&nbsp;</td>
                </tr>
                @foreach ($data as $key => $item)
                    <tr>
                        <td class="increasePadding-Both">
                        <p href="#" style="font-size: 22px; color: #000000; padding: 0px 0px 0px 0px;" data-color="Headlines" data-size="Headlines" data-max="24">{{$lang[$key] ?? $key}}:</p>
                        <p style="font-size: 16px; color: #000000; line-height: 28px; padding: 10px 0px 45px 0px;" data-color="Paragraphs" data-size="Paragraphs" data-max="24">{{$item}}</p>
                        </td>
                    </tr>
                @endforeach 
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>

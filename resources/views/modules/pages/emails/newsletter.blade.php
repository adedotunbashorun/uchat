@extends('core::emails.master')
@section('content')
<table width="500" border="0" cellpadding="10">
  <tr>
    <td><b> {{$subject}}  </b></td>
  </tr>

  <tr>

  </tr>
  
  <tr>
    <td> <br><br>{!! $body !!} </td>
  </tr>
</table>
@stop
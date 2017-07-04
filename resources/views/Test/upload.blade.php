@extends('layout/layout')
@section('title')
上传文章
@stop


@section('content')
<div align='center'>
<table>
     <form action="{{url('upload')}}" method="post">
         
         {{csrf_field()}}
     <tr>
         <td>标题：</td>
         <td><input type="text" name="content.title" value=""></td>
     </tr>
     <tr>
         <td>内容：</td><td></td>
     </tr>
     
     <tr>
         <td></td>
         <td>
             <textarea cols="120" rows="5" name="content.content"></textarea>
         </td>
     <!--<input type="hidden" name="content.time" value="{{date("Y-m-d h:i:s")}}">-->      
     <input type="hidden" name="content.sure" value="0">
     </tr>
     <tr>
         <td><input type="reset"  value="重置" onclick="return confirm('确定要重置？\n   已遍写内容将被清空.');"></td>
         <td><input type="submit"  value="提交" onclick="return confirm('确定提交？');"></td>
     </tr>
     
     </form>
 </table>
</div>
@stop

@extends('layout/layout')

@section('title')
更改信息
@stop



@section('content')

 @foreach($update as $i)
 <table>
     <form action="{{url('check')}}" method="post">
         
         {{csrf_field()}}
     <tr>
         <td>标题：</td>
         <td><input type="text" name="content.title" value="{{$i->title}}"></td>
     </tr>
     <tr>
         <td>内容：</td><td></td>
     </tr>
     
     <tr>
         <td></td>
         <td>
             <textarea cols="120" rows="5" name="content.content">{{$i->content}}</textarea>
         </td>
     <input type="hidden" name="content.id" value="{{$i->Id}}">
     <!--<input type="hidden" name="content.time" value="{{date("Y-m-d h:i:s")}}">-->      
     <input type="hidden" name="content.sure" value="0">
     </tr>
     <tr>
         <td><input type="reset"  value="重置"></td>
         <td><input type="submit"  value="提交" onclick="return confirm('确定要保存已经修改的内容？');"></td>
     </tr>
     
     </form>
 </table>
 @endforeach
@stop


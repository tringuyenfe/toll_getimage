@extends('master')
@section('content')
<style type="text/css" media="screen">
  .checkbox{
    position: relative;
    top: -27px;
    left: 196px;
    width: 22px;
  }
</style>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
       <form id="demo-form2" action="/admin/folder/download/{{ $idthumuc}}" method= "POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
       <input type="hidden" name="_token" value="{!! csrf_token() !!}">
       <input type="hidden" name="idthumuc" value="{{ $idthumuc }}">
        <div class="x_panel">
          <div class="x_title">
            <h2>Folder</h2>
            <div id="download" style="margin-left: 850px;float: left;">
              <button type="submit" name="downloadsm" class="btn btn-success">Tải về</button>
              <button type="submit" name="deletesm" class="btn btn-danger">Xóa</button>
            </div>
            <div>
              <label>Chọn tất cả</label>
              <input type="checkbox" style="margin-left: 10px;" onclick="checkall('item',this)" name="chk" align="center" class="chkall dowload" value="">
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
             @if(count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li class="list-inline">{!! $error !!}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class='col-lg-12'>
               @if(Session::has('flash_message'))
                <div class='alert alert-{!! Session::get('flash_level')!!}' >
                    {!! Session::get('flash_message')!!}
                </div>
               @endif
          	</div>
            @foreach($link as $key=>$value)
              @foreach($value as $val)
                <div class="form-group" style="float: left; margin-right: 35px;">
                 <img src="{{$val['link']}}" alt="{{$val['name']}}" title="{{$val['name']}}" style="width: 220px;height: 294px;">
                 <input type="checkbox" name="iddel[]" value="{{$val['id']}}" class="checkbox item">
                </div>
              @endforeach
            @endforeach
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection

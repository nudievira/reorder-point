{!! Form::model($data,['route' => ['profil.updatepicture',$data->id],'files'=>true,'method'=>'PATCH','class'=>'form-horizontal']) !!}
<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Picture</h3>
  </div>
  <form class="form-horizontal">

    <div class="box-body">
      <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Picture :</label>
        <div class="col-sm-3">
          <input type="file" name="picture" id="picture" class="form-control">
          @if ($errors->has('picture'))
              <span class="help-block">
                  <strong>{{ $errors->first('picture') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>


    <div class="box-footer text-center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
      <a href="{{url('home')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>

  </form>
</div>
{!! Form::close() !!}

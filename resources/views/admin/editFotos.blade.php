@extends('backpack::layout')
@section('before_styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.5/css/fileinput.min.css" />
@stop


@section('content')
    <div class="row" id="fotos">
    @forelse ($fotos as $foto)
      <div class="col-md-3">
            <span style="position: absolute; right:15px;">
              <a href="{{url('api/image/'. $foto->id . '/delete')}}" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i></a>
            </span>
            @if ($foto->id != $residencia->default_photo)
              <span style="position: absolute;">
                <a href="{{url('admin/residencia/'. $residencia->id .'/image/'. $foto->id ."/default")}}" class="btn btn-xs btn-primary"> Marcar como principal</a>
              </span>
            @else
              <span style="position: absolute;" class="label label-primary">
                Principal
              </span>
            @endif

            <a href="#" class="thumbnail">
              <img data-src="{{$foto->url}}" src="{{$foto->url}}" alt="">
            </a>
      </div>
    @empty
    @endforelse
      
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            <input type="file" name="photo" multiple="" id="input-image"  accept="image/*">
            </div>
        </div>
    </div>

@endsection

@section('after_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.5/js/fileinput.js"></script>
<script>
$("#input-image").fileinput({
    uploadUrl: "{{ url('admin/residencia/'. $residencia->id .'/uploadPhoto')}}", // server upload action
    uploadAsync: true,
    maxFileCount: 10
})
.on("filebatchselected", function(event, files) {
    // trigger upload method immediately after files are selected
    $("#input-image").fileinput("upload");
})
.on('fileuploaded', function(event, data, previewId, index) {
  console.log(data.response);
  $("#fotos").append('<div class="col-md-3"><span style="position: absolute; right:15px;"><a href="{{url('api/image/delete')}}'+ data.response.id +'" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i></a> </span> <a href="#" class="thumbnail"> <img data-src="'+ data.response.url +'" src="'+ data.response.url +'" alt=""> </a> </div>');
});
</script>
@stop


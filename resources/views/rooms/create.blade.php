

@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
  <div class="col-8 ml-4">
    <div class="card-header">
      <h3 class="card-title">Create new room.</h3>

    <div class="tile-title">
      <p></p><a class="btn btn-primary" href="{{ route('rooms.index') }}">Back..</a></p>
    </div>

  
<form action="/rooms" method="POST" class="pb-5" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputName1"> <strong>Select Block Name</strong> </label>
      <select class="form-control input-lg dynamic" name="block_id" id="block_id"
       data-dependent="block">
        @foreach ($blocks as $block)
        <option value="{{ $block->id }}" {{ old('block') == $block->id? 'selected' : '' }} >{{ $block->name }}</option>
        @endforeach
      </select>
    </div>


    <div class="form-group">
        <label for="exampleInputroom1"> <strong>Room Number</strong> </label>
        <input class="form-control"  type="number" name="number" placeholder="room">
        <div>{{ $errors->first('room')}}</div>
    </div>

    <div class="form-group">
      <label for="exampleInputbed_capacity1"> <strong>Bed capacity</strong> </label>
      <input class="form-control"  type="number" name="bed_capacity" placeholder="Bed capacity">
      <div>{{ $errors->first('bed_capacity')}}</div>
    </div>
    
    <div class="tile-footer">
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>
    

    @csrf
  </form>

</div>
</div>
</div>

<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() !=''){
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                
                $.ajax({
                    url:"{{ route('rooms.fetch') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        dependent: dependent
                    },

            success: function(result){
                $('#'+ dependent).html(result);
            }
                });
            }
        });
    });
</script>
    
@endsection
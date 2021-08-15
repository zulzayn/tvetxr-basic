<div>
    {{-- START SECTION - COURSE FILE FORM  --}}
    @livewire('course-file.course-file-form-wire')
    {{-- END SECTION - COURSE FILE FORM  --}}

    {{-- START SECTION - DATATABLE COURSE FILE  --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" style="overflow:scroll">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Resource Name</th>
                                <th class="text-center">Resource File</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style='width:40px'>Action</th>
                            </tr>
                        </thead>
                    
                            @foreach ($coursefiles as $coursefile)
                            <tbody>
                                <tr>
                                    <td>{{$coursefile->course ? $coursefile->course->name : ''}}</td>
                                    <td>{{$coursefile->name}}</td>
                                    <td>{{$coursefile->name}}</td>
                                                <td class="text-center">
                                                    @if ($coursefile->file_type == "360file")
                                                        <a href="{{URL::to('/video_360/'.$coursefile->id.'')}}" target="_blank" class="btn btn-success">View 360° Video</a>    
                                                    @elseif ($coursefile->file_type == "3dfile")
                                                        <a href="{{URL::to('/3d_model_view/'.$coursefile->id.'')}}" target="_blank" class="btn btn-success">View in VR</a>
                                                        <a href="{{URL::to('/ar_view/'.$coursefile->id.'')}}" target="_blank" class="btn btn-success">View in AR</a>
                                                    @else
                                                        <a href="{{URL::to(''.$coursefile->file_path.'')}}" target="_blank" class="btn btn-success">View File</a> 
                                                    @endif
                                                    
                                                    <br>
                                                    <small>{{$coursefile->file_name}}</small>
                                    </td>
                                    <td>{{date('j F Y', strtotime($coursefile->created_at))}}</td>
                                    <td>{{date('j F Y', strtotime($coursefile->updated_at))}}</td>
                                    <td>
                                        <table style="border:none">
                                            <tr>
                                                <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$coursefile->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$coursefile->id}}"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                    
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
      {{-- END SECTION - DATATABLE COURSE FILE  --}}        


@push('scripts')

{{-- START SECTION - SCRIPT FOR DELETE BUTTON  --}}
<script>
    
  document.addEventListener('livewire:load', function () {


    $(document).on("click", ".data-delete", function (e) 
        {
            e.preventDefault();
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                e.preventDefault();
                Livewire.emit('delete')
            } 
            });
        });

  })
</script>
{{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}

@endpush

</div>


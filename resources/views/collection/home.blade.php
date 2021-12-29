@extends('layouts.app')

@section('content')
<section class="container">
    <div class="collection-list mr-5">
        <div class="d-flex flex-row justify-content-between">
            <div class="colname">Collection List</div>
            <div class="mt-4 col-2">
                <button data-toggle="modal" data-target="#exampleModalCenter" type="button" class = "btn btn-lg btn-primary">
                <i class="fas fa-plus pl-5" style="font-size: 25px;"></i>
                </button>
            </div>
        </div>
      <div class="list">
        @foreach ($collections as $collection)
            <div class="content ml-3 collection-{{ $collection->id }}">
                <a type="button" data-id="{{ $collection->id }}" data-path="{{ route('collection.show') }}" class="px-5 pt-4 collection">{{ $collection->name }}</a>
            </div>
        @endforeach
      </div>
    </div>
    <div class="collection-detail">
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-size: 30px; color:black; font-weight:800;" id="exampleModalLongTitle">Create New Collection</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body row my-3  align-items-center">
                <meta name="csrf-token" content="{!! csrf_token() !!}">
                <label for="email" class="mt-2"><b style="color: black; font-size:20px;">Collection of Name</b></label>
                <input type="text" class="form-control collection-name" placeholder="Enter Name" name="name" required>
                <label for="psw" class="mt-3"><b style="color: black; font-size:20px;">Description</b></label>
                <input type="text"  placeholder="description" class="mr-2 col-10 collection-name form-control description" required>
                <label for="psw" class="mt-3"><b style="color: black; font-size:20px;">Status</b></label>
                <select name="status" class="form-control status">
                    <option value="1">Public</option>
                    <option value="0">Private</option>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" path="{{ route('collection.store') }}" class="btn btn-primary create-collection">Save</button>
            </div>
          </div>
        </div>
      </div>
      {{-- Update Collection --}}
      <div class="modal fade" id="updatedCollection" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-size: 30px; color:black; font-weight:800;" id="exampleModalLongTitle">Edit Collection</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body row my-3  align-items-center">
                <meta name="csrf-token" content="{!! csrf_token() !!}">
                <label for="email" class="mt-2"><b style="color: black; font-size:20px;">Collection of Name</b></label>
                <input type="text" class="form-control updated-name" placeholder="Enter Name" name="name" required>
                <label for="psw" class="mt-3"><b style="color: black; font-size:20px;">Description</b></label>
                <input type="text"  placeholder="description" class="mr-2 col-10 updated-description form-control" required>
                <label for="psw" class="mt-3"><b style="color: black; font-size:20px;">Status</b></label>
                <select name="status" class="form-control updated-status">
                    <option value="1">Public</option>
                    <option value="0">Private</option>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" path="{{ route('collection.update')}}" class="btn btn-primary updated-collection">Updated</button>
            </div>
          </div>
        </div>
      </div>
  </section>    
@endsection
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
    $(document).on('click', '.collection', function() {
        var id = $(this).attr("data-id");
        var path = $(this).attr("data-path"); 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: path,
            type: "get",
            data: {
                'id' : id,
            },

            success: function(response) {
                $('.collection-detail').children().remove();
                $('.collection-detail').append($(response).html());
            }
        });
    });
    
</script>
{{-- XÓa bộ thẻ --}}
<script>
     $(document).on('click', '.delete-collection', function() {
            var id = $(this).attr("data-id");
            var path = $(this).attr("path");
            if (confirm("Are you sure ?")) { 
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

              $.ajax({
                  url: path,
                  type: "delete",
                  data: {
                      'id' : id,
                  },

                  success: function(response) {
                      var remove = ".collection-" + id;
                      $('.collection-detail').children().remove();
                      $(remove).remove();
                  }
              });
            }
        });
</script>
{{-- Cập nhật lịch --}}
<script>
    $(document).on('click', '.updated', function() {
        $('.schedule-save').toggle();
        $(this).toggle();
    });
    
    $(document).on('click', '.schedule-save', function() {
        var id = $(this).attr('data-id');
        var path = $(this).attr('data-path');
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              url: path,
              type: "post",
              data: {
                  'id' : id,
                  'one' : $("#one").val(),
                  'two' : $("#two").val(),
                  'three' : $("#three").val(),
                  'four' : $("#four").val(),
                  'custom' : $("#custom").val(),
              },

              success: function(response) {
                $('.schedule-save').toggle();
                $('.updated').toggle();
                  alert("Edit schedule success!");
              }
          });
      });
</script>
{{-- Tạo collection mới --}}
<script>
    $(document).on('click', '.create-collection', function() {
        var name = $('.collection-name').val();
        var description = $('.description').val();
        var status = $('.status').val();
        var path = $(this).attr("path");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: path,
            type: "post",
            data: {
                'name' : name,
                'description' : description,
                'status' : status
            },
    
            success: function(response) {
                var path = '/';
                window.location.href = path;
            }
        });  
    });
</script>
<script>
    $(document).on('click', '.updated-collection', function() {
        var name = $('.updated-name').val();
        var description = $('.updated-description').val();
        var status = $('.updated-status').val();
        var path = $(this).attr("path");
        var id = $('.collection-updated').attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: path,
            type: "post",
            data: {
                'name' : name,
                'description' : description,
                'status' : status,
                'id' : id
            },
    
            success: function(response) {
                var path = '/';
                window.location.href = path;
            }
        });  
    });
</script>
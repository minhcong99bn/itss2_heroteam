@extends('layouts.app')

@section('content')
<section class="d-flex justify-content-around mt-5 px-5">
    <div class="collection-list mr-5 ml-5 col-4">
        <div class="d-flex flex-row justify-content-between">
            <div class="colname">Collection List</div>
            <div class="mt-1" style="margin-right: 3%;">
                <button data-toggle="modal" data-target="#exampleModalCenter" type="button" class = "btn btn-lg btn-primary">
                <i class="fas fa-plus pl-5" style="font-size: 25px;"></i>
                </button>
            </div>
        </div>
      @if (count($collections) > 0)
        <div class="list">
          @foreach ($collections as $collection)
          <a type="button" data-id="{{ $collection->id }}" style="width: 97%;" data-path="{{ route('collection.show') }}" class="px-5 content pt-4 collection collection-{{ $collection->id }}">    
                <div class="ml-3">
                  {{ $collection->name }}
                </div>
          </a>
          @endforeach
        </div>
      @endif
    </div>
    @if (count($collections) > 0)
      <div class="collection-detail">
      </div>
    @endif
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-size: 30px; color:black; font-weight:800;" id="exampleModalLongTitle">Create New Collection</h5>
            </div>
            <div class="modal-body row my-3  align-items-center">
                <meta name="csrf-token" content="{!! csrf_token() !!}">
                <label for="email" class="mt-2"><b style="color: black; font-size:20px;">Collection of Name</b></label>
                <input type="text" class="form-control collection-name" placeholder="Enter Name" name="name" required>
                <label for="psw" class="mt-3"><b style="color: black; font-size:20px;">Description</b></label>
                <input type="text"  placeholder="description" style="padding-top: 15px; padding-bottom: 15px;" class="mr-2 col-10 collection-name form-control description" required>
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
        $(".schedule-input").removeAttr('disabled');
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
                  $(".schedule-input").attr('disabled','disabled');
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
<style>
 * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  ul {
    list-style: none;
  }
  .navbar {
    top: 0;
    left: 0;
    display: flex;
    width: 100%;
    justify-content: space-between;
    background-color: #823b40;
    padding-left: 50px;
    padding-right: 50px;
    color: white;
    align-items: center;
  }
  .navbar img {
    width: 150px;
    height: 60px;
  }
  .nav-menu {
    display: flex;
    justify-content: space-between;
  }
  .nav-menu li {
    width: 130px;
    text-align: center;
    margin: 20px;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
  }
  .container {
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin: 40px 40px;
  }
  .container .slider-left img,
  .slider-right img {
    height: 100px;
    width: 100px;
  }
  
  .collection-list {
    width: 40%;
    height: 512px;
    letter-spacing: 0.75px;
    font-family: "Open Sans";
    font-style: normal;
    font-weight: normal;
  }
  .collection-list .colname {
    margin-bottom: 30px;
    color: #823b40;
    height: 50px;
    font-size: 36px !important;
    font-weight: 700;
  }
  .collection-list .list {
    overflow: scroll;
    width: 97%;
    height: 85%;
    margin-top: 10px;
  }
  .collection-list .list a {
    width: 97%;
    height: 80px;
    font-size: 30px;
    mix-blend-mode: normal;
    border-radius: 10px;
    background-image: url("../../storage/app/public/images/image1.png");
    text-decoration: none !important;
    color: white;    
  }
  
  .collection-detail {
    width: 55%;
    height: 512px;
    letter-spacing: 0.75px;
    font-family: "Open Sans";
  }
  .collection-detail .colname {
    margin-bottom: 30px;
    color: #823b40;
    height: 50px;
    font-size: 32px;
  }
  .collection-detail .setting-menu {
    /* display: flex;
    justify-content: space-between;
    align-items: center; */
  }
  .collection-detail .setting-menu li {
    text-align: center;
    margin: 5px;
    font-size: 20px;
    cursor: pointer;
    border-radius: 40px;
    color: white;
  }
  .collection-detail .setting-menu .delete {
    border: 3px solid #823b40;
    border-radius: 50%;
    padding: 10px;
    height: 56px;
  }
  .collection-detail .setting-menu .delete img {
    padding-left: 5px;
    padding-right: 5px;
    width: 30px;
    height: 30px;
  }
  .collection-detail .stat-schedule {
    height: 76%;
    display: flex;
  }
  .collection-detail .stat-schedule .stat {
    width: 50%;
  }
  .collection-detail .stat-schedule .schedule {
    width: 50%;
  }
  
  .collection-detail .stat-schedule * .colname {
    color: #4e4b66;
  }
  .collection-detail .stat-schedule * .stat-detail {
    /* background: linear-gradient(to right, #e69a8d 50%, white 50%); */
    border: 1px solid gray;
    border-radius: 10px;
    margin: 10px;
    height: 50px;
    font-size: 20px;
    color: #4e4b66;
  }
  .collection-detail .stat-schedule *  .head {
    color: white;
    display: inline-block;
  }
  .collection-detail .stat-schedule * .stat-detail .tail {
    color: #4e4b66;
  }
</style>
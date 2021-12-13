<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <div class="col-sm-6">
        <a href="{{ route('dashboard') }}" type="button" class="btn btn-lg btn-success">ホーム</a>
    </div>
    <div class="col-sm-6 ">
        <div class="float-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                this.closest('form').submit();" type="button" class="btn btn-lg btn-success">
            </form>
                サインアウト
            </a>
        </div>
    </div>
</nav>

<br>

<div class="container">
    <div class="row collections-view justify-content-around align-items-center"> 
        @foreach($collections as $collection)
            <div class="col-sm-4" id="collection-{{ $collection->id }}">
                <div class = "p-5 m-3 border bg-light float center text-center">
                    <a class="text-dark mb-3" href="{{ route('collection.create-collection', $collection->id) }}"><b class="mb-3">{{ $collection->name }}</b></a>
                    <div class="d-flex justify-content-end align-items-end">
                        <a href="javascript:void(0)" class="delete-collection align-items-end" path="{{ route('collection-delete') }}" data-id="{{ $collection->id }}" onclick="return confirm('Are you want do delete this?')">消去</a>
                    </div>
                </div>
               
            </div>
        @endforeach
    </div>
    
    <div class = "row ">
        <div class = "col-lg-12">
            <div class="float-right">
                <button data-toggle="modal" data-target="#exampleModalCenter" type="button" class = "btn btn-lg btn-primary">
                    新しいコレクション
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">新しいコレクションを作成</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="modal-body row my-3  align-items-center">
              <label class="col-12">新しいコレクションの名前</label>
              <meta name="csrf-token" content="{!! csrf_token() !!}">
              <input type="text"  placeholder="コレクションの名前を入力してください" class="mr-2 col-10 collection-name form-control" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
              <button type="button" path="{{ route('collection.store') }}" class="btn btn-primary create-collection">作成</button>
            </div>
          </div>
        </div>
      </div>
      <script src="http://code.jquery.com/jquery.min.js"></script>
      <script>
          $('.create-collection').click(function()
          {
              var name = $('.collection-name').val();
              if (name == '')
                alert("Vui lòng điền đầy đủ thông tin");
              var path = $(this).attr("path");
              console.log(path);
          
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
                  },
          
                  success: function(response) {
                      var path = '/collection/create/' + response.id;
                      window.location.href = path;
                  }
              });  
          });

            $(document).on('click', '.delete-collection', function() {
            var id = $(this).attr("data-id");
            var path = $(this).attr("path");   
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
                    var remove = "#collection-" + id;
                    $(remove).remove();
                }
            });
        });
    </script>

</body>
</html>

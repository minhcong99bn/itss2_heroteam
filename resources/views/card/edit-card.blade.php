@extends('layouts.app')

@section('content')
    <section class="container">
      <div class="search">
        <div class="dropdown mt-2">
          Search by
          <button class="dropbtn">Card</button>
          <div class="dropdown-content">
            <a href="#">Card</a>
            <a href="#">Tag</a>
          </div>
        </div>
        <div class="mt-4 col-2">
            <button data-toggle="modal" data-target="#createNewCard" type="button" class = "btn btn-lg btn-primary">
            <i class="fas fa-plus pl-5" style="font-size: 25px;"></i>
            </button>
        </div>
        {{-- <input type="text" placeholder="Search" /> --}}
        <table class="table mt--4">
          <tr>
            <th>Card</th>
            <th>Due date</th>
            <th>Tag</th>
          </tr>
            @foreach ($cards as $card)
                <tr>
                    <td><a href=""  style="color:black; text-decoration: none;">{{ $card->front }}</a></td>
                    <td>{{ $card->default }}</td>
                    <td>Germany</td>
                </tr>
            @endforeach
        </table>
      </div>
      <div class="result">
        <div class="buttoon">
          <button class="button button1">Front</button>
          <button class="button button2">Back</button>
        </div>
        <div class="tags">
          <div
            class="simple-tags"
            id="container"
            data-simple-tags="Animals, Dogs"
          ></div>
        </div>
        <div class="flas-card">
          <div class="row">
            <button class="button5">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="button6">
              <i class="fas fa-save"></i>
            </button>
          </div>
          <div class="card-content">
            海豚
          </div>
        </div>
      </div>
    </section>
    {{-- <div class="modal fade" id="createNewCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      </div> --}}
@endsection
<style>
  
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
    height: 500px;
  }
  .container .slider-left img,
  .slider-right img {
    height: 100px;
    width: 100px;
  }
  .search {
    width: 40%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
  }
  
  .dropbtn {
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown:hover .dropdown-content {
    display: block;
  }
  
  .search input {
    font-size: 30px;
    height: 50px;
    width: 100%;
  }
  .search .table {
  
    width: 100%;
  }
  table {
    text-align: center;
    width: 400px;
  }
  table,
  th,
  td {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
      Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    border: 1px solid black;
    border-collapse: collapse;
  }
  th {
    background-color: #e5e5e5;
  }
  .result {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    height: 100%;
    width: 55%;
  }
  
  .result .tags {
    height: 5%;
  }
  
  .result .buttoon{
    height: 10%;
  }
  
  .result .buttoon .button {
    font:Roboto;
    color: white;
    padding: 10px 20px;
    width: 140px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    border-radius: 40px;
    border: none;
    font-size:  20px;
  }
  
  .button1 {
    background-color: #65c466;
  }
  .button2 {
    background-color: #ebed7d; 
  }
  .button3 {
    background-color: #519cf5;
  }
  .button4 {
    border: none;
    background-color: transparent;
    font-size: 40px;
    cursor: pointer;
    color: #E69A8D;
  }
  .result .flas-card{
    border-radius: 10px;
    border: 1px solid #C4C4C4;
    height: 70%;
    display: flex;
    flex-direction: column;
  }
  .result .flas-card .row{
    height: 10%;
  background-color: #C4C4C4;
  }
  .result .flas-card .row button{
    font-size: 30px;
    border: none;
    background-color: transparent;
    cursor: pointer;
    width: 10%;
  }
  .result .flas-card .row .button5{
    color: #D8A522;
  }
  .result .flas-card .row .button6{
    color: #65C466;
  }
  .result .flas-card .card-content{
    height: 100%;
    font-size: 80px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-content: center;
    flex-direction: column;
  }
  simple-tags {
    border: 1px solid #1e87f0;
    box-sizing: border-box;
    margin: 1em;
    padding: 0em 0.5em;
    display: -webkit-box;
    display: flex;
    flex-wrap: wrap;
    font-size: 14px;
    border-radius: 5px; }
    .simple-tags > ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: -webkit-box;
      display: flex;
      flex-wrap: wrap; }
    .simple-tags ul li {
      margin: 0.5em 0.2em;
      padding: 0.5em;
      color: #fff;
      background-color: #1e87f0;
      border-radius: 5px; }
    .simple-tags ul li a {
      margin: 0.5em 0.2em;
      text-decoration: none;
      color: inherit; }
    .simple-tags input {
      padding: 0.9em 0.5em;
      box-sizing: border-box;
      -webkit-box-flex: 1;
              flex-grow: 1;
      border: none;
      outline: none;
      font-size: inherit;
      font-family: inherit;
      color: inherit; }
</style>
  <script>
    var el = document.getElementById("container");
    new Tags(el);
  </script>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
    $(document).on('click', '.create-card', function() {
        var front = $('.card-front').val();
        var back = $('.card-back').val();
        var path = $(this).attr("path");
        var id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: path,
            type: "post",
            data: {
                'front' : name,
                'back' : description,
                'collection_id' : id,
            },
    
            success: function(response) {
                var path = '/';
                window.location.href = path;
            }
        });  
    });
</script>
@extends('layouts.app')

@section('content')
    <section class="d-flex mx-5">
        <div class="col-5">
            <div class="searchby" action="{{ route('collection.card', $id) }}">
              <div class="text-center"><h1 style="margin-top: 10px; font-weight: 600;">{{ $collection->name }}</h1></div>
                <div class="d-flex flex-row">
                    <p class="mr-3" style="font-size: 23px; font-weight: 500; margin-right: 4%;">Search By</p>
                    <div >
                        <select style="width: 160px; margin-top: -2%; height: 40px; font-size:19px;" class="form-control">
                            <option value="card">Card</option>
                            <option value="tag">Tag</option>
                        </select>
                    </div>
                </div>
                <div class="form-group has-search mt-5">
                    <input type="text"  class="form-control" style="padding: 23px; font-size: 22px;" placeholder="Search">
                </div>
            </div>
            <div class="col-12 mt-5">
                <table class="table mt-1 table-bordered" style="border-width: 1;">
                    <tr class="text-center thead-light table-secondary" style="font-size: 25px; font-weight: normal;">
                        <td class="" style="font-weight: 400;">Card</td>
                        <td style="font-weight: 400;">Due date</td>
                        <td style="font-weight: 400;">Tag</td>
                    </tr>
                    @foreach ($cards as $card)
                        <tr>
                            <td class="view-card view-card-{{ $card->id }}" style="color:black;" data-id="{{ $card->id }}" action="{{ route('other-card-show', $card->id) }}"><a   style=" text-decoration: none; font-weight: 600;">{{ $card->front }}</a></td>
                            <td>{{ $card->level == -1 ? '#New' : $card->default }}</td>
                            <td>
                                <ul class="tags">
                                    @foreach ($card->tabs as $tag)
                                        <li><span class="tag">{{ $tag->name }}</span></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
      </div>
      <div class="col-1"></div>
      <div class="result card-show col-5">
        <div class="buttoon">
          <button class="button button1 btn-front">Front</button>
          <button class="button button2 btn-back">Back</button>
          @if($check==0)
            <a type="button" href="{{ route('clone.collection',$id) }}" class="button button3">Clone</a>
          @endif
        </div>
        <div class="tags">
            <select class="fav_clr form-control mt-5" name="tag[]" multiple="multiple">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flas-card">
            <div class="ml-1  d-flex flex-row" style="background-color: #E5E5E5; ">
                <div class="py-2" style="border-right: #C4C4C4 solid 1px">
                    <a class="mr-5" style="margin-right: 15px; margin-left: 15px;">
                        <i class="fas fa-pencil-alt text-warning" style="font-size: 35px;"></i>
                    </a>
                </div>
                <div class="py-2 mr-5" style="border-right: #C4C4C4 solid 1px">
                    <a class="text-center" style="margin-right: 15px; margin-left: 15px;">
                        <i class="fas fa-save text-success" style="font-size: 35px;"></i>
                    </a>
                </div>
                <div class="py-2 mr-5" style="border-right: #C4C4C4 solid 1px">
                    <a class="text-center" style="margin-right: 15px; margin-left: 15px;">
                        <i class="fa fa-trash text-danger" style="font-size: 35px;"></i>
                    </a>
                </div>
            </div>
            <div class="card-content card-front" style="height: 500px;">
                <span class="mt-4">Front</span>
            </div>
            <div class="card-content card-back" style="height: 500px; display: none;">
                <span class="mt-4">Back</span>
            </div>
        </div>
        </div>
      </div>
      {{-- Create card --}}
    
      {{-- Create tag --}}
      
    </section>
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
      .tags {
  list-style: none;
  margin: 0;
  overflow: hidden; 
  padding: 0;
}

.tags li {
  float: left;
  text-decoration: none;
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  padding: 0 20px 0 23px;
  position: relative;
  margin: 0 10px 10px 0;
  text-decoration: none;
  -webkit-transition: color 0.2s;
}

.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}
.simple-tags input {
    padding: 0.9em 0.5em;
    box-sizing: border-box;
    -webkit-box-flex: 1;
    flex-grow: 1;
    border: none;
    outline: none;
    font-size: inherit;
    font-family: inherit;
    color: inherit;
}

.select2 {
    margin-left: -10px !important;
    margin-top: 15px !important;
    padding: 15px !important;
}

.select2-search__field {
    font-size: 18px !important;
}

.tags .select2-selection {
    width: 50% !important;
}

.tags .select2-selection--multiple
{
    height: 40px !important;
}
</style>
<script src="http://code.jquery.com/jquery.min.js"></script>
@push('js')
<script>
  $(document).on('click', '.view-card', function() {
   $(".view-card").css('color', 'black');
   path = ".view-card-" + $(this).attr("data-id");
   console.log(path);
   $(path).css('color', 'red');
  });
</script>
@endpush

<script>
        $(document).ready(function() {
    $('.fav_clr').select2({
		placeholder: 'Tags',
		width: '100%',
		border: '1px solid #e4e5e7',
    });
});
$('.fav_clr').on("select2:select", function (e) { 
           var data = e.params.data.text;
           if(data=='all'){
            $(".fav_clr > option").prop("selected","selected");
            $(".fav_clr").trigger("change");
           }
      });
</script>
{{-- bật tắt mặt trước và sau --}}
<script>
        $(document).on('click', '.btn-front', function() {
            $('.card-front').show();
            $('.card-back').hide();
        });
        $(document).on('click', '.btn-back', function() {
            $('.card-front').hide();
            $('.card-back').show();
        });
</script>
{{-- Select 2 --}}
<script>
    function runselect2() {
        $(document).ready(function() {
    $('.fav_clr').select2({
		placeholder: 'Tags',
		width: '100%',
		border: '1px solid #e4e5e7',
    });
});
$('.fav_clr').on("select2:select", function (e) { 
           var data = e.params.data.text;
           if(data=='all'){
            $(".fav_clr > option").prop("selected","selected");
            $(".fav_clr").trigger("change");
           }
      });
    }

</script>
  <script>
    function flip() {
        $('.card').toggleClass('flipped');
    }
</script>
<script>
     $(document).on('click', '.view-card', function() {

        var path = $(this).attr("action");
        $.ajax({
            url: path,
            type: "get",

            success: function(response) {
                $('.card-show').children().remove();
                $('.card-show').append($(response).html());
                runselect2() ;
            }
        });  
    });
</script>

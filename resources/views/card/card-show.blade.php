<div class="result card-show col-5">
    <div class="buttoon">
      <button class="button button1 btn-front">Front</button>
      <button class="button button2 btn-back">Back</button>
    </div>
    <div class="tags">
        <select class="fav_clr form-control mt-5 select-tag" name="tag[]" multiple="multiple">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
            @foreach ($card->tabs as $tagUser)
                <option value="{{ $tagUser->id }}" selected>{{ $tagUser->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="flas-card">
        <div class="ml-1  d-flex flex-row" style="background-color: #E5E5E5; ">
            <div class="py-2" style="border-right: #C4C4C4 solid 1px">
                <a class="mr-5 edit-card" style="margin-right: 15px; margin-left: 15px;">
                    <i class="fas fa-pencil-alt text-warning" style="font-size: 35px;"></i>
                </a>
            </div>
            <div class="py-2 mr-5" style="border-right: #C4C4C4 solid 1px">
                <a class="text-center save-card" action ="{{ route('card-update', $card->id) }}" style="margin-right: 15px; margin-left: 15px;">
                    @csrf
                    <i class="fas fa-save text-success" style="font-size: 35px;"></i>
                </a>
            </div>
            <div class="py-2 mr-5" style="border-right: #C4C4C4 solid 1px">
                <a class="text-center delete-card" action="{{ route('card-delete', $card->id ) }}" style="margin-right: 15px; margin-left: 15px;">
                    <i class="fa fa-trash text-danger" style="font-size: 35px;"></i>
                </a>
            </div>
        </div>
        <div class="card-content card-front" style="height: 500px;">
            <span class="mt-4 text-card">{{ $card->front }}</span>
            <textarea style="display: none" class="form-control text-front" id="exampleFormControlTextarea1" name="back" rows="25">{{ $card->front }}</textarea>  
        </div>
        <div class="card-content card-back" style="height: 500px; display: none;">
            <span class="mt-4 text-card">{{ $card->back }}</span>
            <textarea style="display: none" class="form-control text-back" id="exampleFormControlTextarea1" name="back" rows="25">{{ $card->back }}</textarea>  
        </div>
    </div>
    </div>
  </div>

<div class="collection-detail">
  <div class="colname">Collection: {{ $collection->name }}  <img src="{{ $collection->status == 1 ? asset('storage/images/VectorW.png') : asset('storage/images/private.png') }}" alt="logo" /></div>
    <ul class="setting-menu">
      <li class="px-3 py-2" style="background-color: #65c466"><a style="color:white; text-decoration:none; font-weight: 700;" class="p-3" href="{{ route('collection.card', $collection->id ) }}">Manage Cards</a></li>
      <li>
        <button data-toggle="modal" data-target="#updatedCollection" type="button" class = "btn">
          <i class="fas fa-pencil-alt collection-updated text-success" data-id="{{ $collection->id }}" style="font-size: 28px;"></i>
          </button>
      </li>
      <li class="delete">
        <a href="javascript:void(0)" type="button" class="delete-collection align-items-end" path="{{ route('collection-delete') }}" data-id="{{ $collection->id }}">
        <img src="{{ asset('storage/images/Vector.png') }}" alt="logo" />
      </a>
      </li>
    </ul>
    <div class="stat-schedule">
      <div class="stat">
        <div class="colname">Stat</div>
        <div class="stat-detail"><span class="head ml-3" style="color:black;">Total :</span> {{ $totalCard}} cards</div>
        <div class="stat-detail"><span class="head" style="color:black;">New : </span> {{ $newCard}}  cards</div>
        <div class="stat-detail"><span class="head" style="color:black;">Due : </span> {{ $dueCard}}  cards</div>
      </div>
      <div class="schedule">
        <div class="d-flex flex-row">
          <div class="colname">Schedule</div>
          <div class="mt-4">
            <i  class="fas fa-pencil-alt updated" style="font-size: 24px;"></i>
            <button class="schedule-save btn-success p-2" data-path="{{ route('schedule.update') }}" style="display:none;" data-id= "{{ $collection->id }}" >Save</button>
          </div>
        </div>
        <div class="d-flex justify-content-start mt--2" style="border-radius: 10px; border: 1px solid gray; height: 50px;">
          <span class="head col-6" style="background-color:#AC373A; font-size: 20px; padding-top: 10px;">1st(minutes)</span>
          <input id="one" style="width: auto;" value="{{ $schedule->one }}">
        </div>
        <div class="d-flex justify-content-start mt-3" style="border-radius: 10px; border: 1px solid gray; height: 50px;">
          <span class="head col-6" style="background-color:#D8A522; font-size: 20px; padding-top: 10px;">2nd(days)</span>
          <input id="two" style="width: auto;" value="{{ $schedule->two }}">
        </div>
        <div class="d-flex justify-content-start mt-3" style="border-radius: 10px; border: 1px solid gray; height: 50px;">
          <span class="head col-6" style="background-color:#519CF5; font-size: 20px; padding-top: 10px;">3rd(weeks)</span>
          <input id="three" style="width: auto;" value="{{ $schedule->three }}">
        </div>
        <div class="d-flex justify-content-start mt-3" style="border-radius: 10px; border: 1px solid gray; height: 50px;">
          <span class="head col-6" style="background-color:#65C466; font-size: 20px; padding-top: 10px;">4th(months)</span>
          <input id="four" style="width: auto;" value="{{ $schedule->four }}">
        </div>
        <div class="d-flex justify-content-start mt-3" style="border-radius: 10px; border: 1px solid gray; height: 50px;">
          <span class="head col-6" style="background-color:#65C466; font-size: 20px; padding-top: 10px;">Max(months)</span>
          <input id="custom" style="width: auto;" value="{{ $schedule->custom }}">
        </div>
      </div>
    </div>
  </div>

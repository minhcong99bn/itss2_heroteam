<div class="collection-detail">
  <div class="colname change-status"data-toggle="modal" data-target="#test" style="font-size: 34px; font-weight: 700;">Collection Details <img src="{{ $collection->status == 1 ? asset('storage/images/VectorW.png') : asset('storage/images/private.png') }}" alt="logo"/></div>
    <ul class="setting-menu">
      <div class="d-flex justify-content-start">
        <li class="px-5 py-4" style="background-color: #65c466"><a style="color:white; text-decoration:none; font-weight: 500; font-size: 25px;" class="p-1" href="{{ route('collection.card', $collection->id ) }}">Manage Cards</a></li>
        <li class="px-5 py-4" style="background-color: #519CF5"><a style="color:white; text-decoration:none; font-weight: 500; font-size: 25px;" class="p-1" href="{{ route('learn-now', $collection->id ) }}">Learn Now</a></li>
      </div>
      <div class="d-flex">
        <li class="delete">
          <a href="javascript:void(0)" type="button" class="delete-collection align-items-end" path="{{ route('collection-delete') }}" data-id="{{ $collection->id }}">
          <img src="{{ asset('storage/images/Vector.png') }}" alt="logo" />
        </a>
        </li>
      </div>
    </ul>
    <div class="stat-schedule">
      <div class="stat">
        <div class="colname" style="font-size: 43px; font-weight: 600;">Stats</div>
        <div class="stat-detail d-flex flex-row mt-3" style="height: 60px; margin-right: 10%;">
          <div class="head col-5 pt-3" style="background-color: #E69A8D; font-weight: 600; border-top-left-radius: 10px; border-bottom-left-radius: 10px; padding-left: 25px;">
            Total
          </div>
          <div class="mt-3 col-4 text-center" style="font-weight: 600;">
            {{ $totalCard}}
          </div>
          <div class="mt-3 text-center" style="font-weight: 600;">
            cards
          </div>
        </div>
        <div class="stat-detail d-flex flex-row mt-3" style="height: 60px;  margin-right: 10%;">
          <div class="head col-5 pt-3" style="background-color: #E69A8D; font-weight: 600; border-top-left-radius: 10px; border-bottom-left-radius: 10px; padding-left: 25px;">
            New
          </div>
          <div class="mt-3 col-4 text-center" style="font-weight: 600;">
            {{ $newCard}}
          </div>
          <div class="mt-3 text-center" style="font-weight: 600;">
            cards
          </div>
        </div>
        <div class="stat-detail d-flex flex-row mt-3" style="height: 60px;  margin-right: 10%;">
          <div class="head col-5 pt-3" style="background-color: #E69A8D; font-weight: 600; border-top-left-radius: 10px; border-bottom-left-radius: 10px; padding-left: 25px;">
            Due
          </div>
          <div class="mt-3 col-4 text-center" style="font-weight: 600;">
            {{ $dueCard}}
          </div>
          <div class="mt-3 text-center" style="font-weight: 600;">
            cards
          </div>
        </div>
      </div>
      <div class="schedule">
        <div class="d-flex justify-content-start">
          <div class="colname"  style="font-size: 43px; font-weight:600; ">Schedule</div>
          <div class="mt-5 ml-2">
            <i  class="fas fa-pencil-alt updated" style="font-size: 24px;"></i>
            <button class="schedule-save btn-success p-2" data-path="{{ route('schedule.update') }}" style="display:none; font-size: 20px; margin-top: -20%;" data-id= "{{ $collection->id }}" >Save</button>
          </div>
        </div>
        <div class="d-flex justify-content-start mt--2 col-11" style="border-radius: 10px; border: 1px solid gray; height: 60px; ">
          <span class="head col-6 ml-2" style="background-color:#AC373A; font-size: 20px; padding-top: 13px; padding-left: 20px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">1st(minutes)</span>
          <input id="one" type="number" min="0" max="60" class="schedule-input" disabled style="padding-left: 15px; width: 51%; font-size: 26px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" value="{{ $schedule->one }}">
        </div>
        <div class="d-flex justify-content-start mt-3 col-11" style="border-radius: 10px; border: 1px solid gray; height: 60px;">
          <span class="head col-6" style="background-color:#D8A522; font-size: 20px; padding-top: 13px; padding-left: 20px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">2nd(days)</span>
          <input id="two" type="number" min="0" max="31" class="schedule-input" disabled style="padding-left: 15px; width: 51%; font-size: 26px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" value="{{ $schedule->two }}">
        </div>
        <div class="d-flex justify-content-start mt-3 col-11" style="border-radius: 10px; border: 1px solid gray; height: 60px;">
          <span class="head col-6" style="background-color:#519CF5; font-size: 20px; padding-top: 13px; padding-left: 20px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">3rd(weeks)</span>
          <input id="three" type="number" min="0" max="4" class="schedule-input" disabled style="padding-left: 15px; width: 51%; font-size: 26px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" value="{{ $schedule->three }}">
        </div>
        <div class="d-flex justify-content-start mt-3 col-11" style="border-radius: 10px; border: 1px solid gray; height: 60px;">
          <span class="head col-6" style="background-color:#65C466; font-size: 20px; padding-top: 13px; padding-left: 20px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">4th(months)</span>
          <input id="four" type="number" min="0" max="12" class="schedule-input" disabled style="padding-left: 15px; width: 51%; font-size: 26px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" value="{{ $schedule->four }}">
        </div>
        <div class="d-flex justify-content-start mt-3 col-11" style="border-radius: 10px; border: 1px solid gray; height: 60px;">
          <span class="head col-6" style="background-color:#65C466; font-size: 20px; padding-top: 13px; padding-left: 20px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">Max(months)</span>
          <input id="custom" type="number" min="0" max="12" class="schedule-input" disabled style="padding-left: 15px; width: 51%; font-size: 26px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" value="{{ $schedule->custom }}">
        </div>
      </div>
    </div>
  </div>

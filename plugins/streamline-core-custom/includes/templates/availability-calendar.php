<div class="availability d-none d-sm-block" ng-init="getCalendarDataNew(<?php echo $unit_id; ?>)">
    <div class="availability-calendar" ng-model="availabilityCalendar" calendar show-days="renderCalendarNew(date, true, 'checkin')" update-modal-checkin="setModalCheckin(date)">
    </div>
    <ul class="calendar-tips">
        <li class="cal-selectable"><span><?php _e('Checkin Available',	'streamline-core');	?></span></li>
        <li class="cal-available"><span><?php _e('Checkout Available',	'streamline-core');	?></span></li>
        <li class="cal-unavailable"><span><?php _e('Not Available',	'streamline-core');	?></span></li>
    </ul>
</div>

<div class="availability availabilitymobile d-sm-none" ng-init="getCalendarDataNew(<?php echo $unit_id; ?>)">
    <div class="availability-calendar" ng-model="availabilityCalendar" calendarmobile show-days="renderCalendarNew(date, true, 'checkin')" update-modal-checkin="setModalCheckin(date)">
    </div>
    <ul class="calendar-tips">
        <li class="cal-selectable"><span><?php _e('Checkin Available',	'streamline-core');	?></span></li>
        <li class="cal-available"><span><?php _e('Checkout Available',	'streamline-core');	?></span></li>
        <li class="cal-unavailable"><span><?php _e('Not Available',	'streamline-core');	?></span></li>
    </ul>
</div>
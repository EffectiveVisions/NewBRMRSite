<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria - labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content px-4 pb-4">
            <form class="form-horizontal" id="modal_form1"
                  action="<?php echo get_permalink(get_page_by_slug('checkout')) ?>" method="post">
                <div class="modal-header  pb-2 px-0">
                    <h4 class="modal-title" id="myModalLabel"><?php echo $location_name; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php _e( 'Close', 'streamline-core' ) ?>">&times;</button>
                </div>
                <div class="modal-body  px-0 pb-0">
                    <input type="hidden" name="resortpro_book_unit" value="<?php echo $nonce ?>"/>
                    <input type="hidden" name="book_unit" value="<?php echo $property['id'] ?>"/>
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 errorMsg"></div>

                            <div class="form-group">
                                <label for="sd" class="control-label w-100 font-13 text-black font-weight-light-bold"><?php _e( 'Check in:', 'streamline-core' ) ?></label>
                                <input type="text" value="" name="book_start_date" class="form-control datepicker-single"
                                           id="modal_checkin"
                                           ng-model="modal_checkin"
                                           name="book_start_date"
                                           show-days="myShowDaysFunction(date)"
                                           update-price="updatePricePopupCalendar(modal,1)"
                                           modalcheckin
                                           readonly="readonly"
                                           data-min-stay="<?php echo $min_stay ?>"
                                           data-checkin-days="<?php echo $checkin_days ?>"

                                           />
                            </div>

                            <div class="form-group" id="group-days">
                                <label for="modal_days" class="control-label w-100 font-13 text-black font-weight-light-bold"><?php _e( 'Nights:', 'streamline-core' ) ?></label>
                                    <select ng-model="modal_nights" id="modal_days" class="form-control">
                                        <option value=""><?php _e( 'Select # of nights', 'streamline-core' ) ?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                    </select>
                            </div>
                    </div>
                </div>

                </div>
                <div class="modal-footer border-0 pb-0">
                    <button type="button" id="cancelreservation" class="btn btn-default  font-14   font-weight-semi-bold " data-dismiss="modal"><?php _e( 'Cancel', 'streamline-core' ) ?></button>
                    <button ng-click="setNights()" type="button" id="makereservation" class="btn theme-btn font-14   font-weight-light-bold ">
                      <?php _e( 'Make Reservation', 'streamline-core' ) ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

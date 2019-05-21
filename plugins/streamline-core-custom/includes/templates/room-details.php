<?php if(isset($room_details['roomsdetails']) && is_array($room_details['roomsdetails'])): ?>
<table class="table table-striped table-hover table-condensed table-bordered">
  <thead>
    <tr>
      <th>
        <?php _e( 'Room', 'streamline-core' ) ?>
      </th>
      <th>
        <?php _e( 'Beds', 'streamline-core' ) ?>
      </th>
      <th>
        <?php _e( 'Baths', 'streamline-core' ) ?>
      </th>
      <th>
        <?php _e( 'TVs', 'streamline-core' ) ?>
      </th>
      <th>
        <?php _e( 'Comments', 'streamline-core' ) ?>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($room_details['roomsdetails'] as $room): ?>
    <tr class="row-review">
      <td>
        <?php _e( $room['name'], 'streamline-core' ) ?>                
      </td>
      <td>
        <?php if(is_string($room['beds_details'])): ?>
          <span><?php _e( $room['beds_details'], 'streamline-core' ) ?></span>
        <?php endif; ?>
        <?php if(is_array($room['beds_details'])): ?>
        <span>
          <ul>
            <?php foreach ($room['beds_details'] as $beds_details): ?>
              <li><?php _e( $beds_details, 'streamline-core' ) ?></li>
            <?php endforeach; ?>
          </ul>
        </span>
        <?php endif; ?>
      </td>
      <td>
        <?php if(is_string($room['bathroom_details'])): ?>
          <span><?php _e( $room['bathroom_details'], 'streamline-core' ) ?></span>
        <?php endif; ?>
        <?php if(is_array($room['bathroom_details'])): ?>
        <span>
          <ul>
            <?php foreach ($room['bathroom_details'] as $bathrooms_details): ?>
              <li><?php _e( $bathrooms_details, 'streamline-core' ) ?></li>
            <?php endforeach; ?>
          </ul>
        </span>
        <?php endif; ?>
      </td>
      <td>
        <?php if(is_string($room['television_details'])): ?>
          <span><?php _e( $room['television_details'], 'streamline-core' ) ?></span>                
        <?php endif; ?>
        <?php if(is_array($room['television_details'])): ?>
        <span>
          <ul>
            <?php foreach ($room['television_details'] as $television_details): ?>
              <li><?php _e( $television_details, 'streamline-core' ) ?></li>                    
            <?php endforeach; ?>
          </ul>
        </span>
        <?php endif; ?>
      </td>
      <td style="width:250px">
        <?php if(is_string($room['comments'])): ?>
        <span>
          <?php echo $room['comments']; ?>
        </span>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

  <div ng-init="loadRecents()">
    <div style="text-align:center;" ng-if="recentsObj">
      <h2>Recently Viewed Properties</h2>
    </div>
    <div ng-repeat="property in recentsObj" class="col-sm-4 box">
      <a class="recent" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}">
      <div class="row recent">
      <div class="col-sm-5 col-xs-6">
      <img class="img-responsive" ng-src="{[property.default_thumbnail_path]}">
      </div>
      <div class="col-sm-7 col-xs-6 recent">
        <div class="propertyTitle">
          <div class="location_name truncate" ng-bind="getUnitName(property)"></div>
        </div>
        <div class="location_name truncate" ng-bind="property.location_area_name"></div>
        <div>
          <i class="fa fa-group"></i> <span ng-bind="property.max_occupants"></span> |
          <i class="fa fa-hotel"></i> <span ng-bind="property.bedrooms_number"></span>
        </div>
      </div>
    </div>
  </a>
    </div>
  </div>


<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'c_front';
$route['home']='c_front/index';
$route['404_override'] = '';
$route['mnh/takesurvey']='c_front/active_survey';#active survey url, in this case: mnh commodities
$route['ch/takesurvey']='c_front/active_survey';#active survey url, in this case: mnh supplies
$route['mnh/assessment']='c_front/inventory'; #active survey home page url
$route['ch/assessment']='c_front/inventory'; #active survey home page url

$route['mnh/analytics']='c_analytics/active_results';#active results url, survey:mnh
$route['ch/analytics']='c_analytics/active_results';#active results url, survey:ch
$route['ch/summary']='c_analytics/summary';#active results url, survey:ch
$route['analytics/facility/loc']='c_analytics/analytics_facility_info_levels_of_care';
$route['analytics/facility/ownership']='c_analytics/analytics_facility_info_ownership';
$route['analytics/facility/types']='c_analytics/analytics_facility_info_types';

$route['analytics/section2/guidelines-availability']='c_analytics/analytics_section_2_guidelines';
$route['analytics/section2/staff-training']='c_analytics/analytics_section_2_staff_training';
$route['analytics/section2/commodity-availability']='c_analytics/analytics_section_2_commodity_availability';
$route['analytics/section2/commodity-supplier']='c_analytics/analytics_section_2_commodity_supplier';

$route['session/new']='c_auth/go';#log in url
$route['session/close']='c_auth/logout';#log out url


/* End of file routes.php */
/* Location: ./application/config/routes.php */